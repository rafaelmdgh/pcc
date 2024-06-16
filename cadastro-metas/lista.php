<?php
include('../config/conexao_pdo.php');
include(ROOT_PATH.'cabecalho.php');
$stmt = $pdo->prepare("SELECT * FROM meta WHERE meta_usuario = ".$_SESSION["usuario_codigo"]." LIMIT 15;");

$stmt->execute();

$metas = $stmt->fetchAll();


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
    
        
        <h1>Lista de metas</h1>
        
        <table border=1>
<input type="button" class="btn btn-primary" onclick="location.href='cadastrar.php'" value="Adicionar" />
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Valor Limite</th>
                <th>Ações</th>
            </tr>
            <?php 
            foreach ($metas as $meta) {
                echo "<tr>";
                echo "<td>" . $meta['meta_codigo']."</td>";
                echo "<td>" . $meta['meta_nome']."</td>";
                echo "<td>R$" . str_replace('.',',',$meta['meta_valor'])."</td>";
                echo "<td><a href='editar.php?codigo=".$meta['meta_codigo']."'>Editar</a> - <a href='excluir.php?codigo=".$meta['meta_codigo']."'>Excluir</a> </td>";
                echo "</tr>";
            }
            
            ?>
        </table>
        
    </div>    
</div>
</body>
</html>