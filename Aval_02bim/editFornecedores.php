<!--Pedro Barbosa e Edgard Alexandre-->
<?php
	require_once 'init.php';
	include_once 'fornecedores.class.php';
$dadosOK = true;
//Pega Dados Formulário
$id = isset($_POST['id']) ? $_POST['id'] : null;
$name = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
$dataFundacao = isset($_POST['txtData']) ? $_POST['txtData'] : null;
$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
	
//Valida Email
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
   echo "Email Invalido";
}
//Instancia Objeto Fornecedores
$fornecedores = new Fornecedores($name ,$dataFundacao ,$email);
//BD Update
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
echo"Erro Ao Modificar!";
print_r($stmt ->errorInfo());
}
?>
