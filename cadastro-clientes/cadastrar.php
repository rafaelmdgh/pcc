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
<div class="container personalizado">
    <div class="caixa-cadastro">
<h1>Cadastro de clientes</h1>
    <br>
    <form action="salvar_cadastro.php" method="post">
        <label for="nome">Nome</label>
        <p><input class="form-control" type="text" name="nome" id="nome" ></p>
        <br>
        <p>Valor Limite</p>
        <p><input class="form-control" type="text" name="valor_limite" id="valor_limite" ></p>
        <br>
        <input type="submit" class="btn btn-primary" value="Salvar">
    </form>
    </div>
</div>
</body>
</html>