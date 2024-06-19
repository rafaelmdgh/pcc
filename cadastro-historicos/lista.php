<?php
include('../config/conexao_pdo.php');
include(ROOT_PATH.'cabecalho.php');
$stmt = $pdo->prepare("SELECT * FROM historico INNER JOIN tipo_historico ON tipo_codigo = historico_tipo WHERE historico_usuario = ".$_SESSION["usuario_codigo"].";");

$stmt->execute();

$historicos = $stmt->fetchAll();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Históricos</title>
</head>
<body>
<div class="container">
    <h1>Lista de Históricos</h1>
    
    <table border=1>
<input type="button" class="btn btn-primary" onclick="location.href='cadastrar.php'" value="Adicionar" />
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Valor Limite</th>
            <th>Tipo</th>
            <th>Ações</th>
        </tr>
        <?php 
        foreach ($historicos as $historico) {
            echo "<tr>";
            echo "<td>" . $historico['historico_codigo']."</td>";
            echo "<td>" . $historico['historico_nome']."</td>";
            echo "<td>R$" . str_replace('.',',',$historico['historico_valor_limite'])."</td>";
            echo "<td>" . $historico['tipo_nome']."</td>";
            echo "<td><a href='editar.php?codigo=".$historico['historico_codigo']."'>Editar</a> - <a href='excluir.php?codigo=".$historico['historico_codigo']."'>Excluir</a> </td>";
            echo "</tr>";
        }
        
        ?>
    </table>
    
</div>
</body>
</html>