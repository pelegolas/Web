//clientes
//ok
<?php
	require_once 'init.php';
	include_once 'cliente.class.php';
	
	//pega os dados do formulário
	
	$name = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
	$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
	$dataCadastro = isset($_POST['txtData']) ? $_POST['txtData'] : null;

	//validação simples se campos estão vazios
	if(empty($name) || empty($dataCadastro) || empty($email))
	{
		echo "Campos devem ser preenchidos!!";
		exit;
	}
	
	//instancia objeto cliente
	$cliente = new Cliente($name,$dataCadastro,$email);

	// insere no BD
	$PDO = db_connect();
	$sql = "INSERT INTO clientes(nomeCliente, dataCadastro, email) VALUES (:name, :dataCadastro, :email)";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':name', $cliente->getNome());
	$stmt->bindParam(':dataCadastro', $cliente->getDataCadastro());
	$stmt->bindParam(':email', $cliente->getEmail());

	if($stmt->execute())
	{
		header('Location: index.php');
	}
	else
	{
		echo "Erro ao cadastrar!!";
		print_r($stmt->errorInfo());
	}
?>
