<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <?php 
		include ('../verifica-sessao.php');
        include('../config/conexao_pdo.php');
        $sql = "SELECT fornecedor_usuario, fornecedor_codigo, fornecedor_nome from fornecedor where fornecedor_usuario = ".$_SESSION['usuario_codigo'].";";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $fornecedores = $stmt->fetchAll();

        $sql = "SELECT historico_usuario, historico_codigo, historico_nome from historico where historico_usuario = ".$_SESSION['usuario_codigo'].";";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $historicos = $stmt->fetchAll();

        $sql = "SELECT MAX(pagar_nr_lancamento) as ultima_insercao from contas_pagar where pagar_usuario = ".$_SESSION['usuario_codigo'].";";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $ultimaInsercao = $stmt->fetchAll();
        foreach ($ultimaInsercao as $ultima){
            $proximaInsercao = $ultima['ultima_insercao']+1;
        }
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contas a Pagar</title>
</head>
<body>
<div class="container">
<h1>Contas a pagar</h1>
    <br>
    <form action="salvar_cadastro.php" method="post">
        <p>Número Lançamento</p>
        <p><input type="number" name="nr_lancamento" id="nr_lancamento" value="<?php echo $proximaInsercao;?>" readonly></p>
        <br>
        <p>Fornecedor</p>
        <p><select name="fornecedor" id="fornecedor" required>
                <option value="" selected>Selecione</option>
                <?php
                    foreach ($fornecedores as $fornecedor){
                        echo "<option value='".$fornecedor['fornecedor_codigo']."'>".$fornecedor['fornecedor_nome']."</option>";
                    }
                ?>
            </select>
        </p>
        <br>
        <p>Valor a Pagar</p>
        <p><input type="text" name="valor" id="valor" required></p>
        <br>
        <p>Histórico</p>
        <p><select name="historico" id="historico" required>
                <option value="" selected>Selecione</option>
                <?php
                    foreach ($historicos as $historico){
                        echo "<option value='".$historico['historico_codigo']."'>".$historico['historico_nome']."</option>";
                    }
                ?>
            </select>
        </p>
        <br>
        <p>Data de Vencimento</p>
        <p><input type="date" name="dt_vencimento" id="dt_vencimento" required></p>
        <br>
        <p>Observação</p>
        <p><textarea name="observacao" id="observacao"></textarea></p>
        <input type="submit" value="Salvar">
    </form>
</div>
</body>
</html>