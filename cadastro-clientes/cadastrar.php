<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <?php 
		include ('../verifica-sessao.php');
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
</head>
<body>
<div class="container">
<h1>Cadastro de clientes</h1>
    <br>
    <form action="salvar_cadastro.php" method="post">
        <p>Nome</p>
        <p><input type="text" name="nome" id="nome" ></p>
        <br>
        <p>Valor Limite</p>
        <p><input type="text" name="valor_limite" id="valor_limite" ></p>
        <br>
        <input type="submit" value="Salvar">
    </form>
</div>
</body>
</html>