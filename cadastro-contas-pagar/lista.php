<?php
include('../config/conexao_pdo.php');
include(ROOT_PATH.'cabecalho.php');
$stmt = $pdo->prepare("SELECT pagar_usuario, pagar_nr_lancamento, pagar_dt_vencimento, pagar_dt_emissao, pagar_codigo_fornecedor, pagar_dt_baixa, fornecedor_nome, pagar_valor, pagar_observacao FROM contas_pagar inner join fornecedor on fornecedor_codigo = pagar_codigo_fornecedor WHERE pagar_usuario = ".$_SESSION["usuario_codigo"].";");

$stmt->execute();

$contas_pagar = $stmt->fetchAll();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa Teste</title>
</head>
<body> 
    <h1>Lista de contas_pagars</h1>
    <p><a href="../index.php">Home</a></p>
    <form action="baixar_registros.php" method="get">
        <input type="hidden" name="registrosSelecionados" id="registrosSelecionados">
        <input class="btn btn-primary" type="submit" value="Baixar">
    </form>   
    <table border=1>
        <tr>
            <th></th>
            <th>Número Lançamento</th>
            <th>Data de Vencimento</th>
            <th>Fornecedor</th>
            <th>Valor</th>
            <th>Observação</th>
            <th>Data de Emissão</th>
            <th>Data de Baixa</th>
            <th>Ações</th>
        </tr>
        <?php 
        foreach ($contas_pagar as $pagar) {
            echo "<tr>";
            echo '<td><input type="checkbox" name="'.$pagar['pagar_nr_lancamento'].'" id="selecaoBaixar" onclick="salvarSelecao('.$pagar['pagar_nr_lancamento'].',checked)"></td>';
            echo "<td>" . $pagar['pagar_nr_lancamento']."</td>";
            echo "<td>" . $pagar['pagar_dt_vencimento']."</td>";
            echo "<td>" . $pagar['fornecedor_nome']."</td>";
            echo "<td>R$" . str_replace('.',',',$pagar['pagar_valor'])."</td>";
            echo "<td>" . $pagar['pagar_observacao']."</td>";
            echo "<td>" . $pagar['pagar_dt_emissao']."</td>";
            echo "<td>" . $pagar['pagar_dt_baixa']."</td>";
            echo "<td><a href='editar.php?codigo=".$pagar['pagar_nr_lancamento']."'>Editar</a> - <a href='excluir.php?codigo=".$pagar['pagar_nr_lancamento']."'>Excluir</a> </td>";
            echo "</tr>";
        }
        
        ?>
    </table>
    <input type="button" class="btn btn-primary" onclick="location.href='cadastrar.php'" value="Adicionar" />
    <script>
        function salvarSelecao(valor, selecionado) {
            registrosSelecionados = document.getElementById("registrosSelecionados");
            if (selecionado == true) {
                console.log(valor);
                registrosSelecionados.value += valor +",";
            }else{
                if (registrosSelecionados.value.includes(valor)){
                    registrosSelecionados.value = registrosSelecionados.value.replace(valor+",","");
                }
            }    
        }
    </script>
</body>
</html>