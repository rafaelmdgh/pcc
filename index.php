<?php
	
	include ('verifica-sessao.php');
	include('./config/conexao_pdo.php');
	$stmt = $pdo->prepare("SELECT * FROM meta WHERE meta_usuario = ".$_SESSION["usuario_codigo"]."  ORDER BY meta_valor ASC;");
	$stmt->execute();
	$metas = $stmt->fetchAll();

	$stmt = $pdo->prepare("SELECT SUM(pagar_valor) total FROM contas_pagar WHERE pagar_usuario = ".$_SESSION["usuario_codigo"]." AND pagar_dt_baixa != '0001-01-01' ;");
	$stmt->execute();
	$valor_pagar = $stmt->fetch();

	$stmt = $pdo->prepare("SELECT SUM(receber_valor) total FROM contas_receber WHERE receber_usuario = ".$_SESSION["usuario_codigo"]." AND receber_dt_baixa != '0001-01-01' ;");
	$stmt->execute();
	$valor_receber = $stmt->fetch();

	$valorNaConta = $valor_receber['total'] - $valor_pagar['total'];
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Home Page</title>
	</head>
	<body>
	<div class="container">

		<h1>Olá, <?php echo $_SESSION['usuario_nome'] ?></h1> 
		<p>
			Progressos das metas:
		</p>
		<div class="row">
		<?php 
			foreach ($metas as $meta){
				$porcentagem = ($valorNaConta / $meta['meta_valor']) * 100;
				echo '
					<div class="card" style="width: 18rem;">
					<img class="card-img-top" src="/pcc/cadastro-metas/imagens/'.$meta['meta_imagem'].'" alt="Imagem de capa do card">
					<div class="card-body">
						<center>
						<p class="card-text">'.$meta['meta_nome'].'</p>
						<p class="card-text">'.$meta['meta_valor'].'</p>
						<div class="progress">
							<div class="progress-bar" role="progressbar" style="width: '.$porcentagem.'%;" aria-valuenow="'.$porcentagem.'" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
				';
				
				if ($porcentagem > 100){
					echo 'Você tem o valor necessário!';
				}else{
					echo 'R$'.$valorNaConta.'/R$'.$meta['meta_valor'];
				}
				echo '</center>	
					</div>
					</div>
				';
			}
		?>
		</div>
	</div>
</body>
</html>