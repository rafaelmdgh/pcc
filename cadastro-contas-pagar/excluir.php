<?php
include('../config/conexao_pdo.php');
$codigo = $_GET['codigo'];
$usuario = $_SESSION['usuario_codigo'];

$sql = "DELETE FROM contas_pagar WHERE pagar_nr_lancamento = :codigo and pagar_usuario = :usuario";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':codigo', $codigo);
$stmt->bindValue(':usuario', $usuario);
$stmt->execute();


echo "<br>Excluido com sucesso!";
echo "<br><a href='lista.php'>Lista de usuários</a>";
?>