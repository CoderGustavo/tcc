<?php

namespace Source\Controller;

use League\Plates\Engine;
use CoffeeCode\Router\Router;
use Exception;
use Source\Model\Avaliacao as modelAvaliacao;

class Avaliacao
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
        $avaliacoes = new modelAvaliacao();
        $avaliacoes = $avaliacoes->find()->fetch(true);
        $usuario = $_SESSION["usuario"];
        foreach ($avaliacoes as $key => $avaliacao) {
            $avaliacao->nome = $_SESSION["usuario"]->nome;
        }
        $status = null;
        echo $this->view->render("admin/avaliacoes/listar", ["avaliacoes" => $avaliacoes, "usuario" => $usuario, "status" => $status]);
    }

    public function readStatus($data){
        session_start();
        $avaliacoes = new modelAvaliacao();
        $avaliacoes = $avaliacoes->find("status=:status", "status={$data["status"]}")->fetch(true);
        $usuario = $_SESSION["usuario"];
        if($avaliacoes){
            foreach ($avaliacoes as $key => $avaliacao) {
                $avaliacao->nome = $_SESSION["usuario"]->nome;
            }
        }
        $status = $data["status"];
        echo $this->view->render("admin/avaliacoes/listar", ["avaliacoes" => $avaliacoes, "usuario" => $usuario, "status" => $status]);
    }

    public function aprovar($data){
        session_start();
        $id = $data["id"];
        $avaliacoes = new modelAvaliacao();
        $status = $data["status"];
        if($id && $status != "Aprovado"){
            $avaliacao = $avaliacoes->findById($id);
            $avaliacao->status = "Aprovado";
            $avaliacao->save();
            if($avaliacao->fail()){
                $_SESSION["erro"] = $avaliacao->fail()->getMessage();
            }else{
                $_SESSION["sucesso"] = "Avaliação aprovado com sucesso!";
            }
        }else{
            $_SESSION["erro"] = "Id informado incorreto!";
        }
        
        switch ($status) {
            case 'Aprovado':
                return $this->router->redirect("admin/listar/avaliacoes/Aprovado");
            break;

            case 'Pendente':
                return $this->router->redirect("admin/listar/avaliacoes/Pendente");
            break;
            
            default:
                return $this->router->redirect("admin/listar/avaliacoes");
            break;
        }
    }

    public function destroy($data){
        session_start();
        $id = $data["id"];
        $avaliacoes = new modelAvaliacao();
        $status = $data["status"];
        if($id){
            $avaliacao = $avaliacoes->findById($id);
            $avaliacao->destroy();
            if($avaliacao->fail()){
                $_SESSION["erro"] = $avaliacao->fail()->getMessage();
            }else{
                $_SESSION["sucesso"] = "Avaliação deletada com sucesso!";
            }
        }else{
            $_SESSION["erro"] = "Id informado incorreto!";
        }

        switch ($status) {
            case 'Aprovado':
                return $this->router->redirect("admin/listar/avaliacoes/Aprovado");
            break;

            case 'Pendente':
                return $this->router->redirect("admin/listar/avaliacoes/Pendente");
            break;
            
            default:
                return $this->router->redirect("admin/listar/avaliacoes");
            break;
        }
    }
}
