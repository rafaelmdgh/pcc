<?php 
include('../config/conexao_pdo.php');

if($_POST){
    $usuario = $_SESSION['usuario_codigo'];
    $fornecedor = $_POST["fornecedor"];
    $valor = $_POST['valor'];
    $dt_vencimento = $_POST['dt_vencimento'];
    $observacao = $_POST['observacao'];

    $sql = "INSERT INTO contas_pagar (pagar_usuario, pagar_codigo_fornecedor, pagar_valor, pagar_dt_vencimento, pagar_observacao) VALUES (:usuario, :fornecedor, :valor, :dt_vencimento, :observacao)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':usuario', $usuario);
    $stmt->bindValue(':fornecedor', $fornecedor);
    $stmt->bindValue(':valor', str_replace(',','.',$valor));
    $stmt->bindValue(':dt_vencimento', $dt_vencimento);
    $stmt->bindValue(':observacao', $observacao);
    $stmt->execute();
    echo "<br>Cadastrado com sucesso!";
    echo "<br><a href='lista.php'>Lista de contas_pagars</a>";
} else {
    echo "ERRO! Informe os dados";
}

?>