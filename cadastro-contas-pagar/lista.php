<?php
include('../verifica-sessao.php');
include('../config/conexao_pdo.php');
$limite = isset($_GET['limitador']) ? $_GET['limitador'] :10;

// Obter página atual (se não existir, usar página 1)
$paginaAtual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;

// Calcular o offset (posição inicial do registro na página atual)
$offset = ($paginaAtual - 1) * $limite;

/*
// Obter termo de pesquisa (se existir)
$termoPesquisaNome = '';
if (isset($_GET['nome'])) {
    $termoPesquisaNome =  " AND nome LIKE '%" . $_GET['nome'] . "%'";
}
if (isset($_GET['cargo'])){
    $termoPesquisaCargo =  " AND cargo LIKE '%".$_GET['cargo']."%'";
}
*/
$stmt = $pdo->prepare("SELECT pagar_usuario, pagar_nr_lancamento, pagar_dt_vencimento, pagar_dt_emissao, pagar_codigo_fornecedor, pagar_codigo_historico, pagar_dt_baixa, fornecedor_nome, pagar_valor, pagar_observacao, historico_nome FROM contas_pagar inner join fornecedor on fornecedor_codigo = pagar_codigo_fornecedor and fornecedor_usuario = pagar_usuario inner join historico on historico_codigo = pagar_codigo_historico and historico_usuario = pagar_usuario WHERE pagar_usuario = ".$_SESSION["usuario_codigo"]."  ORDER BY pagar_nr_lancamento ASC LIMIT ".$limite." OFFSET ".$offset.";");

$stmt->execute();

$contas_pagar = $stmt->fetchAll();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamentos</title>
</head>
<body>
<div class="container caixa-home"> 
    <h1>Lista de Pagamentos</h1>
    
     
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="input-group mb-3">
                    
                </div>
            </div>
            <div class="col-md-1">
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <select class="form-select" name="limitador" id="limitador" onchange="submitLimitador(this)" value="<?php $limite ?>">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>          
    </div>
    <table border=1>
    <input type="button" class="btn btn-primary" onclick="location.href='cadastrar.php'" value="Adicionar" />
    
    <form action="baixar_registros.php" method="get">
        <input type="hidden" name="registrosSelecionados" id="registrosSelecionados">
        <input style="margin-left:10px;" class="btn btn-primary" type="submit" value="Baixar">
    </form>  
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
            echo "<td><script>document.write(ajustarData('" . $pagar['pagar_dt_vencimento']."'))</script></td>";
            echo "<td>" . $pagar['fornecedor_nome']."</td>";
            echo "<td>R$" . str_replace('.',',',$pagar['pagar_valor'])."</td>";
            echo "<td>" . $pagar['historico_nome']."</td>";
            echo "<td>" . $pagar['pagar_observacao']."</td>";
            echo "<td><script>document.write(ajustarData('" . $pagar['pagar_dt_emissao']."'))</script></td>";
            echo "<td><script>document.write(ajustarData('" . $pagar['pagar_dt_baixa']."'))</script></td>";
            echo "<td><a href='editar.php?codigo=".$pagar['pagar_nr_lancamento']."'>Editar</a> - <a href='excluir.php?codigo=".$pagar['pagar_nr_lancamento']."'>Excluir</a> </td>";
            echo "</tr>";
        }
        
        ?>
    </table>
    <?php
    // Obter o total de registros
    $sqlTotal = 'SELECT COUNT(*) total FROM contas_pagar WHERE pagar_usuario = '.$_SESSION['usuario_codigo'];
    $stmt = $pdo->prepare($sqlTotal);
    
    $stmt->execute();

    $lancamentosTotal = $stmt->fetchAll();

    $totalRegistros = $lancamentosTotal[0]['total'];

    // Calcular o total de páginas
    $totalPaginas = ceil($totalRegistros / $limite);
    // Exibir links de navegação (se houver mais de uma página)
    if ($totalPaginas > 1) {
        echo "<br>";
        echo '<nav aria-label="...">';
        echo '<ul class="pagination">';

        // Link para a página anterior (se houver)
        if($paginaAtual-1 <= 0) {
            echo '<li class="page-item disabled">';
        }else{
            echo '<li class="page-item">';
        }
        echo '<a class="page-link" tabindex="-1" href="?pagina='.($paginaAtual-1).'">Anterior</a>';
        echo '</li>';
        // Links para páginas anteriores (se houver)
        for ($i = 1; $i < $paginaAtual; $i++) {
            echo '<li class="page-item">';
            echo '<a class="page-link" href="?pagina='.$i.'">'.$i.'</a>';
            echo '</li>';
        }

        // Página atual (destacar)
        echo  '<li class="page-item active">';
        echo '<a class="page-link" href="?pagina='.$paginaAtual.'">';
        echo '<span class="sr-only">'.$paginaAtual.'</span>';
        echo '</a>';
        echo '</li>';

        // Links para páginas seguintes (se houver)
        for ($i = $paginaAtual + 1; $i <= $totalPaginas; $i++) {
            echo '<li class="page-item">';
            echo '<a class="page-link" href="?pagina='.$i.'">'.$i.'</a>';
            echo '</li>';
        }

        // Link para a próxima página (se houver)
        if($paginaAtual+1 > $totalPaginas) {
            echo '<li class="page-item disabled">';
        }else{
            echo '<li class="page-item">';
        }
        echo '<a class="page-link" href="?pagina='.($paginaAtual+1).'">Próxima</a>';
        echo '</li>';
        echo '</ul>';
        echo "</nav>";
    }
    ?>
    <script>
        document.getElementById('limitador').value = "<?php echo $limite;?>";
    </script>
</div>
</body>
</html>