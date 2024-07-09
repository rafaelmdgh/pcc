<?php 
include('../verifica-sessao.php');
include('../config/conexao_pdo.php');

if($_POST){
    $codigo = $_SESSION['usuario_codigo'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $celular = preg_replace('/\D/', '', $_POST['celular']);
    $senha = $_POST['senha'];

    // Criptografando a senha
    $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
    
    $sql = "UPDATE usuario SET usuario_nome = :nome, usuario_email = :email, usuario_username = :username, usuario_celular = :celular, usuario_senha = :senha WHERE usuario_codigo = :codigo";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':codigo', $codigo);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':senha', $senha_criptografada); // Utilizando a senha criptografada
    $stmt->bindValue(':celular', $celular);
    $stmt->execute();

    echo '<script>alertaSucesso("Cadastrado com sucesso!", "/pcc/index.php")</script>';
} else {
    echo '<script>alertaErro("Erro! Informe os dados.", true)</script>';
}
?>
