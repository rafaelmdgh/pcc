<?php
include('../config/conexao_pdo.php');
include(ROOT_PATH.'cabecalho.php');
$stmt = $pdo->prepare("SELECT * FROM meta WHERE meta_usuario = ".$_SESSION["usuario_codigo"].";");

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
        <p><a href="../index.php">Home</a></p>
        <table border=1>
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
        <input type="button" class="btn btn-primary" onclick="location.href='cadastrar.php'" value="Adicionar" />
    </div>    
</div>
</body>
</html>