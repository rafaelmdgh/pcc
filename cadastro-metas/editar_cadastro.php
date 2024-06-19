<?php 
include('../config/conexao_pdo.php');



if($_POST){
    $usuario = $_SESSION['usuario_codigo'];
    $codigo = $_POST["codigo"];
    $nome = $_POST["nome"];
    $valor = $_POST['valor'];
    
    $sql = "UPDATE meta SET meta_nome = :nome, meta_valor = :valor WHERE meta_codigo = :codigo AND meta_usuario = :usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':valor', $valor);
    $stmt->bindValue(':codigo', $codigo);
    $stmt->bindValue(':usuario', $usuario);
    
    $stmt->execute();

    echo "<br>Cadastrado com sucesso!";
    echo "<br><a href='lista.php'>Lista de Metas</a>";
} else {
    echo "ERRO! Informe os dados";
}

?>