<!--Pedro Barbosa e Edgard Alexandre-->
<?php
	require_once 'init.php';
	include_once 'clientes.class.php';
	$dadosOK=true;
	//Recebe Dados do Formulário
	
	$name = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
	$dataCadastro = isset($_POST['txtData']) ? $_POST['txtData'] : null;
	$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
	
	//validar email
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email Invalido<br>";
	}
	
	//novo objeto cliente
	$clientes = new Clientes($name,$dataCadastro,$email);

	//Colocar dentro do banco
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
		echo "Erro de Cadastro!";
		print_r($stmt->errorInfo());
	}
?>
