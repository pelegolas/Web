<?php
	require_once 'init.php';
	include_once 'fornecedores.class.php';
$dadosOK = true;
//pega os dados  do formulário
$id = isset($_POST['id']) ? $_POST['id'] : null;
$name = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
$dataFundacao = isset($_POST['txtData']) ? $_POST['txtData'] : null;
$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
	
//validação email
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
   echo "Email Invalido";
}
//instancia objeto  fornecedores
$fornecedores = new Fornecedores($name ,$dataFundacao ,$email);
//atualiza o BD
$PDO = db_connect();
$sql ="UPDATE  fornecedores  SET nomeFornecedor = :name,  dataFundacao = :dataFundacao, email = :email WHERE  idFornecedor = :id";
$stmt = $PDO ->prepare($sql);
$stmt ->bindParam(':name', $fornecedores->getnomeFornecedor());
$stmt ->bindParam(':dataFundacao', $fornecedores->getdataFundacao());
$stmt ->bindParam(':email', $fornecedores->getemail());
$stmt ->bindParam(':id', $id , PDO:: PARAM_INT);

if($stmt->execute())
{
header('Location: fornecedor.php');
}
else
{
echo"Erro ao  alterar";
print_r($stmt ->errorInfo());
}
?>
