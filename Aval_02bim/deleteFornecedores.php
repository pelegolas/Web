<!--Pedro Barbosa e Edgard Alexandre-->
<?php
require_once 'init.php';
// Pega o ID
$id = isset($_GET['id']) ? $_GET['id'] : null;
// Valida o ID
if (empty($id))
	{
	echo " ID não informado";
	exit;
	}
// Remover
$PDO = db_connect();
$sql = "DELETE FROM fornecedores WHERE idFornecedor = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
if ($stmt->execute())
	{
	header('Location:fornecedor.php');
	}
  else
	{
	echo "Erro ao excluir";
	print_r($stmt->errorInfo());
	}

?>
<?php
require_once 'init.php';
//Pega o ID

$id = isset($_GET['id']) ? $_GET['id'] : null;

//Valida o ID

if (empty($id))
	{
	echo " ID não informado";
	exit;
	}
//Remover
$PDO = db_connect();
$sql = "DELETE FROM fornecedores WHERE idFornecedor = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute())
	{
	header('Location:fornecedor.php');
	}
  else
	{
	echo "Erro ao excluir";
	print_r($stmt->errorInfo());
	}

?>

