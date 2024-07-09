<?php 
include('../verifica-sessao.php');
include('../config/conexao_pdo.php');

$codigo = $_GET['codigo'];

//recupera um unico registro da consulta

$stmt = $pdo->prepare("SELECT * FROM meta WHERE meta_codigo = :codigo AND meta_usuario =".$_SESSION['usuario_codigo']."");
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
<div class="container caixa-cadastro">
<h1>Editar meta</h1>
    <br>
    <form action="editar_cadastro.php" method="post">
        <input type="hidden" name="codigo" id="codigo" value="<?php echo $meta['meta_codigo']; ?>">
        <p>Nome</p>
        <p><input class="form-control" type="text" name="nome" id="nome" value="<?php echo $meta['meta_nome'] ?>" ></p>
        <br>
        <p>Valora</p>
        <p><input class="form-control" type="number" step="0.01" min=0 name="valor" id="valor" value="<?php echo $meta['meta_valor'] ?>" ></p>
        <br>
        <input type="submit" class="btn btn-primary" value="Salvar">
    </form>
</div>
</body>
</html>