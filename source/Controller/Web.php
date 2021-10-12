<?php

namespace Source\Controller;

use League\Plates\Engine;
use Source\Model\Avaliacao;
use Source\Model\Cardapio;
use Source\Model\Endereco;
use Source\Model\Reserva;

class Web
{
    private $view;

    public function __construct()
    {
        $this->view = Engine::create(__DIR__."/../../View", "php");
    }

    public function home($data): void
    {
        session_start();
        $cardapio = new Cardapio();
        $avaliacoes = new Avaliacao();

        
        $logado = 0;
        $usuario = 0;
        $enderecos = 0;
        $admin = 0;

        if(isset($_SESSION["usuario"])){
            $logado = 1;
            $usuario = $_SESSION["usuario"];
            $enderecos = new Endereco();
            $enderecos = $enderecos->find("id_usuario=:idUser","idUser=$usuario->id")->fetch(true);
            if(isset($usuario->admin)){
                $admin = 1;
            }
        }

        $cardapio = $cardapio->find()->fetch(true);
        $avaliacoes = $avaliacoes->find()->fetch(true);

        echo $this->view->render("index", [
            "cardapio" => $cardapio,
            "avaliacoes" => $avaliacoes,
            "logado" => $logado,
            "usuario" => $usuario,
            "enderecos" => $enderecos,
            "admin" => $admin,
        ]);
    }

    public function login($data)
    {
        echo $this->view->render("login.php");
    }

    public function register($data){
        echo $this->view->render("cadastro.php");
    }

    public function teste($data){
        $reservas = new Reserva();
        $reservas = $reservas->find()->fetch(true);
        foreach ($reservas as $key => $reserva) {
            if($reserva->id_usuario){
                echo $reserva->usuario()->nome;
            }
        }
    }

    public function error($data): void
    {
        echo "<h1>Error: ".$data['errcode']."</h1>";
    }
}
