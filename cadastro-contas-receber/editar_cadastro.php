<?php 
include('../verifica-sessao.php');
include('../config/conexao_pdo.php');




if($_POST){
    $usuario = $_SESSION['usuario_codigo'];
    $nr_lancamento = $_POST['nr_lancamento'];
    $cliente = $_POST['cliente'];
    $valor = $_POST['valor'];
    $dt_vencimento = $_POST['dt_vencimento'];
    $historico = $_POST['historico'];
    $observacao = $_POST['observacao'];
    
    $sql = "UPDATE contas_receber SET receber_codigo_cliente = :cliente, receber_valor = :valor, receber_dt_vencimento = :dt_vencimento, receber_observacao = :observacao, receber_codigo_historico = :historico WHERE receber_nr_lancamento = :nr_lancamento AND receber_usuario = :usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':usuario', $usuario);
    $stmt->bindValue(':nr_lancamento', $nr_lancamento);
    $stmt->bindValue(':cliente', $cliente);
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