<?php

namespace Source\Controller;

use CoffeeCode\DataLayer\Connect;
use CoffeeCode\Router\Router;
use League\Plates\Engine;
use Source\Model\Avaliacao;
use Source\Model\Cardapio;
use Source\Model\Endereco;
use Source\Model\Item_pedido;
use Source\Model\Pedido;
use Source\Model\Reserva;

class Web
{
    private $view;

    public function __construct()
    {
        $this->router = new Router(URL_BASE);
        $this->view = Engine::create(__DIR__."/../../View", "php");
    }

    public function home($data): void
    {
        session_start();
        $cardapio = new Cardapio();
        $avaliacoes = new Avaliacao();

        
        $logado = 0;
        $usuario = 0;
        $enderecos = 0;
        $admin = 0;

        if(isset($_SESSION["usuario"])){
            $logado = 1;
            $usuario = $_SESSION["usuario"];
            $enderecos = new Endereco();
            $enderecos = $enderecos->find("id_usuario=:idUser","idUser=$usuario->id")->fetch(true);
            if(isset($usuario->admin)){
                $admin = 1;
            }
        }

        $cardapio = $cardapio->find()->limit(6)->order("qtd_vendido DESC")->fetch(true);
        $avaliacoes = $avaliacoes->find()->fetch(true);

        echo $this->view->render("index", [
            "cardapio" => $cardapio,
            "avaliacoes" => $avaliacoes,
            "logado" => $logado,
            "usuario" => $usuario,
            "enderecos" => $enderecos,
            "admin" => $admin,
        ]);
    }

    public function login($data)
    {
        echo $this->view->render("login");
    }

    public function register($data){
        echo $this->view->render("cadastro");
    }
    
    public function cardapio($data){
        session_start();
        $cardapio = new Cardapio();

        $logado = 0;
        $usuario = 0;
        $enderecos = 0;

        if(isset($_SESSION["usuario"])){
            $logado = 1;
            $usuario = $_SESSION["usuario"];
            $enderecos = new Endereco();
            $enderecos = $enderecos->find("id_usuario=:idUser","idUser=$usuario->id")->fetch(true);
        }

        $cardapio = $cardapio->find()->fetch(true);

        echo $this->view->render("cardapio", [
            "cardapio" => $cardapio,
            "logado" => $logado,
            "usuario" => $usuario,
            "enderecos" => $enderecos,
        ]);
    }

    public function delivery($data){

        
        if(!isset($data["id"])){

            $conn = Connect::getInstance();
            $error = Connect::getError();

            session_start();
            $cardapio = new Cardapio();
            $pedido = new Pedido();

            $logado = 0;
            $usuario = 0;

            $status = "sacola";

            if(isset($_SESSION["usuario"])){
                $logado = 1;
                $usuario = $_SESSION["usuario"];

                $pedidoUser = $pedido->find("id_usuario=:uid AND status=:status","uid=$usuario->id&status=$status")->fetch();

                if($pedidoUser){
                    $stmt = $conn->prepare("SELECT itens_pedido.id,cardapio.nome,cardapio.preco,itens_pedido.obs,itens_pedido.qtd FROM itens_pedido INNER JOIN cardapio ON itens_pedido.id_cardapio=cardapio.id INNER JOIN pedidos ON itens_pedido.id_pedido=pedidos.id WHERE pedidos.id = :id");
                    $stmt->bindValue(":id", $pedidoUser->id);
                    $stmt->execute();
                    $pedido = $stmt->fetchAll();
                }
            }

            $cardapio = $cardapio->find()->fetch(true);
            echo $this->view->render("delivery", [
                "cardapio" => $cardapio,
                "logado" => $logado,
                "usuario" => $usuario,
                "pedido" => $pedido
            ]);

        }else{
            $ingrediente_id = $data["id"];
            $itens_pedido = new Item_pedido();
            $item_pedido = $itens_pedido->findById($ingrediente_id);
            $item_pedido->destroy();

            $this->router->redirect("delivery");
        }
    }

