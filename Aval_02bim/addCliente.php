<?php
	require_once 'init.php';
	include_once 'clientes.class.php';
	$dadosOK=true;
	//pega os dados do formulário
	
	$name = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
	$dataCadastro = isset($_POST['txtData']) ? $_POST['txtData'] : null;
	$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
	
	//validação email
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email Invalido<br>";
	}
	
	//instancia objeto clientes
	$clientes = new Clientes($name,$dataCadastro,$email);

	// insere no BD
	$PDO = db_connect();
	$sql = "INSERT INTO clientes(nomeCliente, dataCadastro, email ) VALUES (:name, :dataCadastro,:email)";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':name', $clientes->getnomeCliente());
	$stmt->bindParam(':dataCadastro', $clientes->getdataCadastro());
	$stmt->bindParam(':email', $clientes->getemail());

	if($stmt->execute())
	{
		header('Location: cliente.php');
	}
	else
	{
		echo "Erro ao cadastrar!!";
		print_r($stmt->errorInfo());
	}
?>
