<?php
require_once 'classe/Comentario.php';

$idComentario = $_GET['id'];
$link = $_GET['link'];
$comentario = new Comentario($idComentario);

$comentario->excluir();
header('Location: ' . $link);
?>