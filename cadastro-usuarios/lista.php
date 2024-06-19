<?php
include('../config/conexao_pdo.php');
include(ROOT_PATH.'cabecalho.php');
$stmt = $pdo->prepare("SELECT * FROM usuarios ");

$stmt->execute();

$usuarios = $stmt->fetchAll();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
</head>
<body>
<div class="container">
    <h1>Lista de usuários</h1>
    <br>
    
    <p><a href="cadastrar.php">Cadastrar Usuários</a></p>
    <table border=1>
<input type="button" class="btn btn-primary" onclick="location.href='cadastrar.php'" value="Adicionar" />
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
        <?php 
        foreach ($usuarios as $usuario) {
            echo "<tr>";
        echo "<td>" . $usuario['id']."</td>";
            echo "<td>" . $usuario['nome']."</td>";
            echo "<td>" . $usuario['email']."</td>";
            echo "<td><a href='editar.php?id=".$usuario['id']."'>Editar</a> - <a href='excluir.php?id=".$usuario['id']."'>Excluir</a> </td>";
            echo "</tr>";
          }
        ?>
    </table>
</div>
</body>
</html>