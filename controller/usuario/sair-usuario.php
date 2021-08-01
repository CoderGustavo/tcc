<?php
session_start();
$_SESSION['usuario_logado'] = 0;
session_destroy();
header('Location: ../../view/index.php');
?>