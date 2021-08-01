<?php
session_start();
$_SESSION['usuario_logado'] = 0;
header('Location: ../index.php');
?>