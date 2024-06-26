<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include('../config/conexao_pdo.php'); 
        include (ROOT_PATH.'/cabecalho.php'); 
    ?>
    <title>Cadastro de Usuário</title>
</head>
<body>
<div class="container">
<h1>Cadastro de usuário</h1>
    <br>
    <form action="salvar_cadastro.php" method="post">
        <p>Nome</p>
        <p><input class="form-control" type="text" name="nome" id="nome" required></p>
        <br>
        <p>E-mail</p>
        <p><input class="form-control" type="email" name="email" id="email" required></p>
        <br>
        <p>Usuário</p>
        <p><input class="form-control" type="text" name="username" id="username" required></p>
        <br>
        <p>Celular</p>
        <p><input class="form-control" type="number" name="celular" id="celular" ></p>
        <br>
        <p>Senha</p>
        <p><input class="form-control" type="password" name="senha" id="senha" required></p>
        <br>
        <input type="submit" value="Salvar">
    </form>
</div>
</body>
</html>