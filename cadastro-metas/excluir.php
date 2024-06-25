<?php
include('../verifica-sessao.php');
include('../config/conexao_pdo.php');

$codigo = $_GET['codigo'];
$usuario = $_SESSION['usuario_codigo'];

$sql = "SELECT meta_imagem FROM meta WHERE meta_codigo = :codigo and meta_usuario = :usuario";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':codigo', $codigo);
$stmt->bindValue(':usuario', $usuario);
$stmt->execute();
$nome_imagem = $stmt->fetch();
$nome_imagem = 'imagens/' . $nome_imagem['meta_imagem'];
if(file_exists($nome_imagem)){
	if(unlink($nome_imagem)){
		$sql = "DELETE FROM meta WHERE meta_codigo = :codigo and meta_usuario = :usuario";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':codigo', $codigo);
		$stmt->bindValue(':usuario', $usuario);
		$stmt->execute();
		echo '<script>alertaSucesso("Excluído com sucesso!","lista.php")</script>';
	}else{
		echo '<script>alertaErro("Não foi possível excluir imagem da meta!",true)</script>';
	}
}else{
	echo '<script>alertaErro("Imagem não encontrada!",true)</script>';
}	
?>