<?php 
	include('../verifica-sessao.php');
	include('../config/conexao_pdo.php');
	try {
		if ($_GET['registrosSelecionados'] != ''){
			$registrosSelecionados = explode(',',$_GET['registrosSelecionados']);
			$usuario = $_SESSION['usuario_codigo'];
			$dataAtual = date("Y-m-d");
			foreach($registrosSelecionados as $registro){
				$sql = "UPDATE contas_receber SET receber_dt_baixa = :dt_baixa WHERE receber_nr_lancamento = :nr_lancamento AND receber_usuario = :usuario";
				$stmt = $pdo->prepare($sql);
				$stmt->bindValue(':usuario', $usuario);
				$stmt->bindValue(':nr_lancamento', $registro);
				$stmt->bindValue(':dt_baixa', $dataAtual);
				$stmt->execute();
			}
			echo '<script>alertaSucesso("Registro(s) baixado(s) com sucesso","lista.php")</script>';
		}else{
			echo '<script>alertaErro("Nenhum registro selecionado",true)</script>';
		}
	}catch(PDOException $e){
		echo "Erro: ".$e->getMessage();
	}	
?>