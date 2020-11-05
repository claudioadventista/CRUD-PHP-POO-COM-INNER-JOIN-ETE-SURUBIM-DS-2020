<?php    
	require '../AllClasses.php';
	require 'Top.php';
	$alunos = Classe::ListaAluno();
?>
<body>		
	<div class="form">
		<?php

// ********** LISTA ALUNO PARA ALTERAÇÃO
			if(isset($_GET,$_GET['id'])){	
			$aluno = Classe::AlunoUnico($_GET['id']); // Chama a classe Lista AlunoUnico
			if($aluno){
		?>
		<h3> Formul&agraverio de Altera&ccedil&atildeo</h3>
		<br>
		<form name="form" action="../CallClass.php" method="POST">
			<input type="hidden" name="idAlt" value="<?php echo $aluno->id_aluno ?>">
			Nome
			<input type="text" name="nome" maxlength="20" placeholder="Min 3 caracteres" value="<?php echo $aluno->aluno ?>">
			Altura
			<input type="text" name="altura"  class="inputForm" maxlength="4" placeholder="Min 0.50, Max 2.70"  onkeypress="return SomenteNumero(event)" value="<?php echo $aluno->altura ?>">
			<!--Turma <input type="text" name="turma" value="<?php echo $aluno->id_turma ?>">-->
			Peso   
			<input type="text" name="peso" id="peso" class="inputForm" maxlength="5" placeholder="Min 20, Max 120"  onkeypress="return SomenteNumero(event)" value="<?php echo $aluno->peso ?>">
			Turma
			<select class="select_turma" id="id_turma"  name="turma" >
				<option value="<?php echo $aluno->id_turma; ?>"> &nbsp&nbsp <?php echo $aluno->nome_turma; ?>
					&nbsp&nbsp </option>
				<?php
				
// ********** LISTA TURMA NO SELECT PARA ALTERAÇÃO
					$turmas = Classe::ListaTurma();
					foreach ($turmas as $turma){
				?>
				<option value="<?php echo $turma -> id_turma; ?>"> &nbsp&nbsp <?php echo $turma -> nome; ?>
					&nbsp&nbsp </option>
				<!--<option value="<?php echo $turma -> id_turma; ?>"> &nbsp&nbsp <?php echo $turma -> id_turma; ?> &nbsp&nbsp </option>-->
				<?php }; ?>
			</select>
			<span class="spanBotao" >
				<button class="but" type="submit" onclick=" return validaCampo()"><i class="fas fa-pen iBlue" ><span class="butColor"> Salva Alteração </span></i></button>
				
				<a class="butA" href="../CallClass.php?delete=1&id=<?php echo $aluno->id_aluno ?>" OnClick="return confirm('Confirma Exclusão de:\n <?php echo $aluno->aluno ?>')"><i class="fas fa-trash-alt iRed" ><span class="butColor"> Excluir </span></i></a>
			
			</span>
			<br><br><hr><br>
			<a class="butA butB" href="Home.php" ><i class="fas fa-window-close iRed" ><span class="butColor"> Cancelar </span></i></a>
		</form>
		</div>
		<div class="contagem">
		<h3> Lista de Cadastro  
			<?php
				$ContaAlunos = Classe::ContaAluno();
				 echo '<span style="color:blue" >'.$ContaAlunos." aluno(s)". '</span>'." cadastrado(s)";
			?>
		</h3>
		
	</div>
		<div class="tab">
		<?php
			require_once 'Tabela.php';
		?>
		</div>
	
	<script type="text/javascript" src="../js/functions.js"></script>
	<?php 
		}
 	} 
 ?>
</body>
</html>
