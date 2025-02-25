<?php 
include('../verifica-sessao.php');
include('../config/conexao_pdo.php');




if($_POST){
    $usuario = $_SESSION['usuario_codigo'];
    $nr_lancamento = $_POST['nr_lancamento'];
    $fornecedor = $_POST['fornecedor'];
    $valor = $_POST['valor'];
    $dt_vencimento = $_POST['dt_vencimento'];
    $historico = $_POST['historico'];
    $observacao = $_POST['observacao'];
    
    $sql = "UPDATE contas_pagar SET pagar_codigo_fornecedor = :fornecedor, pagar_valor = :valor, pagar_dt_vencimento = :dt_vencimento, pagar_observacao = :observacao, pagar_codigo_historico = :historico WHERE pagar_nr_lancamento = :nr_lancamento AND pagar_usuario = :usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':usuario', $usuario);
    $stmt->bindValue(':nr_lancamento', $nr_lancamento);
    $stmt->bindValue(':fornecedor', $fornecedor);
    $stmt->bindValue(':valor', str_replace(',','.',$valor));
    $stmt->bindValue(':historico', $historico);
    $stmt->bindValue(':dt_vencimento', $dt_vencimento);
    $stmt->bindValue(':observacao', $observacao);
    
    $stmt->execute();

    echo '<script>alertaSucesso("Cadastrado com sucesso!","lista.php")</script>';

    echo '<script>alertaSucesso("Cadastrado com sucesso!","lista.php")</script>';

} else {
    echo '<script>alertaErro("Erro! Informe os dados.",true)</script>';
}

?>