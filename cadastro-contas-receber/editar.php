<?php 
include('../verifica-sessao.php');
include('../config/conexao_pdo.php');

$codigo = $_GET['codigo'];

//recupera um unico registro da consulta


$stmt = $pdo->prepare("SELECT * FROM contas_receber WHERE receber_nr_lancamento = :codigo AND receber_usuario =".$_SESSION['usuario_codigo']."");
$stmt->bindValue(':codigo', $codigo);
$stmt->execute();

$contas_receber = $stmt->fetch();


$sql = "SELECT cliente_usuario, cliente_codigo, cliente_nome from cliente where cliente_usuario = ".$_SESSION['usuario_codigo'].";";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$clientees = $stmt->fetchAll();

$sql = "SELECT historico_usuario, historico_codigo, historico_nome from historico where historico_usuario = ".$_SESSION['usuario_codigo'].";";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $historicos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Recebimento</title>
</head>
<body>
<div class="container caixa-cadastro">
<h1>Editar Conta a receber</h1>
    <br>
    <form action="editar_cadastro.php" method="post">
    <p>Número Lançamento</p>
        <p><input class="form-control" type="number" name="nr_lancamento" id="nr_lancamento" value="<?php echo $contas_receber['receber_nr_lancamento'];?>" readonly></p>
        <br>
        <p>Cliente</p>
        <p><select class="form-select" name="cliente" id="cliente" required value="<?php echo $contas_receber['receber_codigo_cliente'];?>">
                <option value="" selected>Selecione</option>
                <?php
                    foreach ($clientees as $cliente){
                        if ($cliente['cliente_codigo'] == $contas_receber['receber_codigo_cliente']){
                            echo "<option selected value='".$cliente['cliente_codigo']."'>".$cliente['cliente_nome']."</option>";
                        }else{
                            echo "<option value='".$cliente['cliente_codigo']."'>".$cliente['cliente_nome']."</option>";
                        }
                    }    
                ?>
            </select>
        </p>
        <br>
        <p>Valor a receber</p>
        <p><input class="form-control" type="number" step="0.01" min=0 name="valor" id="valor" value="<?php echo $contas_receber['receber_valor'];?>" required></p>
        <br>
        <p>Histórico</p>
        <p><select class="form-select" name="historico" id="historico" required>
                <option value="" selected>Selecione</option>
                <?php
                    foreach ($historicos as $historico){
                        if ($historico['historico_codigo'] == $contas_receber['receber_codigo_historico']){
                            echo "<option selected value='".$historico['historico_codigo']."'>".$historico['historico_nome']."</option>";
                        }else{
                            echo "<option value='".$historico['historico_codigo']."'>".$historico['historico_nome']."</option>";
                        }
                    }
                ?>
            </select>
        </p>
        <br>
        <p>Data de Vencimento</p>
        <p><input class="form-control" type="date" name="dt_vencimento" id="dt_vencimento" value="<?php echo $contas_receber['receber_dt_vencimento'];?>" required></p>
        <br>
        <p>Observação</p>
        <p><textarea class="form-control" name="observacao" id="observacao"><?php echo $contas_receber['receber_observacao'];?></textarea></p>
        <input type="submit" class="btn btn-primary" value="Salvar">
    </form>
</div>
</body>
</html>