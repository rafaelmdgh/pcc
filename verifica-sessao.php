<?php 
	include('cabecalho.php');
	session_start();
	if(!isset($_SESSION['usuario_email'])){
		echo '<script>alertaErro("Você não está logado!",false)</script>';
		header('location:/pcc/login/login.php');
		exit;
	}else{
		include ('cabecalho.php');
	}
?>