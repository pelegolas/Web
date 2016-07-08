<?php
	require 'init.php';
	//pega o ID da URL
	$id = isset($_GET ['id']) ? (int) $_GET['id'] : null;
	//valida o ID
	if(empty($id))
	{
 echo "ID para alteração não definido";
 exit;
 }
 // busca os dados do usuário a ser editado
 $PDO = db_connect();
 $sql = "SELECT nomeCliente, dataCadastro, email FROM clientes WHERE idCliente = :id";
 $stmt = $PDO->prepare($sql);
 $stmt->bindParam(':id', $id, PDO::PARAM_INT);
 $stmt->execute() ;
 $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
 /* se o método fetch () não retornar um array
 significa que o ID não corresponde a um usuário válido */
 if(!is_array($cliente))
 {
    echo "Nenhum cliente encontrado";
    exit;
 }
 $dataOK = dateConvert($cliente['dataCadastro']);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Dark Golden Orange</title>
		<meta charset="utf-8">
		<link type="text/css" href="css/jquery-ui.css" rel="stylesheet"/>
		<link type="text/css" href="css/layout.css" rel="stylesheet"/>
		<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.js"></script>
		<script type="text/javascript" src="js/jquery.maskedinput.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="js/datepicker-pt-BR.js"></script>
	</head>
	<body>
		<div class ="tudo">
			<div class="menuTopo">
				<nav>
					<ul>
						<li><a href="index.html"> Home </a></li>
						<li><a href="cliente.php"> Clientes </a></li>
						<li><a href="fornecedor.php"> Fornecedores </a></li>
						<li><a href="sobre.html"> Sobre </a></li>
						<li class = "nomes">Autores: Edgard Alexandre e Pedro Barbosa</li>
					</ul>
				</nav>
			</div>
			<div class="topo">
				<div class="imgTopo">
				<img src="img/logo.png" alt="Logo DarkGoldenOrange">
			</div>
		</div>
		<div class="principal" >
			<div class ="container">
	<div class="conteudo" id="conteudo">
    <form method="post" name="formAltera" action="editCliente.php" enctype="multipart/form-data" onSubmit="return verifica()">
        <h1>Edição de dados</h1>
        <table width="100%">
            <tr>
                <th width="18%">Nome do Cliente</th>
                <td width="82%"><input type="text" name="txtNome" id="nome" value="<?php echo $cliente['nomeCliente']?>"></td>
            </tr>
            <tr>
                <th>Data do Cadastro</th>
                <td><input type="text" name="txtData" id="data" class="cC" readonly value="<?php echo $dataOK ?>"></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="email" name="txtEmail" id="email" value="<?php echo $cliente['email']?>"></td>
            </tr>
            <tr>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <td><input type="submit" name="btnEnviar" value="Alterar"></td>
                <td><input type="reset" name="btnLimpar" value="Limpar"></td>
            </tr>
        </table>
    </form>
	</div>
<div class="rodape">
	<p id= "rod1">Copyright © 2016 Dark Golden Orange Corporation</p>
			<p id= "rod2">All Rights Reserved - This product is protected by copyright and distributed under
				licenses restricting copying, distribution, and decompilation.</p>
	</div>
</body>
</html>
