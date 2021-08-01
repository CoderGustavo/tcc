<?php 
	session_start();

	require_once '../../model/Avaliacao.php';

	$avaliacao = new Avaliacao();

	$avaliacao->estrela = $_POST['estrela'];
	$avaliacao->comentario = $_POST['comentario'];
	$avaliacao->idUsuario = $_SESSION['id_usuario'];

	$verificar = $_POST['estrela'];

	if ($verificar > 0) {
		$comentario->inserir();
		echo "Sua avaliação está aguardando aprovação e será postado em breve!";
	} else {
		echo "Por favor, selecione ao menos uma estrela!";
    }

 ?>