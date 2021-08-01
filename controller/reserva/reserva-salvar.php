<?php 
	session_start();

	require_once '../../model/Reserva.php';

	$reserva = new Reserva();

	$a = explode("/", $_POST['data']);
	$data = $a[0]."-".$a[1]."-".$a[2];
	$b = explode("h", $_POST['hora']);
	$hora = $b[0].":".$b[1];

	if(strlen($data) < 10){
		echo "<strong> ERRO </strong> Digite a data corretamente!";
	}else if(strlen($hora < 5)){
		echo "<strong> ERRO </strong> Digite a hora corretamente!";
	}

	$reserva->idUsuario = $_SESSION['id_usuario'];
	$reserva->datahora = $data." ".$hora;
	$reserva->numeropessoas = $_POST['numeropessoas'];
	$reserva->obs = $_POST['obs'];

	if ($reserva->numeropessoas > 10) {
		echo "<strong> ERRO </strong> Caramba, quanta gente! Número máximo de pessoas atingido";
	} else {
		$reserva->inserir();
	echo "Reserva cadastrada, entraremos em contato em breve";
	}
 ?>