<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<?php 
			include ('verifica-sessao.php');
		?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Home Page</title>
	</head>
	<body>
<div class="container">

		<h1>Olá, <?php echo $_SESSION['usuario_nome'] ?></h1>
		<p>
			<a href="cadastro-fornecedores/lista.php">Cadastro de Fornecedores</a>
		</p>   
		<p>
			<a href="cadastro-clientes/lista.php">Cadastro de Clientes</a>
		</p> 
		<p>
			<a href="cadastro-historicos/lista.php">Cadastro de Históricos</a>
		</p>
		<p>
			<a href="cadastro-contas-pagar/lista.php">Cadastro de Pagamentos</a>
		</p>
		<p>
			<a href="cadastro-contas-receber/lista.php">Cadastro de Recebimentos</a>
		</p>
		<p>
			<a href="cadastro-metas/lista.php">Cadastro de Metas</a>
		</p>
	</div>
</body>
</html>