    public function endereco($data){

        $conn = Connect::getInstance();
        $error = Connect::getError();

        session_start();
        $pedido = new Pedido();

        $logado = 0;
        $usuario = 0;
        $enderecos = 0;
        $somaprecos = 0;

        $status = "sacola";

        if(isset($_SESSION["usuario"])){
            $logado = 1;
            $usuario = $_SESSION["usuario"];

            $pedidoUser = $pedido->find("id_usuario=:uid AND status=:status","uid=$usuario->id&status=$status")->fetch();

            if($pedidoUser){
                $stmt = $conn->prepare("SELECT cardapio.nome,cardapio.preco,itens_pedido.obs,itens_pedido.qtd FROM itens_pedido INNER JOIN cardapio ON itens_pedido.id_cardapio=cardapio.id INNER JOIN pedidos ON itens_pedido.id_pedido=pedidos.id WHERE pedidos.id = :id");
                $stmt->bindValue(":id", $pedidoUser->id);
                $stmt->execute();
                $pedido = $stmt->fetchAll();
                $enderecos = new Endereco();
                $enderecos = $enderecos->find("id_usuario=:idUser","idUser=$usuario->id")->fetch(true);
            }
        }

        echo $this->view->render("endereco", [
            "logado" => $logado,
            "usuario" => $usuario,
            "pedido" => $pedido,
            "enderecos" => $enderecos,
            "soma" => $somaprecos
        ]);
    }

    public function pagamento($data){

        $conn = Connect::getInstance();
        $error = Connect::getError();

        session_start();
        $pedido = new Pedido();
        $enderecos = new Endereco();

        $logado = 0;
        $usuario = 0;
        $endereco = $data["endereco"];

        $status = "sacola";

        if(isset($_SESSION["usuario"])){
            $logado = 1;
            $usuario = $_SESSION["usuario"];

            $pedidoUser = $pedido->find("id_usuario=:uid AND status=:status","uid=$usuario->id&status=$status")->fetch();
            
            if($endereco){
                if($pedidoUser){
                    $pedido = $pedido->findById($pedidoUser->id);
                    $pedido->id_endereco = $endereco;
                    $pedido->save();
                    
                    $pedidoUser = $pedido->find("id_usuario=:uid AND status=:status","uid=$usuario->id&status=$status")->fetch();
                    
                    $stmt = $conn->prepare("SELECT cardapio.nome,cardapio.preco,itens_pedido.obs,itens_pedido.qtd FROM itens_pedido INNER JOIN cardapio ON itens_pedido.id_cardapio=cardapio.id INNER JOIN pedidos ON itens_pedido.id_pedido=pedidos.id WHERE pedidos.id = :id");
                    $stmt->bindValue(":id", $pedidoUser->id);
                    $stmt->execute();
                    $pedido = $stmt->fetchAll();
    
                    $endereco = $enderecos->find("id=:endid","endid=$pedidoUser->id_endereco")->fetch();
                }else{
                    echo "Você não possue um pedido ainda,retornaremos você ao delivery!";
                }
            }else{
                echo "Selecione um endereço!";
            }

        }

        echo $this->view->render("pagamento", [
            "logado" => $logado,
            "usuario" => $usuario,
            "pedido" => $pedido,
            "endereco" => $endereco
        ]);
    }

    public function mesalocal($data){
        session_start();
        $cardapio = new Cardapio();

        $cardapio = $cardapio->find()->fetch(true);

        echo $this->view->render("mesalocal", [
            "cardapio" => $cardapio,
            "numeromesa" => $data["numero"],
        ]);
    }


    public function teste($data){
        $reservas = new Reserva();
        $reservas = $reservas->find()->fetch(true);
        foreach ($reservas as $key => $reserva) {
            if($reserva->id_usuario){
                echo $reserva->usuario()->nome;
            }
        }
    }

    public function error($data): void
    {
        echo "<h1>Error: ".$data['errcode']."</h1>";
    }
}
