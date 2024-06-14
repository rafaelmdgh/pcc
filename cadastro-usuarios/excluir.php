<?php
include('../config/conexao_pdo.php');
$id = $_GET['id'];

$sql = "DELETE FROM usuario WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id);
$stmt->execute();


echo "<br>Excluido com sucesso!";
echo "<br><a href='lista.php'>Lista de usuários</a>";
?>