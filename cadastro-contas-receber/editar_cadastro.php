<?php 
include('../config/conexao_pdo.php');



if($_POST){
    $codigo = $_POST["codigo"];
    $nome = $_POST["nome"];
    $valor_limite = $_POST['valor_limite'];
    
    $sql = "UPDATE contas_receber SET contas_receber_nome = :nome, contas_receber_valor_limite = :valor_limite WHERE contas_receber_codigo = :codigo";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':valor_limite', $valor_limite);
    $stmt->bindValue(':codigo', $codigo);
    
    $stmt->execute();

    echo "<br>Cadastrado com sucesso!";
    echo "<br><a href='lista.php'>Lista de contas_recebers</a>";
} else {
    echo "ERRO! Informe os dados";
}

?>