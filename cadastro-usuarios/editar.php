<?php 
include('../verifica-sessao.php');
include('../config/conexao_pdo.php');

$id = $_GET['id'];

//recupera um unico registro da consulta

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
$stmt->bindValue(':id', $id);
$stmt->execute();

$usuario = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
<div class="container caixa-home">
<h1>Editar de usuários</h1>
    <br>
    <form action="editar_cadastro.php" method="post">
        <input type="hidden" name="id" id="id" value="<?php echo $usuario['id']; ?>">
        <p>Nome</p>
        <p><input class="form-control" type="text" name="nome" id="nome" value="<?php echo $usuario['nome'] ?>" ></p>
        <br>
        <p>E-mail</p>
        <p><input class="form-control" type="text" name="email" id="email" value="<?php echo $usuario['email'] ?>" ></p>
        <br>
        <p>Senha</p>
        <p><input class="form-control" type="text" name="senha" id="senha" value="<?php echo $usuario['senha'] ?>" ></p>
        <br>
        <input type="submit" class="btn btn-primary" value="Salvar">
    </form>
</div>
</body>
</html>