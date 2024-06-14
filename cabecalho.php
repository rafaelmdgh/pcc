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
	<header width="100%">
		<div class="row">
			<div class="col-md-11">

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
</body>
</html>