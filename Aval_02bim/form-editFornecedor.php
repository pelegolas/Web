<!--Pedro Barbosa e Edgard Alexandre-->
<?php
	require 'init.php';
	//Pega ID
	$id = isset($_GET ['id']) ? (int) $_GET['id'] : null;
	//Valida o ID
	if(empty($id))
	{
 echo "ID para alteração não definido";
 exit;
 }
 //Buscar
 $PDO = db_connect();
 $sql = "SELECT nomeFornecedor, dataFundacao, email FROM fornecedores WHERE idFornecedor = :id";
 $stmt = $PDO->prepare($sql);
 $stmt->bindParam(':id', $id, PDO::PARAM_INT);
 $stmt->execute() ;
 $fornecedor = $stmt->fetch(PDO::FETCH_ASSOC);
 if(!is_array($fornecedor))
 {
    echo "Nenhum fornecedor encontrado";
    exit;
 }
 $dataOK = dateConvert($fornecedor['dataFundacao']);
?>
<div class="conteudo" id="conteudo">
   <form method="post" name="formAltera" action="editFornecedores.php" enctype="multipart/form-data" onSubmit="return verifica()">
      <h1>Edição de dados</h1>
      <table width="100%">
         <tr>
            <th width="18%">Nome do Fornecedor</th>
            <td width="82%"><input type="text" name="txtNome" id="nome" value="<?php echo $fornecedor['nomeFornecedor']?>"></td>
         </tr>
         <tr>
            <th>Data de Fundação</th>
            <td><input type="text" name="txtData" id="data" class="cF" value="<?php echo $dataOK ?>">
            </td>
         </tr>
         <tr>
            <th>Email</th>
            <td><input type="email" name="txtEmail" id="email" readonly value="<?php echo $fornecedor['email']?>"></td>
         </tr>
         <tr>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <td><input type="submit" name="btnEnviar" value="Alterar"></td>
            <td><input type="reset" name="btnLimpar" value="Limpar"></td>
         </tr>
      </table>
   </form>
</div>
