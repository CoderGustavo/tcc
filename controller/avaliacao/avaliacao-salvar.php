<?php 
	session_start();

	require_once '../../model/Avaliacao.php';

	$avaliacao = new Avaliacao();

	$avaliacao->estrela = $_POST['estrela'];
	$avaliacao->avaliacao = $_POST['avaliacao'];
	$avaliacao->idUsuario = $_SESSION['id_usuario'];

	$estrela = $_POST['estrela'];

	if ($estrela > 0) {
		$avaliacao->inserir();
		echo "Sua avaliação está aguardando aprovação e será postado em breve!";
	} else {
		echo "Por favor, selecione ao menos uma estrela!";
    }

 ?>