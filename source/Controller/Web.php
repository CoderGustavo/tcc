<?php

namespace Source\Controller;

use CoffeeCode\DataLayer\Connect;
use CoffeeCode\Router\Router;
use League\Plates\Engine;
use Source\Model\Avaliacao;
use Source\Model\Cardapio;
use Source\Model\Categoria_cardapio;
use Source\Model\Endereco;
use Source\Model\Item_pedido;
use Source\Model\Pedido;
use Source\Model\Reserva;
use MercadoPago;

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
        $conn = Connect::getInstance();
        $error = Connect::getError();

        
        $logado = 0;
        $usuario = 0;
        $enderecos = 0;
        $admin = 0;

        if(isset($_SESSION["usuario"])){
            $logado = 1;
            $usuario = $_SESSION["usuario"];
            if(isset($usuario->admin)){
                $admin = 1;
            }
        }

        $cardapio = $cardapio->find()->limit(6)->order("qtd_vendido DESC")->fetch(true);
        $stmt = $conn->prepare("SELECT * FROM avaliacoes INNER JOIN usuarios ON avaliacoes.id_usuario = usuarios.id WHERE avaliacoes.status != 'Pendente'");
        $stmt->execute();
        $avaliacoes = $stmt->fetchAll();

        echo $this->view->render("index", [
            "cardapio" => $cardapio,
            "avaliacoes" => $avaliacoes,
            "logado" => $logado,
            "usuario" => $usuario,
            "admin" => $admin,
        ]);
    }

    public function login($data)
    {
        session_start();
        if(isset($_SESSION["usuario"])){
            return $this->router->redirect(" ");
        }else{
            echo $this->view->render("login");
        }
    }

    public function register($data){
        session_start();
        if(isset($_SESSION["usuario"])){
            return $this->router->redirect(" ");
        }else{
            echo $this->view->render("cadastro");
        }
    }
    
    public function cardapio($data){
        session_start();
        $cardapio = new Cardapio();
        $categorias = new Categoria_cardapio();
        $categorias = $categorias->find()->fetch(true);

        $logado = 0;
        $usuario = 0;
        $admin = 0;

        if(isset($_SESSION["usuario"])){
            $logado = 1;
            $usuario = $_SESSION["usuario"];
            if(isset($usuario->admin)){
                $admin = 1;
            }
        }

        $cardapio = $cardapio->find()->fetch(true);

        echo $this->view->render("cardapio", [
            "cardapio" => $cardapio,
            "logado" => $logado,
            "usuario" => $usuario,
            "categorias" => $categorias,
            "admin" => $admin,
        ]);
    }

    public function delivery($data){
        session_start();
        if(isset($_SESSION["usuario"])){
            $conn = Connect::getInstance();
            $error = Connect::getError();
            $cardapio = new Cardapio();
            $pedido = new Pedido();
            $categorias = new Categoria_cardapio();
            $categorias = $categorias->find()->fetch(true);

            $logado = 0;
            $usuario = 0;
            $admin = 0;

            $status = "sacola";
            $logado = 1;
            $usuario = $_SESSION["usuario"];
            if(isset($usuario->admin)){
                $admin = 1;
            }

            $pedidoMesa = $pedido->find("id_usuario=:uid AND status=:status","uid=$usuario->id&status=$status")->fetch();

            if($pedidoMesa){
                $stmt = $conn->prepare("SELECT itens_pedido.id,cardapio.nome,cardapio.preco,itens_pedido.obs,itens_pedido.qtd FROM itens_pedido INNER JOIN cardapio ON itens_pedido.id_cardapio=cardapio.id INNER JOIN pedidos ON itens_pedido.id_pedido=pedidos.id WHERE pedidos.id = :id");
                $stmt->bindValue(":id", $pedidoMesa->id);
                $stmt->execute();
                $pedido = $stmt->fetchAll();
            }else{
                $pedido = null;
            }
            $cardapio = $cardapio->find()->fetch(true);
            echo $this->view->render("delivery", [
                "cardapio" => $cardapio,
                "logado" => $logado,
                "usuario" => $usuario,
                "pedido" => $pedido,
                "categorias" => $categorias,
                "admin" => $admin,
            ]);
        }else{
            return $this->router->redirect(" ");
        }

    }

    public function endereco($data){
        session_start();
        if(isset($_SESSION["usuario"])){
            $conn = Connect::getInstance();
            $error = Connect::getError();

            $pedido = new Pedido();

            $logado = 0;
            $usuario = 0;
            $enderecos = 0;
            $somaprecos = 0;

            $status = "sacola";

            $logado = 1;
            $usuario = $_SESSION["usuario"];

            $pedidoMesa = $pedido->find("id_usuario=:uid AND status=:status","uid=$usuario->id&status=$status")->fetch();

            if($pedidoMesa){
                $stmt = $conn->prepare("SELECT cardapio.nome,cardapio.preco,itens_pedido.obs,itens_pedido.qtd FROM itens_pedido INNER JOIN cardapio ON itens_pedido.id_cardapio=cardapio.id INNER JOIN pedidos ON itens_pedido.id_pedido=pedidos.id WHERE pedidos.id = :id");
                $stmt->bindValue(":id", $pedidoMesa->id);
                $stmt->execute();
                $pedido = $stmt->fetchAll();

                $enderecos = new Endereco();
                $enderecos = $enderecos->find("id_usuario=:idUser","idUser=$usuario->id")->fetch(true);
            }

            if($pedido){
                foreach($pedido as $key => $ped){
                    $somaprecos = $somaprecos+($ped->preco*$ped->qtd);
                }
            }
            
            echo $this->view->render("endereco", [
                "logado" => $logado,
                "usuario" => $usuario,
                "pedido" => $pedido,
                "enderecos" => $enderecos,
                "soma" => $somaprecos
            ]);

        }else{
            return $this->router->redirect(" ");
        }
    }

    public function pagamento($data){
        session_start();
        if(isset($_SESSION["usuario"])){
            $conn = Connect::getInstance();
            $error = Connect::getError();

            $pedido = new Pedido();

            $logado = 0;
            $usuario = 0;
            $status = "sacola";
            $endereco = null;
            $logradouro = null;
            $numero = null;
            $bairro = null;
            $referencia = null;
            $somaprecos = 0;

            if(isset($data["endereco"])){
                $endereco = $data["endereco"];
            }else if($data["logradouro"] && $data["numero"] && $data["bairro"]){
                $logradouro = $data["logradouro"];
                $numero = $data["numero"];
                $bairro = $data["bairro"];
                $referencia = $data["referencia"];
            }else{
                $_SESSION["erro"] = "Algum campo nao foi preenchido!";
                return $this->router->redirect("checkout/endereco");
            }


            $logado = 1;
            $usuario = $_SESSION["usuario"];

            $pedidoMesa = $pedido->find("id_usuario=:uid AND status=:status","uid=$usuario->id&status=$status")->fetch();

            $enderecos = new Endereco();
            if($logradouro && $numero && $bairro){
                $enderecos->id_usuario = $usuario->id;
                $enderecos->logradouro = $logradouro;
                $enderecos->numero = $numero;
                $enderecos->bairro = $bairro;
                $enderecos->referencia = $referencia;
                $enderecos->save();
                $_SESSION["sucesso"] = "Endereço salvo, agora selecione-o!";
                return $this->router->redirect("checkout/endereco");
            }else if($endereco){
                if($pedidoMesa){
                    $endereco = $enderecos->find("id=:endid","endid=$endereco")->fetch();
                    if($endereco){
                        $pedido = $pedido->findById($pedidoMesa->id);
                        $pedido->id_endereco = $endereco->id;
                        $pedido->save();

                        
                        $pedidoMesa = $pedido->find("id_usuario=:uid AND status=:status","uid=$usuario->id&status=$status")->fetch();
                        
                        $stmt = $conn->prepare("SELECT cardapio.nome,cardapio.preco,itens_pedido.obs,itens_pedido.qtd FROM itens_pedido INNER JOIN cardapio ON itens_pedido.id_cardapio=cardapio.id INNER JOIN pedidos ON itens_pedido.id_pedido=pedidos.id WHERE pedidos.id = :id");
                        $stmt->bindValue(":id", $pedidoMesa->id);
                        $stmt->execute();
                        $pedido = $stmt->fetchAll();

                        if($pedido){
                            foreach($pedido as $key => $ped){
                                $somaprecos = $somaprecos+($ped->preco*$ped->qtd);
                            }
                        }

                    }else{
                        $_SESSION["erro"] = "Endereço selecionado incorreto!";
                        return $this->router->redirect("checkout/endereco");
                    }



                }else{
                    return $this->router->redirect("delivery");
                }
            }else{
                $_SESSION["erro"] = "Selecione um endereço!";
            }

            echo $this->view->render("pagamento", [
                "logado" => $logado,
                "usuario" => $usuario,
                "pedido" => $pedido,
                "endereco" => $endereco,
                "soma" => $somaprecos
            ]);
        }else{
            return $this->router->redirect(" ");
        }

    }

    public function mesalocal($data){
        session_start();
        $conn = Connect::getInstance();
        $error = Connect::getError();
        $cardapio = new Cardapio();
        $reserva = new Reserva();
        $categorias = new Categoria_cardapio();
        $categorias = $categorias->find()->fetch(true);

        $logado = 0;
        $admin = 0;

        if(isset($_SESSION["usuario"])){
            $logado = 1;
            $usuario = $_SESSION["usuario"];
            if(isset($usuario->admin)){
                $admin = 1;
            }
        }else{
            $usuario = null;   
        }

        $idmesa = $data["numero"];
        $pedidoMesa = $reserva->findById($idmesa);

        if($pedidoMesa){
            if($pedidoMesa->status == "Utilizada"){
                $stmt = $conn->prepare("SELECT itens_mesa.id,cardapio.nome,cardapio.preco,itens_mesa.obs,itens_mesa.qtd FROM itens_mesa INNER JOIN cardapio ON itens_mesa.id_cardapio=cardapio.id INNER JOIN reservas ON itens_mesa.id_mesa=reservas.id WHERE reservas.id = :id AND itens_mesa.status = :status");
                $stmt->bindValue(":id", $pedidoMesa->id);
                $stmt->bindValue(":status", "escolha");
                $stmt->execute();
                $pedidoEscolha = $stmt->fetchAll();
                $stmt = $conn->prepare("SELECT itens_mesa.id,cardapio.nome,cardapio.preco,itens_mesa.obs,itens_mesa.qtd FROM itens_mesa INNER JOIN cardapio ON itens_mesa.id_cardapio=cardapio.id INNER JOIN reservas ON itens_mesa.id_mesa=reservas.id WHERE reservas.id = :id AND itens_mesa.status = :status");
                $stmt->bindValue(":id", $pedidoMesa->id);
                $stmt->bindValue(":status", "preparo");
                $stmt->execute();
                $pedidoPreparo = $stmt->fetchAll();
                $stmt = $conn->prepare("SELECT itens_mesa.id,cardapio.nome,cardapio.preco,itens_mesa.obs,itens_mesa.qtd FROM itens_mesa INNER JOIN cardapio ON itens_mesa.id_cardapio=cardapio.id INNER JOIN reservas ON itens_mesa.id_mesa=reservas.id WHERE reservas.id = :id AND itens_mesa.status = :status");
                $stmt->bindValue(":id", $pedidoMesa->id);
                $stmt->bindValue(":status", "aguardo");
                $stmt->execute();
                $pedidoAguardo = $stmt->fetchAll();
                $stmt = $conn->prepare("SELECT itens_mesa.id,cardapio.nome,cardapio.preco,itens_mesa.obs,itens_mesa.qtd FROM itens_mesa INNER JOIN cardapio ON itens_mesa.id_cardapio=cardapio.id INNER JOIN reservas ON itens_mesa.id_mesa=reservas.id WHERE reservas.id = :id AND itens_mesa.status = :status");
                $stmt->bindValue(":id", $pedidoMesa->id);
                $stmt->bindValue(":status", "pronto");
                $stmt->execute();
                $pedidoPronto = $stmt->fetchAll();
                $cardapio = $cardapio->find()->fetch(true);
                echo $this->view->render("mesalocal", [
                    "cardapio" => $cardapio,
                    "logado" => $logado,
                    "usuario" => $usuario,
                    "pedidoEscolha" => $pedidoEscolha,
                    "pedidoPreparo" => $pedidoPreparo,
                    "pedidoAguardo" => $pedidoAguardo,
                    "pedidoPronto" => $pedidoPronto,
                    "categorias" => $categorias,
                    "admin" => $admin,
                    "idmesa" => $idmesa
                ]);
            }else{
                echo "Você só pode fazer algum pedido se a mesa estiver sendo utilizada!";
            }
        }else{
            echo "Mesa Inexistente!";
            //return $this->router->redirect(" ");
        }
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

    public function naologado($data){
        echo "você nao tem permissão ou nao está logado!";
    }

    public function error($data): void
    {
        echo "<h1>Error: ".$data['errcode']."</h1>";
    }
}
