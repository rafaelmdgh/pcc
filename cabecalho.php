<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
		echo "<link rel='stylesheet' type='text/css' href='/pcc/css/bootstrap/bootstrap.min.css' />";
		echo "<link rel='stylesheet' type='text/css' href='/pcc/css/estilo.css' />";
		echo "<script type='text/javascript' src='/pcc/js/bootstrap/bootstrap.min.css'></script>";
	?>
</head>
<body>
<div class="container">
	<header width="100%">
		<div class="row">
			<div class="col-md-1">
				<a href="/pcc/index.php">Home</a>
			</div>
			<div class="col-md-1">
			</div>
			<div class="col-md-1" onclick="alert(a)">
				<a href="/pcc/cadastro-fornecedores/lista.php">Fornecedores</a>
			</div>
			<div class="col-md-1">
				<a href="/pcc/cadastro-clientes/lista.php">Clientes</a>
			</div>
			<div class="col-md-1">
				<a href="/pcc/cadastro-historicos/lista.php">Históricos</a>
			</div>
			<div class="col-md-1">
				<a href="/pcc/cadastro-contas-pagar/lista.php">Contas a Pagar</a>
			</div>
			<div class="col-md-1">
				<a href="/pcc/cadastro-contas-receber/lista.php">Contas a Receber</a>
			</div>
			<div class="col-md-1">
				<a href="/pcc/cadastro-metas/lista.php">Metas</a>
			</div>
			<div class="col-md-2">
			</div>
			<div class="col-md-1">
				<?php
					if (isset($_SESSION['usuario_codigo'])) {

						echo '<input type="button" class="btn btn-primary" onclick="location.href=\'/pcc/login/sair.php\'" value="Sair" />';
					}
				?>
			</div>
		</div>
	</header>
</div>
</body>
</html>