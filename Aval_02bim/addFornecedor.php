<?php
	require_once 'init.php';
	include_once 'fornecedores.class.php';
	$dadosOK=true;
	//pega os dados do formulário
	
	$name = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
	$dataFundacao = isset($_POST['txtData']) ? $_POST['txtData'] : null;
	$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
	
	//validação email
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email Invalido";
	}
	
	//instancia objeto fornecedores
	$fornecedores = new Fornecedores($name,$dataFundacao,$email);

	// insere no BD
	$PDO = db_connect();
	$sql = "INSERT INTO fornecedores(nomeFornecedor, dataFundacao, email ) VALUES (:name, :dataFundacao,:email)";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':name', $fornecedores->getnomeFornecedor());
	$stmt->bindParam(':dataFundacao', $fornecedores->getdataFundacao());
	$stmt->bindParam(':email', $fornecedores->getemail());

	if($stmt->execute())
	{
		header('Location: fornecedor.php');
	}
	else
	{
		echo "Erro ao cadastrar!!";
		print_r($stmt->errorInfo());
	}
?>

