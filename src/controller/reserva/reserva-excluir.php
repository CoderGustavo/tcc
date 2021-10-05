<?php
require_once '../../model/Reserva.php';

$idReserva = $_GET['idReserva'];
$link = $_GET['link'];
$reserva = new Reserva($idReserva);
$reserva->excluir();

header('Location:' . $link);
?>