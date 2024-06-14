<?php
include('../config/conexao_pdo.php');
include(ROOT_PATH.'cabecalho.php');
$stmt = $pdo->prepare("SELECT * FROM contas_receber WHERE contas_receber_usuario = ".$_SESSION["usuario_codigo"].";");

$stmt->execute();

$contas_recebers = $stmt->fetchAll();


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
    <h1>Lista de contas_recebers</h1>
    <p><a href="../index.php">Home</a></p>
    <table border=1>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Valor Limite</th>
            <th>Ações</th>
        </tr>
        <?php 
        foreach ($contas_recebers as $contas_receber) {
            echo "<tr>";
            echo "<td>" . $contas_receber['contas_receber_codigo']."</td>";
            echo "<td>" . $contas_receber['contas_receber_nome']."</td>";
            echo "<td>R$" . str_replace('.',',',$contas_receber['contas_receber_valor_limite'])."</td>";
            echo "<td><a href='editar.php?codigo=".$contas_receber['contas_receber_codigo']."'>Editar</a> - <a href='excluir.php?codigo=".$contas_receber['contas_receber_codigo']."'>Excluir</a> </td>";
            echo "</tr>";
        }
        
        ?>
    </table>
    <input type="button" class="btn btn-primary" onclick="location.href='cadastrar.php'" value="Adicionar" />
</div>
</body>
</html>