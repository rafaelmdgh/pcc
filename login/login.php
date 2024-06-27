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
<div class="container personalizado">
    <div class="caixa-cadastro">
      <section id="" class=".container-md">
        <h1><strong style="font-family: Brush Script MT, cursive; font-size: 70px">GoalsPlan</strong></h1><br>
        <form class="form-group" action="logar.php" method="post">
          <label for="email">Usuário/Email:</label><br>
          <input class="form-control" type="text" name="email" id="usuario"><br><br>
          <label for="senha">Senha:</label><br>
          <input class="form-control" type="password" name="senha" id="senha"><br><br>
          <input class="form-control btn btn-primary" type="submit" value="Entrar"><br>
          <p>Não possui conta?<a href="../cadastro-usuarios/cadastrar.php"> Cadastre-se. </a></p>
        </form>
      </section>
    </div>
</div>
</body>
</html>