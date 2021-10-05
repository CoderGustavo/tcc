<?php
require_once '../../model/Reserva.php';

$id = $_GET['id'];
$link = $_GET['link'];
$reserva = new Reserva($id);


$reserva->aprovar();
header('Location:' . $link);


?>