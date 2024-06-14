<?php 
include('../config/conexao_pdo.php');



if($_POST){
    $usuario = $_SESSION['usuario_codigo'];
    $codigo = $_POST["codigo"];
    $nome = $_POST["nome"];
    $valor_limite = $_POST['valor_limite'];
    
    $sql = "UPDATE cliente SET cliente_nome = :nome, cliente_valor_limite = :valor_limite WHERE cliente_codigo = :codigo AND cliente_usuario = :usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':valor_limite', $valor_limite);
    $stmt->bindValue(':codigo', $codigo);
    $stmt->bindValue(':usuario', $usuario);
    
    $stmt->execute();

    echo "<br>Cadastrado com sucesso!";
    echo "<br><a href='lista.php'>Lista de clientes</a>";
} else {
    echo "ERRO! Informe os dados";
}

?>