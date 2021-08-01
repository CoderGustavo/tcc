<?php
	require_once '../../Model/Usuario.php';

	$usuario = new Usuario();

	session_start();
	if ($_POST['senha'] != $_POST['confirmarsenha']) {
		$_SESSION["erro"] = "As senhas não se correspondem.";
		header('location: ../../view/cadastrar.php');
	}
	else {
		$usuario->nome = $_POST['nome'];
		$usuario->email = $_POST['email'];
		$usuario->senha = $_POST['senha'];
		$usuario->telefone = $_POST['telefone'];
		$usuario->InserirCliente();
		$_SESSION["sucesso"] = "Você acaba de se cadastrar!";
		header('location: ../../view/login.php');
	}





?>

	



 