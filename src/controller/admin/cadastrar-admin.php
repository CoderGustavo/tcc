<?php
	require_once '../../Model/Admin.php';

	$usuario = new Admin();

	session_start();
	if ($_POST['senha'] != $_POST['confirmarsenha']) {
		$_SESSION["erro"] = "As senhas não se correspondem.";
		header('location: ../../view/admin/cadastrarAdmin.php');
	}
	else {
		$usuario->nome = $_POST['nome'];
		$usuario->email = $_POST['email'];
		$usuario->senha = $_POST['senha'];
		$usuario->telefone = $_POST['telefone'];
		$usuario->InserirAdmin();
		header('location: ../../view/admin/listaAdmin.php');
	}





?>

	



 