<?php 
include('../config/conexao_pdo.php');

if($_POST){
    $usuario = $_SESSION['usuario_codigo'];
    $nome = $_POST["nome"];
    $valor_limite = $_POST['valor_limite'];

    $sql = "INSERT INTO contas_pagar (pagar_usuario, pagar_nome, pagar_valor_limite) VALUES (:usuario, :nome, :valor_limite)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':usuario', $usuario);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':valor_limite', str_replace(',','.',$valor_limite));
    $stmt->execute();
    echo "<br>Cadastrado com sucesso!";
    echo "<br><a href='lista.php'>Lista de contas_pagars</a>";
} else {
    echo "ERRO! Informe os dados";
}

?>