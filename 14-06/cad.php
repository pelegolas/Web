<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Envio de dador</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
			echo "<h1>Os dados informados são:</h1>";
			$nome = $_POST["txtNome"];
			$dtNasc = $_POST["txtData"];
			$diaNasc = substr("$dtNasc",0,2);
			$mesNasc = substr("$dtNasc",3,-5);
			$anoNasc = substr("$dtNasc",6);
			$arquivo = $_FILES["txtFoto"];
			$verificaData = true;			
			$camposOK= true;
//verifica foto
			if(($arquivo['error']!=0) || ($arquivo['size'] == 0)){
				echo "Erro no envio do arquivo <br>";
				$camposOK = false;
			}
			if($arquivo['size'] > 100000){
				echo "Tamanho maior que o permitido";
				$camposOK= false;
			}
			if(($arquivo['type'] != "image/gif")&&
				($arquivo['type'] != "image/png")&&
				($arquivo['type'] != "image/jpg")&&
				($arquivo['type'] != "image/jpeg")&&
				($arquivo['type'] != "image/bmp")){
					
				echo "Tipo de arquivo não permitido";
				$camposOK= false;
			}
			$file_src = '../../tmp/'.$_FILES['txtFoto']['name'];
			if(!move_uploaded_file($_FILES['txtFoto']['tmp_name'],$file_src)){
				echo"Erro ao mover o arquivo<br>";
				$camposOK= false;
			}
//verifica data
			if($dtNasc == ""){
				$verificaData = false;
			}
			if(($mesNasc < 1) || ($mesNasc > 12)){
				$verificaData = false;
			}else if(($diaNasc < 1) || ($diaNasc > 31)){
				$verificaData = false;
			}else if(($mesNasc == 4) || ($mesNasc == 6) || ($mesNasc == 9) || ($mesNasc == 11) && ($diaNasc == 31)){
				$verificaData = false;
			}else if($mesNasc == 2){	
				$isleap = (($anoNasc % 4 == 0) && ($anoNasc % 100 != 0) || ($anoNasc % 400 == 0));
			if(($diaNasc > 29) || ($diaNasc == 29) && ($isleap == false)){
				$verificaData = false;
			}
		 	}	
			if($verificaData == false){
				echo "<b>Data Inválida</b>";
				$camposOK= false;
			}
			if ($camposOK){
				echo "<table border='0' cellpadding='5'>";
				echo "<tr><td><img height='120' width='120' src='$file_src'></td></tr>";
				echo "<tr><td>NOME: </td><td><b>$nome</b></td></tr>";
				echo "<tr><td>DATA NASC: </td><td><b>$dtNasc</b></td></tr>";
			}
		?>
	</body>
</html>
