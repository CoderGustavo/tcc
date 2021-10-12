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


}
