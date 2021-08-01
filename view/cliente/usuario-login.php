<?php
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
// Puxa os dados da caixa de texto do login 

$query = "SELECT * FROM usuario WHERE email='$usuario' and senha='$senha'";
// Seleciona os dados do BD de acordo com os que estão na caixa de texto

$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
$resultado = $conexao->query($query);
$logado = $resultado->fetch();


if ($logado == null) {
	// Usuário ou senha inválida
	header('Location: ../usuario-erro.php');
} 
else if ( $logado['identificacao'] == 1) {
	session_start();
	$_SESSION['usuario_logado'] = 1;
	$_SESSION['id_usuario'] = $logado['id'];
	$_SESSION['senha_usuario'] = $logado['senha'];
	header('Location: pages/index.php');


} else {
	session_start();
	$_SESSION['usuario_logado'] = 1;
	$_SESSION['id_usuario'] = $logado['id'];
	$_SESSION['senha_usuario'] = $logado['senha'];
	header('Location: /lanchonete');
}



// Verificar se há registros com o login e senha digitados
// Verificar se a identificação é 0 (Administrador) ou 1 (Cliente)
// Se for 0, vai para o "reserva-listar.php"
// Se for 1, vai para a página do cliente (será criada)