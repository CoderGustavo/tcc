<?php

namespace Source\Controller;

use League\Plates\Engine;
use CoffeeCode\Router\Router;
use Source\Model\Admin;
use Source\Model\Usuario as modelUsuario;

class Usuario
{

    public function __construct()
    {
        $this->router = new Router(URL_BASE);
        $this->view = Engine::create(__DIR__."/../../View", "php");
    }

    public function login($data)
    {
        session_start();
        

        $email = $data["email"];
        $senha = $data["senha"];

        $usuario = new modelUsuario();
        $admin = new Admin();
        $usuario = $usuario->find("email = :email AND senha = :senha", "email=$email&senha=$senha")->fetch(true);

        
        if(isset($usuario)){
            foreach ($usuario as $key => $value) {
                $usuario = $value;
            }
            $admin = $admin->find("id_usuario=:iduser", "iduser={$usuario->id}")->fetch(true);
            $usuario->admin = $admin;
            $_SESSION["usuario"] = $usuario;
            return $this->router->redirect('/');
        }else{
            $_SESSION["erro"] = "Algumas de suas credenciais estão incorretas!";
            return $this->router->redirect('/login');
        }
    }

    public function create($data){
        session_start();
        $usuario = new modelUsuario();

        $nome = $data["nome"];
        $email = $data["email"];
        $telefone = $data["telefone"];
        $senha = $data["senha"];
        $confirmasenha = $data["confirmasenha"];

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
    
                    $_SESSION["sucesso"] = "Você acaba de se cadastrar com sucesso!";
                    $this->router->redirect("login");
                }else{
                    $_SESSION["valores"] = $data;
                    $_SESSION["erro"] = "As senhas não se correspondem!";
                    $this->router->redirect("cadastro",);
                }
            }else{
                $_SESSION["valores"] = $data;
                $_SESSION["erro"] = "Já existe uma conta com este email!";
                $this->router->redirect("cadastro");
            }
        }else{
            $_SESSION["valores"] = $data;
            $_SESSION["erro"] = "Preencha todos os campos!";
            $this->router->redirect("cadastro");
        }

    }

    public function logout($data){
        session_start();
        $_SESSION["usuario"] = null;
        session_destroy();
        return $this->router->redirect("/");
    }

    public function read($data){
        session_start();
        $usuarios = new modelUsuario();
        $usuarios = $usuarios->find()->fetch(true);
        $usuario = $_SESSION["usuario"];
        echo $this->view->render("admin/clientes/listar",["usuarios" => $usuarios, "usuario" => $usuario]);
    }
    public function add($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        echo $this->view->render("admin/clientes/cadastrar",["usuario" => $usuario]);
    }
}
