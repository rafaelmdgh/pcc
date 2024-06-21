<?php 
include('../verifica-sessao.php');
include('../config/conexao_pdo.php');

$codigo = $_GET['codigo'];

//recupera um unico registro da consulta


$stmt = $pdo->prepare("SELECT * FROM contas_pagar WHERE pagar_nr_lancamento = :codigo");
$stmt->bindValue(':codigo', $codigo);
$stmt->execute();

$contas_pagar = $stmt->fetch();


$sql = "SELECT fornecedor_usuario, fornecedor_codigo, fornecedor_nome from fornecedor where fornecedor_usuario = ".$_SESSION['usuario_codigo'].";";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$fornecedores = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa Teste</title>
</head>
<body>
<div class="container">
<h1>Editar Conta a Pagar</h1>
    <br>
    <form action="editar_cadastro.php" method="post">
    <p>Número Lançamento</p>
        <p><input type="number" name="nr_lancamento" id="nr_lancamento" value="<?php echo $contas_pagar['pagar_nr_lancamento'];?>" readonly></p>
        <br>
        <p>Fornecedor</p>
        <p><select name="fornecedor" id="fornecedor" required value="<?php echo $contas_pagar['pagar_codigo_fornecedor'];?>">
                <option value="" selected>Selecione</option>
                <?php
                    foreach ($fornecedores as $fornecedor){
                        if ($fornecedor['fornecedor_codigo'] == $contas_pagar['pagar_codigo_fornecedor']){
                            echo "<option selected value='".$fornecedor['fornecedor_codigo']."'>".$fornecedor['fornecedor_nome']."</option>";
                        }else{
                            echo "<option value='".$fornecedor['fornecedor_codigo']."'>".$fornecedor['fornecedor_nome']."</option>";
                        }
                    }    
                ?>
            </select>
        </p>
        <br>
        <p>Valor a Pagar</p>
        <p><input type="text" name="valor" id="valor" value="<?php echo $contas_pagar['pagar_valor'];?>" required></p>
        <br>
        <p>Data de Vencimento</p>
        <p><input type="date" name="dt_vencimento" id="dt_vencimento" value="<?php echo $contas_pagar['pagar_dt_vencimento'];?>" required></p>
        <br>
        <p>Observação</p>
        <p><textarea name="observacao" id="observacao"><?php echo $contas_pagar['pagar_observacao'];?></textarea></p>
        <input type="submit" value="Salvar">
    </form>
</div>
</body>
</html>