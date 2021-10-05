<?php

$nome = $_POST["usuario"];
$senha = $_POST["senha"];

require_once "../../model/Usuario.php";

$usuario = new Usuario();
$usuario->usuario = $usuario;
$usuario->senha = $senha;
$logado = $usuario->Logar($nome, $senha);

session_start();
if ($logado == null) {
	$_SESSION["erro"] = "Credenciais incorretas!";
	header('Location: ../../view/login.php');
} else {
	$_SESSION['usuario'] = $logado;
	header('Location: /tcc');
}
