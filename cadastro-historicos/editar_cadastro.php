<?php 
include('../verifica-sessao.php');
include('../config/conexao_pdo.php');




if($_POST){
    $usuario = $_SESSION['usuario_codigo'];
    $codigo = $_POST["codigo"];
    $nome = $_POST["nome"];
    $valor_limite = $_POST['valor_limite'];
    
    $sql = "UPDATE historico SET historico_nome = :nome, historico_valor_limite = :valor_limite WHERE historico_codigo = :codigo AND historico_usuario = :usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':valor_limite', $valor_limite);
    $stmt->bindValue(':codigo', $codigo);
    $stmt->bindValue(':usuario', $usuario);
    
    $stmt->execute();

    echo '<script>alertaSucesso("Cadastrado com sucesso!","lista.php")</script>';

    echo '<script>alertaSucesso("Cadastrado com sucesso!","lista.php")</script>';

} else {
    echo '<script>alertaErro("Erro! Informe os dados.",true)</script>';
}

?>