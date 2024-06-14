<?php 
	session_start();
	if(!isset($_SESSION['usuario_email'])){
		echo "voce não esta logado";
		header('location:/pcc/login/login.php');
		exit;
	}else{
		include ('cabecalho.php');
	}
?>