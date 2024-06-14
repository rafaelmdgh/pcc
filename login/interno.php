<?php
session_start();

if(!isset($_SESSION['usuario_email'])){
    echo "voce não esta logado";
    die();
}
header('location: /pcc/index.php');
?>
<!--<a href="sair.php">Sair</a>-->