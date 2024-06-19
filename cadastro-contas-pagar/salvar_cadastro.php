<?php 
include('../config/conexao_pdo.php');

if($_POST){
    $usuario = $_SESSION['usuario_codigo'];
    $fornecedor = $_POST["fornecedor"];
    $valor = $_POST['valor'];
    $dt_vencimento = $_POST['dt_vencimento'];
    $historico = $_POST['historico'];
    $observacao = $_POST['observacao'];
    $dataAtual = date("Y-m-d");

    $sql = "INSERT INTO contas_pagar (pagar_usuario, pagar_codigo_fornecedor, pagar_valor, pagar_dt_vencimento, pagar_observacao, pagar_dt_emissao, pagar_historico) VALUES (:usuario, :fornecedor, :valor, :dt_vencimento, :observacao, :dt_emissao, :historico)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':usuario', $usuario);
    $stmt->bindValue(':fornecedor', $fornecedor);
    $stmt->bindValue(':valor', str_replace(',','.',$valor));
    $stmt->bindValue(':dt_vencimento', $dt_vencimento);
    $stmt->bindValue(':observacao', $observacao);
    $stmt->bindValue(':dt_emissao', $dataAtual);
    $stmt->bindValue(':historico', $historico);
    $stmt->execute();
    echo "<br>Cadastrado com sucesso!";
    echo "<br><a href='lista.php'>Lista de contas_pagars</a>";
} else {
    echo "ERRO! Informe os dados";
}

?>