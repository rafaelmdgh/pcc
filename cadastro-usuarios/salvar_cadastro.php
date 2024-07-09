<?php 
include('../config/conexao_pdo.php');
include('../cabecalho.php'); 

if($_POST){
  
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $celular = preg_replace('/\D/', '', $_POST['celular']);
    $senha = $_POST['senha'];

    $sql = "SELECT * from usuario WHERE usuario_email = :email OR usuario_username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $usuario = $stmt->fetch();
    //verificar se o usuario existe na minha base de dados
    if($usuario['usuario_email'] == $email || $usuario['usuario_username'] == $username){
        echo '<script>alertaErro(""ERRO! Usuário já cadastrado",true)</script>';
    } else {
        $sql = "INSERT INTO usuario (usuario_email, usuario_senha, usuario_nome, usuario_username, usuario_celular) VALUES (:email, :senha, :nome, :username, :celular)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha);
        $stmt->bindValue(':celular', $celular);
        $stmt->execute();
        echo '<script>alertaSucesso("Cadastrado com sucesso!","/pcc/index.php")</script>';

    }   

} else {
    echo '<script>alertaErro("Erro! Informe os dados.",true)</script>';
}

?>