<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <?php 
		include ('../verifica-sessao.php');
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Metas</title>
</head>
<body>
<div class="container">
<h1>Cadastro de Metas</h1>
    <br>
    <form action="salvar_cadastro.php" method="post" enctype="multipart/form-data">
        <p>Nome</p>
        <p><input class="form-control" type="text" name="nome" id="nome" required></p>
        <br>
        <p>Valor</p>
        <p><input class="form-control" type="text" name="valor" id="valor"></p>
        <br>
        <p>Imagem</p>
        <p><input class="form-control" type="file" name="imagem" id="imagem" accept="image/png, image/jpeg, image/jpg, image/gif" ></p>
        <br>
        <input type="submit" class="btn btn-primary" value="Salvar">
    </form>
</div>
</body>
</html>