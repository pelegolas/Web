<?php
	require_once 'init.php';
	include_once 'clientes.class.php';
$dadosOK = true;
//pega os dados  do formulário
$id = isset($_POST['id']) ? $_POST['id'] : null;
$name = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
$dataCadastro = isset($_POST['txtData']) ? $_POST['txtData'] : null;	
$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
	
//validação email
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
   echo "Email Invalido";
}
//instancia objeto  clientes
$clientes = new Clientes($name ,$dataCadastro ,$email);
//atualiza o BD
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
echo"Erro ao  alterar";
print_r($stmt ->errorInfo());
}
?>
