<?php 
	// 1. Chamar a classe usuario
	// 2. Criar o objeto
	// 3. Passar os valores que o usuário digitou no formulário
	// 4. Inserir os registros (valores) na tabela, usando Inserir()
	// 5. Redirecionamento para a tela de listar

	// 1.
	require_once 'classe/Usuario.php';

	// 2.
	$usuario = new Usuario();

	//3.
	if ($_POST['senha'] != $_POST['confirmarsenha']) {
		session_start();
		$_SESSION["erro"] = "ERRO! As senhas não são iguais.";
		echo $_SESSION["erro"];
		header('location: pages/cadastrarAdmin.php');
	}
	else {
		$usuario->nome = $_POST['nome'];
		$usuario->email = $_POST['email'];
		$usuario->senha = $_POST['senha'];
		$usuario->telefone = $_POST['telefone'];
		$usuario->endereco = $_POST['endereco'];
	
		$usuario->InserirAdmin();
		header('location: pages/listaAdmin.php');
	}





?>

	



 