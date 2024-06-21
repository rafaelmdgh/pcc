<?php
include('../verifica-sessao.php');
include('../config/conexao_pdo.php');

$id = $_GET['id'];

$sql = "DELETE FROM usuario WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id);
$stmt->execute();


echo "<br>Excluido com sucesso!";
echo '<script>alertaSucesso("Cadastrado com sucesso!","lista.php")</script>';

?>