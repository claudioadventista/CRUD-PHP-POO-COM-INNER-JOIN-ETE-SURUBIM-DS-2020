<?php
	require '../AllClasses.php'; 
	require_once 'Top.php';
	$alunos = Classe::ListaAluno();
	$turmas = Classe::ListaTurma();
?>
<body>
	<div class="form">
		<h3> Formul&agraverio de Cadastro</h3>
		<br>
		<form name="form" action="../CallClass.php" method="POST">	
			Nome   <input type="text" name="nome" id="nome"  maxlength="20" placeholder="Min 3 caracteres" >
			Altura <input type="text" class="inputForm" name="altura" id="altura" maxlength="4" placeholder="Min 0.50, Max 2.70"  onkeypress="return SomenteNumero(event)" >
			Peso   <input type="text" class="inputForm" name="peso" id="peso" maxlength="5" placeholder="Min 20, Max 120"  onkeypress="return SomenteNumero(event)" >
			Turma  <select id="id_turma"  name="id_turma" >
					<?php
						 		 	
// ********** LISTA TURMA NO SELECT	
						foreach ($turmas as $turma){
					?>
					<option value="<?php echo $turma -> id_turma; ?>"> &nbsp&nbsp <?php echo $turma -> nome; ?> &nbsp&nbsp </option> 
					<?php } ?>
					</select>
						<span class="spanBotao" >
							<!-- <input type="submit" class="submit" name="envio" id="envio" onclick="return validaCampo()" value="Inserir" />-->
							<button class="but" type="submit"  name="envio" id="envio" onclick=" return validaCampo()"  ><i class="fas fa-plus-square iLightGreen" ><span class="butColor"> Inserir</span></i></button>
							<button class="but" type="reset" OnClick="return confirm('Deseja Limpar Todos os Campos?')"  ><i class="fas fa-eraser iBrown" ><span class="butColor"> Limpar</span></i></button>
						</span>
			<br><br><hr><br>
			<?php
				
// ********** LISTA ALUNO CADASTRADOS 
				$ContaAlunosExcluidos = Classe::ContaAlunoExcluido();
				if(empty($ContaAlunosExcluidos)){
					echo'<button class="but" style="cursor:not-allowed;" disabled ><i class="fas fa-user-slash butInab" ><span class="butColor butInab"> Nenhum Excluído </span></i></button>';
				}else{?>
					<button type="submit" class="but" name="retornarExcluidos" id="retornarExcluidos" /><i class="fas fa-user-slash iOrange" ><span class="butColor"> Retornar <?php echo $ContaAlunosExcluidos; ?> Excluído(s) </span></i></button>
			<?php } ?>
		</form>
	</div>
	<div class="contagem">
		<h3> Lista de Cadastro  
			<?php
				$ContaAlunos = Classe::ContaAluno();
				 echo '<span style="color:blue" >'.$ContaAlunos." aluno(s)". '</span>'." cadastrado(s)";
			?>
		</h3>
		<form class="formPesquisar" name="formPesquisa" action="Search.php" method="POST">
			<input type="text" name="buscaAluno" id="buscaAluno" maxlength="20" placeholder="Digite aqui sua busca"  >
			<?php 
				if($ContaAlunos < 3){
					echo'<button class="but" style="cursor:not-allowed;" disabled ><i  class="fas fa-search butInab" ><span class="butColor  butInab"> Pesquisar </span></i></button>';
				}else{?>
			<button class="but" type="submit" value="Pesquisar" onclick="return validaCampoPesquisa()" /><i class="fas fa-search iWhite" ><span class="butColor"> Pesquisar </span></i></button>
			<?php } ?>
		</form>
	</div>
	<div class="tab">
		<?php
			require_once 'Tabela.php';
		?>
	</div>
  <script type="text/javascript" src="../js/functions.js"></script>
</body>
</html>
