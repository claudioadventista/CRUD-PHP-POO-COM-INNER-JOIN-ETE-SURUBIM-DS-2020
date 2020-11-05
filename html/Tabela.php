<table  class="tabela" cellpadding="5"  >
			<thead>
				<th class="cont">Cont</th>
				<th class="nome">Nome</th>
				<th >ID Turma</th>
				<th class="turma">Turma</th>
				<th >Altura</th>
				<th >Peso</th>
				<th class="imc">IMC</th>
				<th class="situacao">Situa&ccedil&atildeo do Peso</th>
				<th >A&ccedil&atildeo</th>
			</thead>
			<tbody>
				<?php
					$contAluno = 1;
					
					foreach ($alunos as $aluno){
				?>
				<tr>
					<td class="turma"><?php echo $contAluno; ?></td>
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
						<a class="but"  href="FormUpdate.php?id=<?php echo $aluno->id_aluno ?>"><i class="fas fa-pen iBlue" ><span class="butColor"> Alterar </span></i></a>
						<a class="but" href="../CallClass.php?delete=1&id=<?php echo $aluno->id_aluno ?>" OnClick="return confirm('Confirma Exclusão de:\n <?php echo $aluno->aluno ?>')"><i class="fas fa-trash-alt iRed" ><span class="butColor"> Excluir </span></i></a>
					</td>
					<?php $contAluno ++;} ?>
				</tr>
			</tbody>
		</table>
