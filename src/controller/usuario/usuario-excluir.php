<?php
    require_once '../../model/Usuario.php';

    $idUsuario = $_GET['id'];
    $link = $_GET['link'];
    $usuario = new Usuario();

    $usuario->Excluir($idUsuario);

    header('Location: ' . $link);
?>