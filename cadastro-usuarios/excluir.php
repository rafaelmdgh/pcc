<?php
include('../config/conexao_pdo.php');
include('../cabecalho.php'); 
$id = $_GET['id'];
$sql = "DELETE FROM usuario WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id);
$stmt->execute();


echo '<script>alertaSucesso("Excluído com sucesso!","lista.php")</script>';

?>