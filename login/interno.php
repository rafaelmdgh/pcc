<?php
include('../cabecalho.php');
session_start();

if(!isset($_SESSION['usuario_email'])){
    echo '<script>alertaErro("Você não está logado!",true)</script>';
    die();
}
header('location: /pcc/index.php');
?>
<!--<a href="sair.php">Sair</a>-->