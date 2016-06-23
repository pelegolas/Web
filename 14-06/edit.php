//OK
<?php
	require_once 'init.php';
	include_once 'cliente.class.php';
//validação da  imagem
$dadosOK = true;

//pega os dados  do formulário
$id = isset($_POST['id']) ? $_POST['id'] : null;
$name = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
$dataCadastro = isset($_POST['txtData']) ? $_POST['txtData'] : null;
$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
//validação simples se campos  estão  vazios
if(empty($name) || empty($dataCadastro) || empty($email))
{
echo"Campos  devem  ser preenchidos!!";
exit;
}
//instancia objeto  cliente
$cliente = new Cliente($name ,$dataCadastro ,$email);
//atualiza o BD
$PDO = db_connect();
$sql ="UPDATE clientes SET nome = :name,  dataCadastro = :data, email = :email WHERE  idCliente = :id";
$stmt = $PDO ->prepare($sql);
$stmt ->bindParam(':name', $cliente->getNome());
$stmt ->bindParam(':data', $cliente->getDataCadastro());
$stmt ->bindParam(':email', $cliente->getEmail());
$stmt ->bindParam(':id', $id , PDO:: PARAM_INT);

if($stmt->execute())
{
header('Location: index.php');
}
else
{
echo"Erro ao  alterar";
print_r($stmt ->errorInfo());
}
?>
