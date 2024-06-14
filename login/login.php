<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php 
      include ('../config/conexao_pdo.php');
			include (ROOT_PATH.'/cabecalho.php');
		?>
  <title>Login</title>
</head>
<body>
<div class="container">
  <center>
    
      <h1>Login</h1><br>
      <section id="" class=".container-md">
        <form action="logar.php" method="post">
          <label for="email">Usuário/Email:</label><br>
          <input type="text" name="email" id="usuario"><br><br>
          <label for="senha">Senha:</label><br>
          <input type="password" name="senha" id="senha"><br><br>
          <input type="submit" value="Entrar"><br>
          <p>Não possui conta?<a href="../cadastro-usuarios/cadastrar.php"> Cadastre-se. </a></p>
        </form>
      </section>
    </
  </center>
</div>
</body>
</html>