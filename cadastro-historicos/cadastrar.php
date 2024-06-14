<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <?php 
		include ('../verifica-sessao.php');
        include('../config/conexao_pdo.php');
        $sql = "SELECT * from tipo_historico";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $tipos = $stmt->fetchAll();
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de historicos</title>
</head>
<body>
<h1>Cadastro de historicos</h1>
    <br>
    <form action="salvar_cadastro.php" method="post">
        <p>Nome</p>
        <p><input type="text" name="nome" id="nome" required></p>
        <br>
        <p>Valor Limite</p>
        <p><input type="text" name="valor_limite" id="valor_limite" ></p>
        <br>
        <p>Tipo</p>
        <p><select name="tipo" id="tipo" required>
                <option value="" selected>Selecione</option>
                <?php
                    foreach ($tipos as $tipo){
                        echo "<option value='".$tipo['tipo_codigo']."'>".$tipo['tipo_nome']."</option>";
                    }
                ?>
            </select>
        </p>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>