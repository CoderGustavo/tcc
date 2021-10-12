<?php

namespace Source\Controller;

use chillerlan\QRCode\{QRCode, QROptions};
use League\Plates\Engine;
use CoffeeCode\Router\Router;
use Source\Model\Reserva as modelReserva;

class Reserva
{

    public function __construct()
    {
        $this->router = new Router(URL_BASE);
        $this->view = Engine::create(__DIR__."/../../View", "php");
    }


    public function create($data){
        session_start();

        $reserva = new modelReserva();

        $datahora = $data["data"]." ".$data["hora"];
        $pessoas = $data["numeropessoas"];
        $obs = $data["obs"];

        if($datahora){
            if($_SESSION["usuario"]){
                $reserva->id_usuario = $_SESSION["usuario"]->id;
                $reserva->datahora = $datahora;
                $reserva->numero_pessoas = $pessoas;
                $reserva->observacao = $obs;
                $reserva->status = "Realizada";
        
                $reservaId = $reserva->save();
                echo "Reserva realizada com sucesso!";
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
        $reservas = new modelReserva();
        $reservas = $reservas->find()->fetch(true);
        $usuario = $_SESSION["usuario"];
        $status = null;

        $options = new QROptions([
            'version' => 5,
            'imageTransparent' => false,
            'imageTransparentBG' => [255.255,255],
        ]);
        $qrcode = new QRCode($options);
        for ($i=1; $i <= 10 ; $i++) { 
            $url = "localhost/mesa/$i";
            $qrcodes[$i] = $qrcode->render($url);
        }

        echo $this->view->render("admin/reservas/listar", ["reservas" => $reservas, "usuario" => $usuario, "status" => $status, "qrcodes" => $qrcodes]);
    }

    public function readStatus($data){
        session_start();
        $reservas = new modelReserva();
        $reservas = $reservas->find("status=:status", "status={$data["status"]}")->fetch(true);
        $usuario = $_SESSION["usuario"];
        foreach ($reservas as $key => $reserva) {
            $reserva->nome = $_SESSION["usuario"]->nome;
            $reserva->telefone = $_SESSION["usuario"]->telefone;
        }
        $status = $data["status"];

        $options = new QROptions([
            'version' => 5,
            'imageTransparent' => false,
            'imageTransparentBG' => [255.255,255],
        ]);
        $qrcode = new QRCode($options);
        for ($i=1; $i <= 10 ; $i++) { 
            $url = "localhost/mesa/$i";
            $qrcodes[$i] = $qrcode->render($url);
        }
        
        echo $this->view->render("admin/reservas/listar", ["reservas" => $reservas, "usuario" => $usuario, "status" => $status, "qrcodes" => $qrcodes]);
    }



}
