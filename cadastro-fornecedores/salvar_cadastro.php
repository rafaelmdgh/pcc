<?php 
include('../verifica-sessao.php');
include('../config/conexao_pdo.php');


if($_POST){
    $usuario = $_SESSION['usuario_codigo'];
    $nome = $_POST["nome"];
    $valor_limite = $_POST['valor_limite'];

    $sql = "INSERT INTO fornecedor (fornecedor_usuario, fornecedor_nome, fornecedor_valor_limite) VALUES (:usuario, :nome, :valor_limite)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':usuario', $usuario);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':valor_limite', str_replace(',','.',$valor_limite));
    $stmt->execute();
    echo '<script>alertaSucesso("Cadastrado com sucesso!","lista.php")</script>';

    echo '<script>alertaSucesso("Cadastrado com sucesso!","lista.php")</script>';

} else {
    echo '<script>alertaErro("Erro! Informe os dados.",true)</script>';
}

?>