<?php
    require_once '../../model/Admin.php';

    $idUsuario = $_GET['id'];
    $link = $_GET['link'];
    $admin = new Admin();

    $admin->Excluir($idUsuario);

    header('Location: ' . $link);
?>