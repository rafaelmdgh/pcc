<?php
    include ('../config/conexao_pdo.php');
    
    if(isset($_POST)){
        $email = $_POST['email'];
        $user = '';
        if(!str_contains($email, '@')){
            $user = $_POST['email'];
            $email = "";
        }
        $senha = $_POST['senha'];
        $stmt = $pdo->prepare('SELECT * FROM usuario where usuario_email = :email or usuario_username = :usuario');
        $stmt -> bindValue(':email', $email);
        $stmt -> bindValue(':usuario', $user);
        $stmt -> execute();

        $usuario = $stmt->fetch();
        //verificar se o usuario existe na minha base de dados
        if($usuario['usuario_senha'] == $senha){
            if(($email == $usuario['usuario_email'] or $user == $usuario['usuario_username']) && $senha == $usuario['usuario_senha']){
                $_SESSION['usuario_codigo'] = $usuario['usuario_codigo'];
                $_SESSION['usuario_email'] = $usuario['usuario_email'];
                $_SESSION['usuario_nome'] = $usuario['usuario_nome'];
                header('location:interno.php');
                
            } else {
                echo "<div class='erro'>Usuario não encontrado</div>";
                exit;
            }
        }else{
            echo "<div class='erro'>Senha incorreta</div>";
            exit;
        }
    } else {
        echo "Envie as informações";
    }
?>