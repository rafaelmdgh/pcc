<?php 
include('../verifica-sessao.php');
include('../config/conexao_pdo.php');

$codigo = $_GET['codigo'];

//recupera um unico registro da consulta

$stmt = $pdo->prepare("SELECT * FROM historico WHERE historico_codigo = :codigo AND historico_usuario =".$_SESSION['usuario_codigo']."");
$stmt->bindValue(':codigo', $codigo);
$stmt->execute();

$historico = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Histórico</title>
</head>
<body>
<div class="container caixa-cadastro">
<h1>Editar Histórico</h1>
    <br>
    <form action="editar_cadastro.php" method="post">
        <input type="hidden" name="codigo" id="codigo" value="<?php echo $historico['historico_codigo']; ?>">
        <p>Nome</p>
        <p><input class="form-control" type="text" name="nome" id="nome" value="<?php echo $historico['historico_nome'] ?>" ></p>
        <br>
        <p>Valor Limite</p>
        <p><input class="form-control" type="number" step="0.01" min=0 name="valor_limite" id="valor_limite" value="<?php echo $historico['historico_valor_limite'] ?>" ></p>
        <br>
        <input type="submit" class="btn btn-primary" value="Salvar">
    </form>
</div>
</body>
</html>