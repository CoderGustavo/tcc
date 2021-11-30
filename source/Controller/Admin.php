<?php

namespace Source\Controller;

use League\Plates\Engine;
use CoffeeCode\Router\Router;
use Source\Model\Admin as ModelAdmin;
use Source\Model\Pedido;
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
        $admins = new modelAdmin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin){
            $pedidos = new Pedido();
            $pedidosTotal = $pedidos->find("status<>:status","status=sacola")->fetch(true);
            if($pedidosTotal){
                $qtdPedidos = count($pedidosTotal);
            }else{
                $qtdPedidos = 0;
            }
    
            $pedidosPendentes = $pedidos->find("status=:status","status=pendente")->fetch(true);
            if($pedidosPendentes){
                $qtdPedidosPendentes = count($pedidosPendentes);
            }else{
                $qtdPedidosPendentes = 0;
            }
    
            $usuarios = new Usuario();
            $usuarios = $usuarios->find()->fetch(true);
            if($usuarios){
                $qtdUsuarios = count($usuarios);
            }else{
                $qtdUsuarios = 0;
            }
    
            $admins = $admins->find()->fetch(true);
            if($admins){
                $qtdAdmins = count($admins);
            }else{
                $qtdAdmins = 0;
            }
    
            echo $this->view->render("admin/index",[
                "usuario" => $usuario,
                "qtdPedidos" => $qtdPedidos,
                "qtdPedidosPendentes" => $qtdPedidosPendentes,
                "qtdUsuarios" => $qtdUsuarios,
                "qtdAdmins" => $qtdAdmins,
                "admin" => $admin,
            ]);
        }else{
            return $this->router->redirect("naologado");
        }

    }

    public function read($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $admins = new modelAdmin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin && $admin->nivel_acesso == 1){
            $usuarios = new Usuario();
            $admins = $admins->find()->fetch(true);
            foreach ($admins as $key => $a) {
                $usuarios = $usuarios->findById($a->id_usuario);
                $a->nome = $usuarios->nome;
                $a->email = $usuarios->email;
                $a->telefone = $usuarios->telefone;
            }
            $usuario = $_SESSION["usuario"];
            echo $this->view->render("admin/admins/listar",["admins" => $admins, "usuario" => $usuario, "admin" => $admin]);
        }else{
            return $this->router->redirect("naologado");
        }
    }
    
    public function add($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $admins = new modelAdmin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin && $admin->nivel_acesso == 1){
            $usuario = $_SESSION["usuario"];
            echo $this->view->render("admin/admins/cadastrar",["usuario" => $usuario, "admin" => $admin,]);
        }else{
            return $this->router->redirect("naologado");
        }
    }

    public function create($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $admins = new modelAdmin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin && $admin->nivel_acesso == 1){
            $usuario = new Usuario();

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

                        $admins->nivel_acesso = $nivel_acesso;
                        $admins->id_usuario = $usuarioid->id;

                        $adminId = $admins->save();

        
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
        }else{
            return $this->router->redirect("naologado");
        }

    }

    public function delete($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $admins = new modelAdmin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin && $admin->nivel_acesso == 1){
            $id = $data["id"];
            if($id){
                $admin = $admins->findById($id);
                $admin->destroy();
                $_SESSION["sucesso"] = "Admin deletado com sucesso!";
            }else{
                $_SESSION["erro"] = "Algo de errado ocorreu!";
            }
            return $this->router->redirect("admin/listar/admins");
        }else{
            return $this->router->redirect("naologado");
        }
    }
}
