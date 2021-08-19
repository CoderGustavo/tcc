<?php

$nome = $_POST["usuario"];
$senha = $_POST["senha"];

require_once "../../model/Usuario.php";

$usuario = new Usuario();
$usuario->usuario = $usuario;
$usuario->senha = $senha;
$logado = $usuario->LogarUsuario($nome, $senha);

session_start();
if ($logado == null) {
	$_SESSION["erro"] = "Credenciais incorretas!";
	header('Location: ../../view/login.php');
} else {
	$_SESSION['usuario_logado'] = 1;
	$_SESSION['id_usuario'] = $logado['id'];
	$_SESSION['senha_usuario'] = $logado['senha'];
	$_SESSION['nome_usuario'] = $logado['nome'];
	header('Location: /tcc');
}
