<?php

namespace Source\Controller;

use League\Plates\Engine;
use CoffeeCode\Router\Router;
use Exception;
use Source\Model\Avaliacao as modelAvaliacao;
use Source\Model\Pedido as ModelPedido;

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
            if($_SESSION["usuario"]){
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
        $pedidos = new ModelPedido();
        $pedidos = $pedidos->find()->fetch(true);
        $usuario = $_SESSION["usuario"];
        foreach ($pedidos as $key => $pedido) {
            $pedido->nome = $_SESSION["usuario"]->nome;
        }
        $status = null;
        echo $this->view->render("admin/pedidos/listar", ["pedidos" => $pedidos, "usuario" => $usuario, "status" => $status]);
    }

    public function readStatus($data){
        session_start();
        $pedidos = new ModelPedido();
        $pedidos = $pedidos->find("status=:status", "status={$data["status"]}")->fetch(true);
        $usuario = $_SESSION["usuario"];
        foreach ($pedidos as $key => $pedido) {
            $pedido->nome = $_SESSION["usuario"]->nome;
        }
        $status = $data["status"];
        echo $this->view->render("admin/pedidos/listar", ["pedidos" => $pedidos, "usuario" => $usuario, "status" => $status]);
    }

}
