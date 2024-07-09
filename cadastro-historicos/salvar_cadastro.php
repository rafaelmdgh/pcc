<?php 
include('../verifica-sessao.php');
include('../config/conexao_pdo.php');


if($_POST){
    $usuario = $_SESSION['usuario_codigo'];
    $nome = $_POST["nome"];
    $valor_limite = $_POST['valor_limite'];
    $tipo = $_POST['tipo'];

    $sql = "INSERT INTO historico (historico_usuario, historico_nome, historico_valor_limite, historico_tipo) VALUES (:usuario, :nome, :valor_limite, :tipo)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':usuario', $usuario);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':valor_limite', str_replace(',','.',$valor_limite));
    $stmt->bindValue(':tipo', $tipo);
    $stmt->execute();
    echo '<script>alertaSucesso("Cadastrado com sucesso!","lista.php")</script>';

    echo '<script>alertaSucesso("Cadastrado com sucesso!","lista.php")</script>';

} else {
    echo '<script>alertaErro("Erro! Informe os dados.",true)</script>';
}

?>