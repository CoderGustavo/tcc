<?php
require_once 'classe/Reserva.php';

$idReserva = $_GET['idReserva'];
$link = $_GET['link'];
$reserva = new Reserva($idReserva);

$reserva->aprovar();
header('Location:' . $link);


?>