<?php
require_once 'classe/Delivery.php';

$id = $_GET['id'];
$status = $_GET['status'];
$link = $_GET['link'];


$delivery = new Delivery();

$delivery->id = $id;
$delivery->status = $status;

$delivery->atualizar();

header('Location:' . $link);


?>