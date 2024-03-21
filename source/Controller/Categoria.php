<?php

namespace Source\Controller;

use CoffeeCode\DataLayer\Connect;
use League\Plates\Engine;
use CoffeeCode\Router\Router;
use Source\Model\Admin;
use Source\Model\Cardapio as modelCardapio;
use Source\Model\Categoria_cardapio;
use Source\Model\Ingrediente;
use Source\Model\Ingrediente_cardapio;
use Source\Model\Item_pedido;

class Categoria
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
            $categorias = new Categoria_cardapio();
    
            $nome = strtolower($data["nome"]);
    
            $existe= $categorias->find("nome=:nome","nome=$nome")->fetch();
    
            if(empty($existe)){
                if($nome){
                    $categorias->nome = $nome;
                    $categorias->save();
                    $_SESSION["sucesso"] = "Categoria cadastrada com sucesso!";
                }else{
                    $_SESSION["erro"] = "Preencha todos os campos.";
                }
            }else{
                $_SESSION["erro"] = "Este item já existe.";
            }
    
            return $this->router->redirect("admin/cadastrar/categoria");
        }else{
            return $this->router->redirect("naologado");
        }
    }

    public function read($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $admins = new Admin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin && $admin->nivel_acesso == 1){
            $categorias = new Categoria_cardapio();
            $categorias = $categorias->find()->fetch(true);
            $usuario = $_SESSION["usuario"];
            echo $this->view->render("admin/categoria/listar", ["categorias" => $categorias, "usuario" => $usuario, "admin" => $admin]);
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
            echo $this->view->render("admin/categoria/cadastrar", ["usuario" => $usuario, "admin" => $admin]);
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
            $categorias = new Categoria_cardapio();
            if($id){
                $categoria = $categorias->findById($id);
                $categoria->destroy();
    
                if($categoria->fail()){
                    //$_SESSION["erro"] = $categoria->fail()->getMessage();
                    if($categoria->fail()->getMessage() == "SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`lanchonete2`.`cardapio`, CONSTRAINT `FK_cardapio_categorias_cardapio` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_cardapio` (`id`))"){
                        $_SESSION["erro"] = "Algum item no cardapio esta utilizando esta categoria, exclua todos antes!";
                    }
                }else{
                    $_SESSION["sucesso"] = "Deletado com sucesso";
                }
            }else{
                $_SESSION["erro"] = "Algo de errado!";
            }
            return $this->router->redirect("admin/listar/categorias");
        }else{
            return $this->router->redirect("naologado");
        }
    }

    public function showEdit($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $admins = new Admin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin && $admin->nivel_acesso == 1){
            $usuario = $_SESSION["usuario"];
            $id = $data["id"];
            $categorias = new Categoria_cardapio();
            $categoria = $categorias->findById($id);
            echo $this->view->render("admin/categoria/edit", ["categoria"=>$categoria,"usuario" => $usuario, "admin" => $admin]);
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
            $nome = strtolower($data["nome"]);
            $categorias = new Categoria_cardapio();
            $categoria = $categorias->findById($id);
            if($id && $nome){
                $categoria->nome = $nome;
                $categoria->save();
                $_SESSION["sucesso"] = "Categoria editada com sucesso!";
            }else{
                $_SESSION["erro"] = "Preencha todos os campos!";
            }
            return $this->router->redirect("admin/listar/categorias");
        }else{
            return $this->router->redirect("naologado");
        }
    }

}
