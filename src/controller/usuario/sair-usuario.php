<?php
session_start();
$_SESSION['usuario'] = null;
session_destroy();
header('Location: ../../view/index.php');
?>