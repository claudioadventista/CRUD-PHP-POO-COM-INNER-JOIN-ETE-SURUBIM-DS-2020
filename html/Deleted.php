<?php
	require '../AllClasses.php'; 
	require_once 'Top.php';
	$alunos = Classe::ListaAlunoExcluido();
?>
<body>
	<div class="form">
		<h3> P&agravegina de Excluidos</h3>
		<br><br><hr><br>
		<a class="butA butB" style="color:black;" href="Home.php" ><i class="fas fa-undo iRed" ><span class="butColor"> Voltar para Home </span></i></a>
	</div>
	<div class="contagem">
		<h3> Lista de Excluídos  
		<?php
			$ContaAlunosExcluidos = Classe::ContaAlunoExcluido();
			 echo '<span style="color:blue" >'.$ContaAlunosExcluidos." aluno(s)". '</span>'." excluído(s)";
		?>
		</h3>	
		<form class="formPesquisar" action="../CallClass.php" name="form" method="POST">
			<?php if($ContaAlunosExcluidos >= 2){ ?>
				<!--	
				<a  style="text-align:left;height:30px;"  href="javascript:marcar()">Marcar&nbsptodos</a>						     
		    	<a  style="text-align:left;height:30px;"  href="javascript:desmarcar()">Desmarcar</a>					  
		    	-->   	
				<span class="retornarMarcados" id="retornarMarcados">
					<button type="submit" class="but" name="retornaMarcados" id="retornarMarcados" style="cursor:pointer;" ><i class="fas fa-backspace iGreen" ><span class="butColor"> Retornar Marcados </span></i></button>
				</span>
				<span id="retornarDesabilitado">
					<button class="but" disabled="true" style="cursor:not-allowed;" ><i class="fas fa-backspace butInab" ><span class="butColor butInab"> Retornar Marcados </span></i></button>
				</span>
				<button type="submit" class="but" name="retornarTodos" OnClick="return confirm('Confirma Retorno de Todos?')"><i class="fas fa-backward iGreen" ><span class="butColor"> Retornar Todos </span></i></button>
			<?php } ?>
	</div>
	<div class="tab">	
		<table  class="tabela" cellpadding="5"  >
			<thead>
				<th class="cont">Cont</th>
				<th class="simboloMarcarCheckbox"> &check; </th>
				<th class="nome">Nome</th>
				<th class="id_turma">ID Turma</th>
				<th class="turma">Turma</th>
				<th class="altura">Altura</th>
				<th class="peso">Peso</th>
				<th class="imc">IMC</th>
				<th class="situacao">Situa&ccedil&atildeo</th>
				<th class="acoes">A&ccedil&atildeo</th>
			</thead>
			<tbody>
				<?php
			    	$contAluno = 1;
				
					foreach ($alunos as $aluno){
				?>
				<tr>
					<td class="turma"><?php echo $contAluno; ?></td>
					<td class="checkbox">
						<?php if($ContaAlunosExcluidos < 2){ 
						echo'<input type="checkbox"  disabled >';
						 }else{ ?>
							<input type="checkbox" id="sel" name="numeros[]" value="<?php echo $aluno ->id_aluno; ?>" onclick="verificaChecks()" >
						<?php } ?>
					</td>
					<td><?php echo $aluno -> aluno; ?></td>
					<td class="turma"><?php echo $aluno -> id_turma; ?></td>
					<td class="turma nomeTurma"> <?php echo $aluno -> nome_turma; ?> </td> 
					<td><?php echo $aluno -> altura; ?></td>
					<td><?php echo $aluno -> peso; ?></td>
					<td>
					<?php 
						require '../IMC.php'; 
					?>	
				</td>
				<td>
					<?php
						require '../Situation.php'; 
					?>
				</td>
					<td class="acao">			
						<a class="but"  href="../CallClass.php?idExcluido=<?php echo $aluno->id_aluno ?>" OnClick="return confirm('Confirma Retorno de:\n <?php echo $aluno->aluno ?>')"><i class="fas fa-exchange-alt iBlue" ><span class="butColor"> Retornar </span></i></a>
					</td>
					<?php $contAluno ++;} ?>
				</tr>
			</tbody>
		</form>
		</table>
	</div>
	<!--<script type="text/javascript" src="../js/functions.js"></script>-->
	<script>
		
		// função que verifica se todos os checkbox foram marcados		
		function verificaChecks() {
			var aChk = document.getElementsByName("numeros[]");  
			var teste = 0;
				
			// atribui à variável javascriprum um valor vindo do php   
			var total = "<?= $ContaAlunosExcluidos; ?>" ; 
				for (var i=0;i<aChk.length;i++){  
					if (aChk[i].checked == true){               
						teste ++;             
					 }  else {
						teste --; 
					}	
					/*  desabilita o botão de Retornar Marcados se não houver nenhum
					checkbox marcado, ou se todos estiveremmarcados	             */				
				       
				    if(teste == total|| teste == -total){
				        document.getElementById("retornarMarcados").style.display = "none";	
				        document.getElementById("retornarDesabilitado").style.display ="inline";			
					} else {
						document.getElementById("retornarDesabilitado").style.display ="none";	
						document.getElementById("retornarMarcados").style.display = "inline";					 					
					}				               
				}
		} 
	</script>
</body>
</html>
