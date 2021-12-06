<?php

namespace Source\Controller;

use CoffeeCode\DataLayer\Connect;
use League\Plates\Engine;
use CoffeeCode\Router\Router;
use Exception;
use Source\Model\Admin;
use Source\Model\Avaliacao as modelAvaliacao;
use Source\Model\Item_pedido;
use Source\Model\Pedido as modelPedido;

class Pedido
{

    public function __construct()
    {
        $this->router = new Router(URL_BASE);
        $this->view = Engine::create(__DIR__."/../../View", "php");
    }


    public function create($data){
        session_start();

        $avaliacao = new modelAvaliacao();

        $datahora = date('d/m/Y H:i');
        $estrela = $data["estrela"];
        $feedback = $data["avaliacao"];
        $usuario = $_SESSION["usuario"];
        $status = "Pendente";


        if($datahora){
            if($usuario){
                $avaliacao->id_usuario = $usuario->id;
                $avaliacao->datahora = $datahora;
                $avaliacao->estrela = $estrela;
                $avaliacao->avaliacao = $feedback;
                $avaliacao->status = $status;
            
                $avaliacaoId = $avaliacao->save();
                echo "Avaliação enviada com sucesso!";
            }else{
                $_SESSION["naologado"] = 1;
                $this->router->redirect("/");
            }
        }else{
            echo "Preencha no mínimo data e hora!";
        }


    }

