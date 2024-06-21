<?php 
include('../verifica-sessao.php');
include('../config/conexao_pdo.php');

$codigo = $_GET['codigo'];

//recupera um unico registro da consulta

$stmt = $pdo->prepare("SELECT * FROM meta WHERE meta_codigo = :codigo");
$stmt->bindValue(':codigo', $codigo);
$stmt->execute();

$meta = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Meta</title>
</head>
<body>
<div class="container">
<h1>Editar meta</h1>
    <br>
    <form action="editar_cadastro.php" method="post">
        <input type="hidden" name="codigo" id="codigo" value="<?php echo $meta['meta_codigo']; ?>">
        <p>Nome</p>
        <p><input type="text" name="nome" id="nome" value="<?php echo $meta['meta_nome'] ?>" ></p>
        <br>
        <p>Valor Limite</p>
        <p><input type="text" name="valor" id="valor" value="<?php echo $meta['meta_valor'] ?>" ></p>
        <br>
        <input type="submit" value="Salvar">
    </form>
</div>
</body>
</html>