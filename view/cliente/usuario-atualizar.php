<?php
session_start();
require_once'../admin/classe/Usuario.php';

$usuario = new Usuario();

$usuario->email = $_POST['email'];
$usuario->telefone = $_POST['telefone'];
$usuario->endereco = $_POST['endereco'];
$usuario->confirmarsenha = $_POST['confirmarsenha'];


$senha = $_SESSION['senha_usuario'];
$idCliente = $_SESSION['id_usuario'];


if ($usuario->confirmarsenha == $senha){

	$usuario->atualizarCliente($idCliente);
	echo"Dados atualizados com sucesso :)";
  }

else {
	echo"Erro a senha não está correta";

}



?>