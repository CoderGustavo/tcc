<?php
    session_start();
    require_once '../../model/Endereco.php';
    $endereco = new Endereco();

    $endereco->id_Usuario = $_SESSION["usuario"]["id"];
    $endereco->logradouro = $_POST["rua"];
    $endereco->bairro = $_POST["bairro"];
    $endereco->numero = $_POST["numero"];
    $endereco->referencia = $_POST["referencia"];

    $endereco->inserir();

    header('location: ../../');
?>