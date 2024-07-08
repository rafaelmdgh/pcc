<?php
	
	include ('verifica-sessao.php');
	include('./config/conexao_pdo.php');
	$stmt = $pdo->prepare("SELECT * FROM meta WHERE meta_usuario = ".$_SESSION["usuario_codigo"]." AND meta_nome not like '%[Concluída]' ORDER BY meta_valor ASC;");
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
	<div class="container caixa-home">
		<div class="row">
			<div class="col-md-6">
				<h1>Olá, <?php echo $_SESSION['usuario_nome'] ?></h1> 
			</div>
			<div class="col-md-6">
				<h2 style="text-align: right;">Saldo: R$<?php echo $valorNaConta ?></h2>

			</div>
		</div>
		<br>

		
			<div class="row">
			<div class="col-md-12">
				<center>
					<h1>
						Veja o progresso das suas metas:
					</h1>
				</center>
			</div>
			</div>
			<br>
		<div class="row row-card">
		<?php 
			foreach ($metas as $meta){
				$porcentagem = ($valorNaConta / $meta['meta_valor']) * 100;
				echo '
					<div class="card card-meta" style="width: 18rem;">
					<div class="card-titulo">'.$meta['meta_nome'].'</div>
					<img class="card-img-top img-meta" src="/pcc/cadastro-metas/imagens/'.$meta['meta_imagem'].'" alt="Imagem de capa do card">
					<div class="card-body">
						
						<p class="card-text">Valor: R$'.$meta['meta_valor'].'</p>
						<div class="progress">
							<div class="progress-bar" role="progressbar" style="width: '.$porcentagem.'%;" aria-valuenow="'.$porcentagem.'" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
				';
				
				if ($porcentagem > 100){
					echo '<div class="card-legenda">Você tem o valor necessário!</div>';
				}else{
					echo '<div class="card-legenda">R$'.$valorNaConta.'/R$'.$meta['meta_valor'].'</div>';
				}
				echo '	
				</div>
					
					<form method="get" action="">
						<input type="hidden" name="metaConcluida'.$meta['meta_codigo'].'" id="metaConcluida'.$meta['meta_codigo'].'">
						<input width="100%" type="submit" class="btn btn-primary" onclick="concluirMeta('.$meta['meta_codigo'].')" value="Concluir">
					</form>
					
					</div>
					<script>
						function concluirMeta(codigo){
							document.getElementById("metaConcluida"+codigo).value = codigo;
						}
					</script>
				';
				if(isset($_GET)){
					if(isset($_GET['metaConcluida'.$meta['meta_codigo']])){
                        $stmt = $pdo->prepare("UPDATE meta SET meta_nome = CONCAT(meta_nome, ' [Concluída]') WHERE meta_codigo = ".$meta['meta_codigo']." AND meta_usuario = ".$_SESSION['usuario_codigo']." ;");
                        $stmt->execute();
                    }
				}
			}
		?>
		</div>
	</div>
</body>
</html>