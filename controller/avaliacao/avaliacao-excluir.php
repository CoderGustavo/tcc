<?php
require_once '../../model/Avaliacao.php';

$idAvaliacao = $_GET['id'];
$link = $_GET['link'];
$avaliacao = new Avaliacao($idAvaliacao);

$avaliacao->excluir();
header('Location: ' . $link);
?>