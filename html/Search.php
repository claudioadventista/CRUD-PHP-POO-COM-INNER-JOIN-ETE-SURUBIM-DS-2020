<?php
require '../AllClasses.php';
require_once 'Top.php';

if((isset($_POST['buscaAluno']))and($_POST['buscaAluno']<>"")){
	    $buscaAluno = $_POST['buscaAluno'];	
		$alunos = Classe::PesquisaAluno($buscaAluno);
		
		if(empty($alunos)){	
		header("Location: Home.php");  	
		}
?>
<body>
	<div class="form">
		<h3> P&agravegina de Resultado da Pesquisa</h3> 
		<br><br><hr><br>
		<a class="butA butB" style="color:black;" href="Home.php" ><i class="fas fa-undo iRed" ><span class="butColor"> Voltar para Home</span></i></a>
	</div>
	<div class="contagem">
	<h3> Nome Pesquisado foi : <?php echo '<span style="color:blue" >'.$buscaAluno.'</span>'?> Lista do(s) nome(s) encontrado(s). 
		<?php
			$conta = Classe::ContaAlunoBusca($buscaAluno);
			echo '<span style="color:blue" >'.$conta." aluno(s) ".'</span>'." encontrado(s)";
		?>
	</h3>
	</div>
	<div class="tab">
		<?php
			require_once 'Tabela.php';
			}
		?>
	
	</div>
</body>
</html>
