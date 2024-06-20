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
    <title>Recebimentos</title>
</head>
<body>
<div class="container"> 
    <h1>Lista de Recebimentos</h1>
    
    
    <form action="baixar_registros.php" method="get">
        <input type="hidden" name="registrosSelecionados" id="registrosSelecionados">
        <input class="btn btn-primary" type="submit" value="Baixar">
    </form>   
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="input-group mb-3">
                    
                </div>
            </div>
            <div class="col-md-1">
                <div class="input-group mb-3">
                    <select class="form-select" name="limitador" id="limitador">
                        <option selected value="<?php $limite=10;?>">10</option>
                        <option value="<?php $limite=20;?>">20</option>
                        <option value="<?php $limite=50;?>">50</option>
                        <option value="<?php $limite=100;?>">100</option>
                    </select>
                </div>
            </div>
        </div>          
    </div>
    <table border=1>
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
    <?php
    echo "limite:".$limite;
    // Obter o total de registros
    $sqlTotal = 'SELECT COUNT(*) receber_nr_lancamento FROM contas_receber WHERE receber_usuario = '.$_SESSION['usuario_codigo'].' LIMIT $limite OFFSET $offset ';
    $stmt = $pdo->prepare($sqlTotal);

    $stmt->execute();

    $funcionariosTotal = $stmt->fetchAll();

    $totalRegistros = $funcionariosTotal[0]['total'];

    // Calcular o total de páginas
    $totalPaginas = ceil($totalRegistros / $limite);

    // Exibir links de navegação (se houver mais de uma página)
    if ($totalPaginas > 1) {
        echo "<br>";
        echo "<nav>";

        // Link para a primeira página
        echo "<a href='?pagina=1'>Primeira</a>";

        // Links para páginas anteriores (se houver)
        for ($i = 1; $i < $paginaAtual; $i++) {
            echo " | <a href='?pagina=$i'>$i</a>";
        }

        // Página atual (destacar)
        echo " | <span class='pagina-atual'>$paginaAtual</span> | ";

        // Links para páginas seguintes (se houver)
        for ($i = $paginaAtual + 1; $i <= $totalPaginas; $i++) {
            echo "<a href='?pagina=$i'>$i</a> | ";
        }

        // Link para a última página
        echo "<a href='?pagina=$totalPaginas'>Última</a>";

        echo "</nav>";
    }
    ?>
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