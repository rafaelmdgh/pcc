<?php
include('../config/conexao_pdo.php');
include(ROOT_PATH.'cabecalho.php');
$stmt = $pdo->prepare("SELECT receber_usuario, receber_nr_lancamento, receber_dt_vencimento, receber_dt_emissao, receber_codigo_cliente, receber_codigo_historico, receber_dt_baixa, cliente_nome, receber_valor, receber_observacao, historico_nome FROM contas_receber inner join cliente on cliente_codigo = receber_codigo_cliente and cliente_usuario = receber_usuario inner join historico on historico_codigo = receber_codigo_historico and historico_usuario = receber_usuario WHERE receber_usuario = ".$_SESSION["usuario_codigo"]."  ORDER BY receber_nr_lancamento ASC;");

$stmt->execute();

$contas_receber = $stmt->fetchAll();


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
    <h1>Lista de Recebimentos</h1>
    
    
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
            <th>cliente</th>
            <th>Valor</th>
            <th>Histórico</th>
            <th>Observação</th>
            <th>Data de Emissão</th>
            <th>Data de Baixa</th>
            <th>Ações</th>
        </tr>
        <?php 
        foreach ($contas_receber as $receber) {
            echo "<tr>";
            echo "<td>";
            if ($receber['receber_dt_baixa'] == '0000-00-00'){
                echo '<input type="checkbox" name="'.$receber['receber_nr_lancamento'].'" id="selecaoBaixar" onclick="salvarSelecao('.$receber['receber_nr_lancamento'].',checked)"></td>';
            }
            echo "</td>";    
            echo "<td>" . $receber['receber_nr_lancamento']."</td>";
            echo "<td>" . $receber['receber_dt_vencimento']."</td>";
            echo "<td>" . $receber['cliente_nome']."</td>";
            echo "<td>R$" . str_replace('.',',',$receber['receber_valor'])."</td>";
            echo "<td>" . $receber['historico_nome']."</td>";
            echo "<td>" . $receber['receber_observacao']."</td>";
            echo "<td>" . $receber['receber_dt_emissao']."</td>";
            echo "<td>" . $receber['receber_dt_baixa']."</td>";
            echo "<td><a href='editar.php?codigo=".$receber['receber_nr_lancamento']."'>Editar</a> - <a href='excluir.php?codigo=".$receber['receber_nr_lancamento']."'>Excluir</a> </td>";
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