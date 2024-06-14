<?php 
include('../config/conexao_pdo.php');

if($_POST){
    $usuario = $_SESSION['usuario_codigo'];
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $imagem = $_FILES['imagem'];

    $sql = "INSERT INTO meta (meta_usuario, meta_nome, meta_valor) VALUES (:usuario, :nome, :valor)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':usuario', $usuario);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':valor', str_replace(',','.',$valor));
    $stmt->execute();
    
    $ultimaInsercao = $pdo->lastInsertId();

    $sql = "SELECT * FROM meta WHERE meta_usuario = :usuario AND meta_codigo = :codigo";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':usuario', $usuario);
    $stmt->bindValue(':codigo', $ultimaInsercao);
    $stmt->execute();
    $meta = $stmt->fetch();

    $metaUsuario = $meta['meta_usuario'];
    $metaCodigo = $meta['meta_codigo'];
    if(isset($imagem)){
        $diretorio = "imagens/";
        $extensoesValidas = array('image/jpeg', 'image/jpg', 'image/png', 'image/gif');
        if($imagem['name'] != '' ) {
            if (!in_array($imagem['type'],  $extensoesValidas)) {
                echo "Erro: Tipo do arquivo inválido. Envie apenas imagens JPG/JPEG/PNG/GIF.";
                exit;
            }else{
                $extensao = str_replace('image/','.',$imagem['type']);
                $nome_imagem = 'usuario'.$metaUsuario.'_meta'.$metaCodigo.'_'.uniqid().$extensao;
                $caminho_arquivo = $diretorio . $nome_imagem;
                if(move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_arquivo)){
                    $sql = 'UPDATE meta SET meta_imagem = :nova_imagem WHERE meta_usuario = :usuario AND meta_codigo = :codigo';
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(':nova_imagem', $nome_imagem);
                    $stmt->bindValue(':usuario', $metaUsuario);
                    $stmt->bindValue(':codigo', $metaCodigo);
                    $stmt->execute();
                    echo "<br>Cadastrado com sucesso!";
                    echo "<br><a href='lista.php'>Lista de metas</a>";
                }
            }
        }
    }else{
        echo "imagem tá setada";
    }
} else {
    echo "ERRO! Informe os dados";
}

?>
