<?php
include('../config/conexao_pdo.php');
include(ROOT_PATH.'cabecalho.php');
$stmt = $pdo->prepare("SELECT * FROM fornecedor WHERE fornecedor_usuario = ".$_SESSION["usuario_codigo"].";");

$stmt->execute();

$fornecedors = $stmt->fetchAll();


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
    <h1>Lista de fornecedors</h1>
    <p><a href="../index.php">Home</a></p>
    <table border=1>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Valor Limite</th>
            <th>Ações</th>
        </tr>
        <?php 
        foreach ($fornecedors as $fornecedor) {
            echo "<tr>";
            echo "<td>" . $fornecedor['fornecedor_codigo']."</td>";
            echo "<td>" . $fornecedor['fornecedor_nome']."</td>";
            echo "<td>R$" . str_replace('.',',',$fornecedor['fornecedor_valor_limite'])."</td>";
            echo "<td><a href='editar.php?codigo=".$fornecedor['fornecedor_codigo']."'>Editar</a> - <a href='excluir.php?codigo=".$fornecedor['fornecedor_codigo']."'>Excluir</a> </td>";
            echo "</tr>";
        }
        
        ?>
    </table>
    <input type="button" class="btn btn-primary" onclick="location.href='cadastrar.php'" value="Adicionar" />
</div>
</body>
</html>