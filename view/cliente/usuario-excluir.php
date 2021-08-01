<?php
    require_once 'classe/Usuario.php';

    $idUsuario = $_GET['id'];
    $link = $_GET['link'];
    $usuario = new Usuario();

    $usuario->Excluir($idUsuario);

    header('Location: ' . $link);
?>