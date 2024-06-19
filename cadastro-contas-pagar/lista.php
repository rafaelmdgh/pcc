<?php
include('../config/conexao_pdo.php');
include(ROOT_PATH.'cabecalho.php');
$stmt = $pdo->prepare("SELECT pagar_usuario, pagar_nr_lancamento, pagar_dt_vencimento, pagar_dt_emissao, pagar_codigo_fornecedor, pagar_codigo_historico, pagar_dt_baixa, fornecedor_nome, pagar_valor, pagar_observacao, historico_nome FROM contas_pagar inner join fornecedor on fornecedor_codigo = pagar_codigo_fornecedor and fornecedor_usuario = pagar_usuario inner join historico on historico_codigo = pagar_codigo_historico and historico_usuario = pagar_usuario WHERE pagar_usuario = ".$_SESSION["usuario_codigo"]."  ORDER BY pagar_nr_lancamento ASC;");

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
<div class="container"> 
    <h1>Lista de Pagamentos</h1>
    
    
    <form action="baixar_registros.php" method="get">
        <input type="hidden" name="registrosSelecionados" id="registrosSelecionados">
        <input class="btn btn-primary" type="submit" value="Baixar">
    </form>   
    <table border=1>
<input type="button" class="btn btn-primary" onclick="location.href='cadastrar.php'" value="Adicionar" />
        <tr>
            <th>Seleção</th>
            <th>Número Lançamento</th>
            <th>Data de Vencimento</th>
            <th>Fornecedor</th>
            <th>Valor</th>
            <th>Histórico</th>
            <th>Observação</th>
            <th>Data de Emissão</th>
            <th>Data de Baixa</th>
            <th>Ações</th>
        </tr>
        <?php 
        foreach ($contas_pagar as $pagar) {
            echo "<tr>";
            echo "<td>";
            if ($pagar['pagar_dt_baixa'] == '0000-00-00'){
                echo '<input type="checkbox" name="'.$pagar['pagar_nr_lancamento'].'" id="selecaoBaixar" onclick="salvarSelecao('.$pagar['pagar_nr_lancamento'].',checked)"></td>';
            }
            echo "</td>";    
            echo "<td>" . $pagar['pagar_nr_lancamento']."</td>";
            echo "<td>" . $pagar['pagar_dt_vencimento']."</td>";
            echo "<td>" . $pagar['fornecedor_nome']."</td>";
            echo "<td>R$" . str_replace('.',',',$pagar['pagar_valor'])."</td>";
            echo "<td>" . $pagar['historico_nome']."</td>";
            echo "<td>" . $pagar['pagar_observacao']."</td>";
            echo "<td>" . $pagar['pagar_dt_emissao']."</td>";
            echo "<td>" . $pagar['pagar_dt_baixa']."</td>";
            echo "<td><a href='editar.php?codigo=".$pagar['pagar_nr_lancamento']."'>Editar</a> - <a href='excluir.php?codigo=".$pagar['pagar_nr_lancamento']."'>Excluir</a> </td>";
            echo "</tr>";
        }
        
        ?>
    </table>
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
</div>
</body>
</html>