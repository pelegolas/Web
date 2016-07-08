<!--Pedro Barbosa e Edgard Alexandre-->
<?php
	require_once 'init.php';
	include_once 'clientes.class.php';
$dadosOK = true;
//Pega os Dados do Formulário
$id = isset($_POST['id']) ? $_POST['id'] : null;
$name = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
$dataCadastro = isset($_POST['txtData']) ? $_POST['txtData'] : null;	
$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
//Validar Email
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
   echo "Email Invalido";
}
//Novo objeto Clientes
$clientes = new Clientes($name ,$dataCadastro ,$email);
//BD Update
$PDO = db_connect();
$sql ="UPDATE  clientes  SET nomeCliente = :name,  dataCadastro = :dataCadastro, email = :email WHERE  idCliente = :id";
$stmt = $PDO ->prepare($sql);
$stmt ->bindParam(':name', $clientes->getnomeCliente());
$stmt ->bindParam(':dataCadastro', $clientes->getdataCadastro());
$stmt ->bindParam(':email', $clientes->getemail());
$stmt ->bindParam(':id', $id , PDO:: PARAM_INT);

if($stmt->execute())
{
header('Location: cliente.php');
}
else
{
echo"Erro Ao Modificar!";
print_r($stmt ->errorInfo());
}
?>
