<?php

namespace Source\Controller;

use League\Plates\Engine;
use CoffeeCode\Router\Router;
use Source\Model\Admin as ModelAdmin;
use Source\Model\Usuario;

class Admin
{

    public function __construct()
    {
        $this->router = new Router(URL_BASE);
        $this->view = Engine::create(__DIR__."/../../View","php");
    }


    public function home(){
        session_start();
        $usuario = $_SESSION["usuario"];
        echo $this->view->render("admin/index",["usuario" => $usuario]);
    }

    public function read($data){
        session_start();
        $admins = new ModelAdmin();
        $usuarios = new Usuario();
        $admins = $admins->find()->fetch(true);
        foreach ($admins as $key => $admin) {
            $usuarios = $usuarios->findById($admin->id_usuario);
            $admin->nome = $usuarios->nome;
            $admin->email = $usuarios->email;
            $admin->telefone = $usuarios->telefone;
        }
        $usuario = $_SESSION["usuario"];
        echo $this->view->render("admin/admins/listar",["admins" => $admins, "usuario" => $usuario]);
    }
    
    public function add($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        echo $this->view->render("admin/admins/cadastrar",["usuario" => $usuario]);
    }

    public function create($data){
        $usuario = new Usuario();
        $admin = new ModelAdmin();

        $nome = $data["nome"];
        $email = $data["email"];
        $telefone = $data["telefone"];
        $senha = $data["senha"];
        $confirmasenha = $data["confirmasenha"];
        $nivel_acesso = $data["nivel_acesso"];

        $emails = $usuario->find()->fetch(true);
        $emailexiste = 0;

        foreach ($emails as $key => $value) {
            if($value->email == $email){
                $emailexiste = 1;
            }
        }

        if($nome && $email && $telefone && $senha && $confirmasenha){
            if($emailexiste == 0){
                if($senha == $confirmasenha){
                    $usuario->nome = $nome;
                    $usuario->email = $email;
                    $usuario->telefone = $telefone;
                    $usuario->senha = $senha;
                    
                    $userId = $usuario->save();

                    $usuarioid = $usuario->find("email = :email", "email=$email")->fetch();

                    $admin->nivel_acesso = $nivel_acesso;
                    $admin->id_usuario = $usuarioid->id;

                    $adminId = $admin->save();

    
                    $_SESSION["sucesso"] = "Você acaba de cadastrar um administrador com sucesso!";
                    $this->router->redirect("admin/cadastrar/admin");
                }else{
                    $_SESSION["valores"] = $data;
                    $_SESSION["erro"] = "As senhas não se correspondem!";
                    $this->router->redirect("admin/cadastrar/admin",);
                }
            }else{
                $_SESSION["valores"] = $data;
                $_SESSION["erro"] = "Já existe uma conta com este email!";
                $this->router->redirect("admin/cadastrar/admin");
            }
        }else{
            $_SESSION["valores"] = $data;
            $_SESSION["erro"] = "Preencha todos os campos!";
            $this->router->redirect("admin/cadastrar/admin");
        }

    }

    public function delete($data){
        session_start();
        $id = $data["id"];
        $admins = new modelAdmin();
        if($id){
            $admin = $admins->findById($id);
            $admin->destroy();
            $_SESSION["sucesso"] = "Admin deletado com sucesso!";
        }else{
            $_SESSION["erro"] = "Algo de errado ocorreu!";
        }
        return $this->router->redirect("admin/listar/admins");
    }
}
