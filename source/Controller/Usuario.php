<?php

namespace Source\Controller;

use League\Plates\Engine;
use CoffeeCode\Router\Router;
use Source\Model\Admin;
use Source\Model\Pedido;
use Source\Model\Usuario as modelUsuario;

class Usuario
{

    public function __construct()
    {
        $this->router = new Router(URL_BASE);
        $this->view = Engine::create(__DIR__."/../../View", "php");
    }

    public function login($data){
        session_start();
        

        $email = strtolower($data["email"]);
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

        $nome = strtolower($data["nome"]);
        $email = strtolower($data["email"]);
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

    public function createClient($data){
        session_start();
        $usuario = new modelUsuario();

        $nome = strtolower($data["nome"]);
        $email = strtolower($data["email"]);
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
                    $this->router->redirect("admin/cadastrar/cliente");
                }else{
                    $_SESSION["valores"] = $data;
                    $_SESSION["erro"] = "As senhas não se correspondem!";
                    $this->router->redirect("admin/cadastrar/cliente",);
                }
            }else{
                $_SESSION["valores"] = $data;
                $_SESSION["erro"] = "Já existe uma conta com este email!";
                $this->router->redirect("admin/cadastrar/cliente");
            }
        }else{
            $_SESSION["valores"] = $data;
            $_SESSION["erro"] = "Preencha todos os campos!";
            $this->router->redirect("admin/cadastrar/cliente");
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

    public function myAccount($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        echo $this->view->render("usuario/minhaconta",["usuario" => $usuario]);
    }

    public function myOrders($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $pedidos = new Pedido();
        $pedidos = $pedidos->find("id_usuario=:userid","userid={$usuario->id}")->fetch(true);
        echo $this->view->render("usuario/meuspedidos",["usuario" => $usuario, "pedidos" => $pedidos]);
    }

    public function update($data){
        session_start();
        $email = $data["email"]; 
        $telefone = $data["telefone"];
        $senha = $data["senha"];

        $usuariologado = $_SESSION["usuario"];
        $usuario = new modelUsuario();
        $usuario = $usuario->findById($usuariologado->id);

        if($email && $telefone && $senha){
            if($senha == $usuario->senha){
                $usuario->email = $email;
                $usuario->telefone = $telefone;
                $usuario->save();

                if($usuario->fail()){
                    $_SESSION["erro"] = $usuario->fail()->getMessage();
                }else{
                    $admin = $usuariologado->admin;
                    $usuario->admin = $admin;
                    $_SESSION["usuario"] = $usuario;
                    $_SESSION["sucesso"] = "Conta atualizada!";
                }

            }else{
                $_SESSION["erro"] = "Senha incorreta.";
            }
        }else{
            $_SESSION["erro"] = "Preencha todos os campos.";
        }

        return $this->router->redirect("conta/minhaconta");
    }

    public function transformarAdmin($data){
        session_start();
        $id = $data["id"];
        $nivel_acesso = $data["nivel_acesso"];
        $usuarios = new modelUsuario();
        $admins = new Admin();
        if($id && $nivel_acesso){
            //$usuario = $usuarios->findById($id);
            $admin = $admins->find("id_usuario=:iduser","iduser=$id")->fetch();
            if($admin){
                switch ($admin->nivel_acesso) {
                    case 1:
                        $_SESSION["erro"] = "Este Cliente já é um(a) Admin!";
                    break;
                    case 2:
                        $_SESSION["erro"] = "Este Cliente já é um(a) Caixa!";
                    break;
                    case 3:
                        $_SESSION["erro"] = "Este Cliente já é um(a) Chapeiro!";
                    break;
                    case 4:
                        $_SESSION["erro"] = "Este Cliente já é um(a) Garçom!";
                    break;
                    
                    default:
                        $_SESSION["erro"] = "Algo de errado está com este cliente! Procure um superior!";
                    break;
                }
            }else{
                $admins->id_usuario = $id;
                $admins->nivel_acesso = $nivel_acesso;
                $admins->save();
                $_SESSION["sucesso"] = "Cliente atualizado com sucesso!";
            }
        }else{
            $_SESSION["erro"] = "Algo errado aconteceu com as informações, tente novamente!";
        }
        return $this->router->redirect("admin/listar/clientes");
        
    }
    
    public function delete($data){
        session_start();
        $id = $data["id"];
        $usuarios = new modelUsuario();
        $admins = new Admin();
        if($id){
            $admin = $admins->find("id_usuario=:iduser","iduser=$id")->fetch();
            if($admin){
                $admin->destroy();
            }
            $usuario = $usuarios->findById($id);
            $usuario->destroy();

            $_SESSION["sucesso"] = "Cliente deletado com sucesso!";
        }else{
            $_SESSION["erro"] = "Algo de errado ocorreu!";
        }
        return $this->router->redirect("admin/listar/clientes");
    }
}
