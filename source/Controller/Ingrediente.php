<?php

namespace Source\Controller;

use League\Plates\Engine;
use CoffeeCode\Router\Router;
use Source\Model\Admin;
use Source\Model\Ingrediente as modelIngrediente;

class Ingrediente
{

    public function __construct()
    {
        $this->router = new Router(URL_BASE);
        $this->view = Engine::create(__DIR__."/../../View", "php");
    }


    public function create($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $admins = new Admin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin && $admin->nivel_acesso == 1){
            $ingredientes = new modelIngrediente();
            $nome = strtolower($data["nome"]);
            $retirar = $data["retirar"];
    
            $existe= $ingredientes->find("nome=:nome","nome=$nome")->fetch();
    
            if(empty($existe)){
                if($nome && $retirar){
                    $ingredientes->nome = $nome;
                    $ingredientes->retirar = $retirar;
                    $ingredientes->save();
                    $_SESSION["sucesso"] = "Ingrediente cadastrado com sucesso!";
                }else{
                    $_SESSION["erro"] = "Preencha todos os campos.";
                }
            }else{
                $_SESSION["erro"] = "Já existe este ingrediente.";
            }
            return $this->router->redirect("admin/cadastrar/ingrediente");
        }else{
            return $this->router->redirect("naologado");
        }
    }

    public function read($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $admins = new Admin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin && $admin->nivel_acesso <= 3){
            $ingredientes = new modelIngrediente();
            $ingredientes = $ingredientes->find()->fetch(true);
            $usuario = $_SESSION["usuario"];
            echo $this->view->render("admin/ingredientes/listar", ["ingredientes" => $ingredientes, "usuario" => $usuario, "admin" => $admin]);
        }else{
            return $this->router->redirect("naologado");
        }
    }

    public function add($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $admins = new Admin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin && $admin->nivel_acesso == 1){
            $usuario = $_SESSION["usuario"];
            echo $this->view->render("admin/ingredientes/cadastrar", ["usuario" => $usuario, "admin" => $admin]);
        }else{
            return $this->router->redirect("naologado");
        }
    }

    public function show($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $admins = new Admin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin && $admin->nivel_acesso == 1){
            $id = $data["id"];
            $ingredientes = new modelIngrediente();
            $usuario = $_SESSION["usuario"];
            if($id){
                $ingrediente = $ingredientes->findById($id);
            }
            echo $this->view->render("admin/ingredientes/edit", ["ingrediente" => $ingrediente, "usuario" => $usuario, "admin" => $admin]);
        }else{
            return $this->router->redirect("naologado");
        }
    }

    public function edit($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $admins = new Admin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin && $admin->nivel_acesso == 1){
            $id = $data["id"];
            $nome = $data["nome"];
            $retirar = $data["retirar"];
            $ingredientes = new modelIngrediente();
            if($id && $nome && $retirar){
                $ingrediente = $ingredientes->findById($id);
    
                $ingrediente->nome = $nome;
                $ingrediente->retirar = $retirar;
                $ingrediente->save();
    
                $_SESSION["sucesso"] = "Ingrediente editado com sucesso!";
                return $this->router->redirect("admin/listar/ingredientes");
            }else{
                $_SESSION["erro"] = "Preencha todos os campos";
                return $this->router->redirect("admin/edit/ingrediente/$id");
            }
        }else{
            return $this->router->redirect("naologado");
        }
    }

    public function delete($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $admins = new Admin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin && $admin->nivel_acesso == 1){
            $id = $data["id"];
            $ingredientes = new modelIngrediente();
            if($id){
                $ingrediente = $ingredientes->findById($id);
                $ingrediente->destroy();
    
                if($ingrediente->fail()){
                    $_SESSION["erro"] = $ingrediente->fail()->getMessage();
                    if($ingrediente->fail()->getMessage() == "SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`lanchonete2`.`ingredientes_cardapio`, CONSTRAINT `FK_ingredientes_cardapio_ingredientes` FOREIGN KEY (`id_ingrediente`) REFERENCES `ingredientes` (`id`))"){
                        $_SESSION["erro"] = "Você não pode exluir ingredientes que estão sendo utilizados em algum item do cardápio!";
                    }else{
                        $_SESSION["erro"] = "Ocorreu algum erro no banco de dados, contate um superior!";
                    }
                }else{
                    $_SESSION["sucesso"] = "Ingrediente deletado com sucesso!";
                }
                
            }else{
                $_SESSION["erro"] = "Algo de errado ocorreu!";
            }
            return $this->router->redirect("admin/listar/ingredientes");
        }else{
            return $this->router->redirect("naologado");
        }
    }

}
