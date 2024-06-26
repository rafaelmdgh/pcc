<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <?php 
		include ('../verifica-sessao.php');
        include('../config/conexao_pdo.php');
        $sql = "SELECT cliente_usuario, cliente_codigo, cliente_nome from cliente where cliente_usuario = ".$_SESSION['usuario_codigo'].";";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $clientees = $stmt->fetchAll();

        $sql = "SELECT historico_usuario, historico_codigo, historico_nome from historico where historico_usuario = ".$_SESSION['usuario_codigo'].";";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $historicos = $stmt->fetchAll();

        $sql = "SELECT MAX(receber_nr_lancamento) as ultima_insercao from contas_receber where receber_usuario = ".$_SESSION['usuario_codigo'].";";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $ultimaInsercao = $stmt->fetchAll();
        foreach ($ultimaInsercao as $ultima){
            $proximaInsercao = $ultima['ultima_insercao']+1;
        }
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gravar Recebimento</title>
</head>
<body>
<div class="container">
<h1>Gravar Recebimento</h1>
    <br>
    <form action="salvar_cadastro.php" method="post">
        <p>Número Lançamento</p>
        <p><input class="form-control" type="number" name="nr_lancamento" id="nr_lancamento" value="<?php echo $proximaInsercao;?>" readonly></p>
        <br>
        <p>cliente</p>
        <p><select class="form-select" name="cliente" id="cliente" required>
                <option value="" selected>Selecione</option>
                <?php
                    foreach ($clientees as $cliente){
                        echo "<option value='".$cliente['cliente_codigo']."'>".$cliente['cliente_nome']."</option>";
                    }
                ?>
            </select>
        </p>
        <br>
        <p>Valor a receber</p>
        <p><input class="form-control" type="text" name="valor" id="valor" required></p>
        <br>
        <p>Histórico</p>
        <p><select class="form-select" name="historico" id="historico" required>
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
        <p><input class="form-control" type="date" name="dt_vencimento" id="dt_vencimento" required></p>
        <br>
        <p>Observação</p>
        <p><textarea class="form-control" name="observacao" id="observacao"></textarea></p>
        <input type="submit" value="Salvar">
    </form>
</div>
</body>
</html>