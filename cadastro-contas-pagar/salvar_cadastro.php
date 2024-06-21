<?php 
include('../verifica-sessao.php');
include('../config/conexao_pdo.php');


if($_POST){
    $usuario = $_SESSION['usuario_codigo'];
    $fornecedor = $_POST["fornecedor"];
    $valor = $_POST['valor'];
    $dt_vencimento = $_POST['dt_vencimento'];
    $observacao = $_POST['observacao'];
    $dataAtual = date("Y-m-d");

    $sql = "INSERT INTO contas_pagar (pagar_usuario, pagar_codigo_fornecedor, pagar_valor, pagar_dt_vencimento, pagar_observacao, pagar_dt_emissao) VALUES (:usuario, :fornecedor, :valor, :dt_vencimento, :observacao, :dt_emissao)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':usuario', $usuario);
    $stmt->bindValue(':fornecedor', $fornecedor);
    $stmt->bindValue(':valor', str_replace(',','.',$valor));
    $stmt->bindValue(':dt_vencimento', $dt_vencimento);
    $stmt->bindValue(':observacao', $observacao);
    $stmt->bindValue(':dt_emissao', $dataAtual);
    $stmt->execute();
    echo '<script>alertaSucesso("Cadastrado com sucesso!","lista.php")</script>';

    echo '<script>alertaSucesso("Cadastrado com sucesso!","lista.php")</script>';

} else {
    echo '<script>alertaErro("Erro! Informe os dados.",true)</script>';
}

?>