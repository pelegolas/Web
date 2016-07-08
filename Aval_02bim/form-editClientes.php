<!--Pedro Barbosa e Edgard Alexandre-->
<?php
	require 'init.php';
	//Pega Id
	$id = isset($_GET ['id']) ? (int) $_GET['id'] : null;
	//Verifica se não é nulo
	if(empty($id))
	{
 echo "ID para alteração não definido";
 exit;
 }
 //Busca os Dados 
 $PDO = db_connect();
 $sql = "SELECT nomeCliente, dataCadastro, email FROM clientes WHERE idCliente = :id";
 $stmt = $PDO->prepare($sql);
 $stmt->bindParam(':id', $id, PDO::PARAM_INT);
 $stmt->execute();
 $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
 if(!is_array($cliente))
 {
    echo "Nenhum cliente encontrado";
    exit;
 }
 $dataOK = dateConvert($cliente['dataCadastro']);
?>
<div class="conteudo" id="conteudo">
   <form method="post" name="formAltera" action="editCliente.php" enctype="multipart/form-data" onSubmit="return verifica()">
      <h1>Edição de dados</h1>
      <table width="100%">
         <tr>
            <th width="18%">Nome do Cliente</th>
            <td width="82%"><input type="text" name="txtNome" id="nome" value="<?php echo $cliente['nomeCliente']?>"></td>
         </tr>
         <tr>
            <th>Data do Cadastro</th>
            <td><input type="text" name="txtData" id="data" class="cC" readonly value="<?php echo $dataOK ?>"></td>
         </tr>
         <tr>
            <th>Email</th>
            <td><input type="email" name="txtEmail" id="email" value="<?php echo $cliente['email']?>"></td>
         </tr>
         <tr>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <td><input type="submit" name="btnEnviar" value="Alterar"></td>
            <td><input type="reset" name="btnLimpar" value="Limpar"></td>
         </tr>
      </table>
   </form>
</div>

