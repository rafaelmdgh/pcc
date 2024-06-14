<?php 
include('../config/conexao_pdo.php');
include(ROOT_PATH.'cabecalho.php');

$codigo = $_GET['codigo'];

//recupera um unico registro da consulta

$stmt = $pdo->prepare("SELECT * FROM fornecedor WHERE fornecedor_codigo = :codigo");
$stmt->bindValue(':codigo', $codigo);
$stmt->execute();

$fornecedor = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa Teste</title>
</head>
<body>
<h1>Editar fornecedor</h1>
    <br>
    <form action="editar_cadastro.php" method="post">
        <input type="hidden" name="codigo" id="codigo" value="<?php echo $fornecedor['fornecedor_codigo']; ?>">
        <p>Nome</p>
        <p><input type="text" name="nome" id="nome" value="<?php echo $fornecedor['fornecedor_nome'] ?>" ></p>
        <br>
        <p>Valor Limite</p>
        <p><input type="text" name="valor_limite" id="valor_limite" value="<?php echo $fornecedor['fornecedor_valor_limite'] ?>" ></p>
        <br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>