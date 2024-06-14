<?php 
include('../config/conexao_pdo.php');

if($_POST){
  
    $nome = $_POST["nome"];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $id = $_POST['id'];
    
    $sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':senha', $senha);
    $stmt->bindValue(':id', $id);
    
    $stmt->execute();

    echo "<br>Cadastrado com sucesso!";
    echo "<br><a href='lista.php'>Lista de usuários</a>";
} else {
    echo "ERRO! Informe os dados";
}

?>