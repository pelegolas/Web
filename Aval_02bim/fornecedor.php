<!--Pedro Barbosa e Edgard Alexandre-->
<?php
	require_once 'init.php';
	//Inicia a COnxão
	$PDO=db_connect();
	$sql_count = "SELECT COUNT(*) AS total FROM fornecedores ORDER BY nomeFornecedor ASC";
	$sql = "SELECT idFornecedor, nomeFornecedor, dataFundacao, email FROM fornecedores ORDER BY nomeFornecedor ASC";
	//Contador de Registros
	$stmt_count=$PDO->prepare($sql_count);
	$stmt_count->execute();
	$total=$stmt_count->fetchColumn();
	$stmt=$PDO->prepare($sql);
	$stmt->execute();
?>
 <div class="conteudo">
		<p> <input type="button" href="form-addFornecedor.php" name="novo" value="Adicionar Fornecedor"  onClick="chama(this)"></p>
		<h2>Lista de Fornecedor</h2>
		<p>Total de Fornecedor: <?php echo $total ?></p>
		<?php if($total > 0): ?>
		<table width="100%" border="1">
			<thead>
				<tr>
					<th>Matricula</th>
					<th>Nome do Fornecedor</th>
					<th>Data de Fundação</th>
					<th>Email</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php while($fornecedor = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
			<tr>
				<td><?php echo $fornecedor['idFornecedor']?></td>
				<td><?php echo $fornecedor['nomeFornecedor']?></td>
				<td><?php echo dateConvert($fornecedor ['dataFundacao'])?></td>
				<td><?php echo $fornecedor['email']?></td>
				<td>
					<a href="form-editFornecedor.php?id=<?php echo $fornecedor['idFornecedor']?>">Editar</a>
					<a href="deleteFornecedores.php?id=<?php echo $fornecedor['idFornecedor']?>"onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
				</td>
				</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
		<?php else: ?>
		<p>Nenhum Fornecedor registrado</p>
		<?php endif; ?>
</div>

