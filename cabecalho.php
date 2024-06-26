<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
		echo "<link rel='stylesheet' type='text/css' href='/pcc/css/bootstrap/bootstrap.min.css' />";
		echo "<link rel='stylesheet' type='text/css' href='/pcc/css/estilo.css' />";
		echo "<script type='text/javascript' src='/pcc/js/bootstrap/bootstrap.min.js'></script>";
		echo "<script type='text/javascript' src='/pcc/js/funcoes.js'></script>";
	?>
</head>
<body onload="trocarCor(window.location.href)">
  </div>
		<?php
			if (isset($_SESSION['usuario_codigo'])) {
					echo '
						<div class="container">
							<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
							<a href="/pcc/index.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
								<svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
									<strong style="font-family: Brush Script MT, cursive; font-size: 50px">GoalPlan</strong>
								</a>

							<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
								<li><a href="/pcc/cadastro-fornecedores/lista.php" class="nav-link px-2 link-dark">Fornecedores</a></li>
								<li><a href="/pcc/cadastro-clientes/lista.php" class="nav-link px-2 link-dark">Clientes</a></li>
								<li><a href="/pcc/cadastro-metas/lista.php" class="nav-link px-2 link-dark">Metas</a></li>
								<li><a href="/pcc/cadastro-historicos/lista.php" class="nav-link px-2 link-dark">Históricos</a></li>
								<li><a href="/pcc/cadastro-contas-pagar/lista.php" class="nav-link px-2 link-dark">Pagamentos</a></li>
								<li><a href="/pcc/cadastro-contas-receber/lista.php" class="nav-link px-2 link-dark">Recebimentos</a></li>
							</ul>

							<div class="col-md-3 text-end">
								<input type="button" class="btn btn-primary" onclick="location.href=\'/pcc/login/sair.php\'" value="Sair" />
							</div>
							</header>
					';
			}
			?>
			</div>
		</div>
	</header>
</div>
</body>
</html>