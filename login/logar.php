<?php
    include ('../config/conexao_pdo.php');
    include ('../cabecalho.php');
    
    if(isset($_POST)){
        $email = $_POST['email'];
        $user = '';
        if(!str_contains($email, '@')){
            $user = $_POST['email'];
            $email = "";
        }
        $senha = $_POST['senha'];
    $stmt = $pdo->prepare('SELECT * FROM usuario WHERE usuario_email = :email OR usuario_username = :usuario');
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':usuario', $user);
    $stmt->execute();

        $usuario = $stmt->fetch();
    // Verificar se o usuario existe na minha base de dados
    if ($usuario) {
        // Verificar a senha usando password_verify
        if (password_verify($senha, $usuario['usuario_senha'])) {
                $_SESSION['usuario_codigo'] = $usuario['usuario_codigo'];
                $_SESSION['usuario_email'] = $usuario['usuario_email'];
                $_SESSION['usuario_nome'] = $usuario['usuario_nome'];
                header('location:interno.php');
            } else {
            echo '<script>alertaErro("Usuário/Senha incorreta!",true)</script>';
        }
    } else {
        echo '<script>alertaErro("Usuário não encontrado!",true)</script>';
        }
    } else {
        echo '<script>alertaErro("Envie as informações",true)</script>';
    }
?>
