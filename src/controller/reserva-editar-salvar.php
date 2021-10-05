<?php
require_once 'classe/Reserva.php';

$idReserva = $_POST['idReserva'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$data = $_POST['data'];
$horario = $_POST['horario'];
$numeropessoas = $_POST['numeropessoas'];
$obs = $_POST['obs'];

$reserva = new Reserva($idReserva);

$reserva->nome = $nome;
$reserva->telefone = $telefone;
$reserva->email = $email;
$reserva->data = $data;
$reserva->horario = $horario;
$reserva->numeropessoas = $numeropessoas;
$reserva->obs = $obs;

$reserva->atualizar();

header('Location: reserva-listar.php');
?>