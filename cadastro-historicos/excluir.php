<?php
include('../verifica-sessao.php');
include('../config/conexao_pdo.php');

$codigo = $_GET['codigo'];
$usuario = $_SESSION['usuario_codigo'];

$sql = "DELETE FROM historico WHERE historico_codigo = :codigo and historico_usuario = :usuario";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':codigo', $codigo);
$stmt->bindValue(':usuario', $usuario);
$stmt->execute();


echo "<br>Excluido com sucesso!";
echo '<script>alertaSucesso("Cadastrado com sucesso!","lista.php")</script>';

?>