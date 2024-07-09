<?php 
include('../verifica-sessao.php');
include('../config/conexao_pdo.php');


if($_POST){
    $usuario = $_SESSION['usuario_codigo'];
    $cliente = $_POST["cliente"];
    $valor = $_POST['valor'];
    $dt_vencimento = $_POST['dt_vencimento'];
    $historico = $_POST['historico'];
    $observacao = $_POST['observacao'];
    $dataAtual = date("Y-m-d");

    $sql = "INSERT INTO contas_receber (receber_usuario, receber_codigo_cliente, receber_valor, receber_dt_vencimento, receber_observacao, receber_dt_emissao, receber_codigo_historico) VALUES (:usuario, :cliente, :valor, :dt_vencimento, :observacao, :dt_emissao, :historico)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':usuario', $usuario);
    $stmt->bindValue(':cliente', $cliente);
    $stmt->bindValue(':valor', str_replace(',','.',$valor));
    $stmt->bindValue(':dt_vencimento', $dt_vencimento);
    $stmt->bindValue(':observacao', $observacao);
    $stmt->bindValue(':dt_emissao', $dataAtual);
    $stmt->bindValue(':historico', $historico);
    $stmt->execute();
    echo '<script>alertaSucesso("Cadastrado com sucesso!","lista.php")</script>';

    echo '<script>alertaSucesso("Cadastrado com sucesso!","lista.php")</script>';

} else {
    echo '<script>alertaErro("Erro! Informe os dados.",true)</script>';
}

?>