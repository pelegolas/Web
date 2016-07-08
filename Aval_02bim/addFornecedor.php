<!--Pedro Barbosa e Edgard Alexandre-->
<?php
	require_once 'init.php';
	include_once 'fornecedores.class.php';
	$dadosOK=true;
	//Recebe os Dados do Formulário
	
	$name = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
	$dataFundacao = isset($_POST['txtData']) ? $_POST['txtData'] : null;
	$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
	
	//Validar Email
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email Invalido";
	}
	
	//Novo objeto Fornecedores
	$fornecedores = new Fornecedores($name,$dataFundacao,$email);

	//insere dentro do banco
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
		echo "Erro no cadastro!";
		print_r($stmt->errorInfo());
	}
?>

