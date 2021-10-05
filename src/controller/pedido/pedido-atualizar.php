<?php
require_once '../../model/Pedido.php';

$id = $_GET['id'];
$status = $_GET['status'];
$link = $_GET['link'];


$pedido = new Pedido();

$pedido->id = $id;
$pedido->status = $status;

$pedido->atualizar();

header('Location:' . $link);


?>