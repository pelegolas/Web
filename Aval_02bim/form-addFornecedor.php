<!--Pedro Barbosa e Edgard Alexandre-->
<?php
	require 'init.php';
?>
<!DOCTYPE html>
	<div class="conteudo" id="conteudo">
		<form method="post" name="formCadastro" action="addFornecedor.php" enctype="multipart/form-data" onSubmit="return verifica()">
			<h1>Cadastro de Fornecedor</h1>
			<table width="100%">
				<tr>
					<th width="18%"> Nome do Fornecedor </th>
					<td width="82%"><input type="text" name="txtNome" id="nome"></td>
				</tr>
				<tr>
					<th> Data da Fundação </th>
					<td><input id="data" type="text" name="txtData" class="cF" Value="dd/mm/aaaa" readonly></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><input type="email" name="txtEmail" id="email"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="btnEnviar" value="Cadastrar">
						<input type="reset" name="btnLimpar" value="Limpar"></td>
				</tr>
			</table>
		</form>
	</div>
</html>