    public function read($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $admins = new Admin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin && $admin->nivel_acesso <= 3){
            $pedidos = new ModelPedido();
            $pedidos = $pedidos->find("status<>:status", "status=sacola")->fetch(true);
            $usuario = $_SESSION["usuario"];
            foreach ($pedidos as $key => $pedido) {
                $pedido->nome = $_SESSION["usuario"]->nome;
            }
            $status = null;
            echo $this->view->render("admin/pedidos/listar", ["pedidos" => $pedidos, "usuario" => $usuario, "status" => $status, "admin" => $admin]);
        }else{
            return $this->router->redirect("naologado");
        }

    }

    public function readStatus($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $admins = new Admin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin && $admin->nivel_acesso <= 3){
            $pedidos = new ModelPedido();
            $pedidos = $pedidos->find("status=:status", "status={$data["status"]}")->fetch(true);
            $usuario = $_SESSION["usuario"];
            if($pedidos){
                foreach ($pedidos as $key => $pedido) {
                    $pedido->nome = $_SESSION["usuario"]->nome;
                }
            }
            $status = $data["status"];
            echo $this->view->render("admin/pedidos/listar", ["pedidos" => $pedidos, "usuario" => $usuario, "status" => $status, "admin" => $admin]);
        }else{
            return $this->router->redirect("naologado");
        }

    }

    public function adicionar($data){
        session_start();
        $id = $data["id"];
        $nome = $data["nome"];
        $qtd = $data["qtd"];
        $obs = $data["obs"];
        $ponto = $data["ponto"];
        $userid = $_SESSION["usuario"]->id;
        $status = "sacola";

        $pedido = new modelPedido();
        $itens_pedido = new Item_pedido();

        if($id && $nome && $obs && $ponto){
            $pedidoUser = $pedido->find("id_usuario=:uid AND status=:status","uid=$userid&status=$status")->fetch();
            $itens_pedidoUser = $itens_pedido->find("id_pedido = :idpedido AND id_cardapio=:idcardapio AND obs =:obs AND ponto = :ponto", "idpedido=$pedidoUser->id&idcardapio=$id&obs=$obs&ponto=$ponto")->fetch();
            if($pedidoUser){
                if($itens_pedidoUser){
                    $itens_pedidoUser->qtd = $itens_pedidoUser->qtd+$qtd;
                    $itens_pedidoUser->save();
                }else{
                    $itens_pedido->id_pedido = $pedidoUser->id;
                    $itens_pedido->id_cardapio = $id;
                    $itens_pedido->qtd = $qtd;
                    $itens_pedido->obs = $obs;
                    $itens_pedido->ponto = $ponto;
                    $itens_pedido->save();
                }
            }else{
                $pedido->id_usuario = $userid;
                $pedido->status = "sacola";
                $pedido->entrega = "entrega";
                $pedido->save();

                $pedidoUser = $pedido->find("id_usuario=:uid AND status=:status","uid=$userid&status=$status")->fetch();
                
                $itens_pedido->id_pedido = $pedidoUser->id;
                $itens_pedido->id_cardapio = $id;
                $itens_pedido->qtd = $qtd;
                $itens_pedido->obs = $obs;
                $itens_pedido->ponto = $ponto;
                $itens_pedido->save();
            }
        }

        return $this->router->redirect("delivery");
    }

    public function destroyItem($data){
        session_start();
        $id = $data["id"];
        $itens_pedido = new Item_pedido();
        if($id){
            $itens_pedido = $itens_pedido->findById($id);
            $itens_pedido->destroy();
        }
        return $this->router->redirect("delivery");
    }

    public function update($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $admins = new Admin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin && $admin->nivel_acesso <= 3){
            $id = $data["id"];
            $status = $data["status"];
            $pedidos = new modelPedido();
            $pedido = $pedidos->findById($id);
            switch ($pedido->status) {
                case 'Pendente':
                    $pedido->status = "Aguardo";
                    $pedido->save();
                    if(isset($status)){
                        if($status == "Pedido"){
                            return $this->router->redirect("admin/pedido/informacoes/$id");
                        }else{
                            return $this->router->redirect("admin/listar/pedidos/$pedido->status");
                        }
                    }else{
                        return $this->router->redirect("admin/listar/pedidos");
                    }
                break;

                case 'Aguardo':
                    $pedido->status = "Em Preparo";
                    $pedido->save();
                    if(isset($status)){
                        if($status == "Pedido"){
                            return $this->router->redirect("admin/pedido/informacoes/$id");
                        }else{
                            return $this->router->redirect("admin/listar/pedidos/$pedido->status");
                        }
                    }else{
                        return $this->router->redirect("admin/listar/pedidos");
                    }
                break;
    
                case 'Em Preparo':
                    $pedido->status = "Entregue";
                    $pedido->save();
                    if(isset($status)){
                        if($status == "Pedido"){
                            return $this->router->redirect("admin/pedido/informacoes/$id");
                        }else{
                            return $this->router->redirect("admin/listar/pedidos/$pedido->status");
                        }
                    }else{
                        return $this->router->redirect("admin/listar/pedidos");
                    }
                break;
    
                case 'Entregue':
                        return $this->router->redirect("admin/listar/pedidos/$pedido->status");
                break;
    
                case 'Cancelado':
                    return $this->router->redirect("admin/listar/pedidos/$pedido->status");
                break;
    
                default:
                    return $this->router->redirect("admin/listar/pedidos");
                break;
            }
        }else{
            return $this->router->redirect("naologado");
        }
    }

    public function show($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $admins = new Admin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin && $admin->nivel_acesso <= 3){
            $id = $data["id"];
            if(isset($data["status"])){
                $status = $data["status"];
            }
            if($id){
                $pedidos = new modelPedido();
                $pedido = $pedidos->findById($id);
                $usuario = $_SESSION["usuario"];
        
                $conn = Connect::getInstance();
                $error = Connect::getError();
        
                if($error){
                    echo $error->getMessage();
                    die();
                }
        
                $stmt = $conn->prepare("SELECT itens_pedido.id, itens_pedido.obs, itens_pedido.qtd, cardapio.nome, cardapio.preco FROM pedidos INNER JOIN itens_pedido ON pedidos.id = itens_pedido.id_pedido INNER JOIN cardapio ON cardapio.id = itens_pedido.id_cardapio WHERE pedidos.id = :id");
                $stmt->bindValue(":id", $id);
                $stmt->execute();
                $ingredientes = $stmt->fetchAll();
    
                $stmt = $conn->prepare("SELECT usuarios.nome, pedidos.total FROM pedidos INNER JOIN usuarios ON pedidos.id_usuario = usuarios.id WHERE pedidos.id = :id");
                $stmt->bindValue(":id", $id);
                $stmt->execute();
                $usuario_show = $stmt->fetch();
                echo $this->view->render("admin/pedidos/ver", ["pedido" => $pedido, "usuario" => $usuario, "ingredientes" => $ingredientes, "usuario_show" => $usuario_show, "admin" => $admin]);
            }else{
                $_SESSION["erro"] = "id informado incorreto!";
                return $this->router->redirect("admin/listar/pedidos/$status");
            }
        }else{
            return $this->router->redirect("naologado");
        }

    }

}
