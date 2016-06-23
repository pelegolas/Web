<?php
	require_once 'init.php';
	// abre a conexão
	$PDO=db_connect();
	/* SQL para contar o total de registros */
	$sql_count = "SELECT COUNT(*) AS total FROM aluno ORDER BY nome ASC";
	// SQL para selecionar os registros
	$sql = " SELECT idaluno, nome, dataNasc, foto FROM aluno ORDER BY nome ASC";
	// conta o total de registros
	$stmt_count=$PDO->prepare($sql_count);
	$stmt_count->execute();
	$total=$stmt_count->fetchColumn();
	// seleciona os registros
	$stmt=$PDO->prepare($sql);
	$stmt->execute();
?>
<!--Edgard Alexandre e Pedro Barbosa-->

<!DOCTYPE html>
<html lang="pt-br">
    <head>
    	<meta charset="UTF-8">
    	<title>QUE NÃO VAI DAR O QUE???</title>
		<script type= "text/javascript" src = "jquery-2.1.1.min.js"></script>		        
		<script type="text/javascript" src="jquery-ui.js"></script>
    	<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="ajax.js"></script>
    </head>
    <body>
		<div class="topo">
			<ul class = "menu">
				<li><a href="index.html">Home</a></li>
				<li><a href="form-add.php">Clientes</a></li>
				<li><a href="#">Fornecedores</a></a></li>
				<li><a href="sobre.html">Sobre</a></li>
			</ul>
		</div>
		<div class="logo">
			<img src="https://fbcdn-sphotos-a-a.akamaihd.net/hphotos-ak-xfa1/v/t34.0-12/13487491_1222681597772587_1945939951_n.png?oh=6ec425ee14e7f548177b59a9c0894deb&oe=57666A84&__gda__=1466311436_869750bbf520fa54c02ec9c5611ff714" class= "imagelogo" width= "100">
		</div>
		<div class="conteudo">
			<h3 id = "home">Conheça os objetivos e funcionalidades do sistema</h3>
			<h3 id = "home1">Conheça os objetivos e funcionalidades do sistema</h3>
			<p id = "home2">A prática cotidiana prova que a complexidade dos estudos efetuados nos obriga à análise das formas de ação. É claro que a execução dos pontos do programa oferece uma interessante oportunidade para verificação do remanejamento dos quadros funcionais. Todavia, o fenômeno da Internet exige a precisão e a definição das diversas correntes de pensamento.<br> <br> 

          Gostaria de enfatizar que a adoção de políticas descentralizadoras representa uma abertura para a melhoria das posturas dos órgãos dirigentes com relação às suas atribuições. Podemos já vislumbrar o modo pelo qual o novo modelo estrutural aqui preconizado acarreta um processo de reformulação e modernização dos índices pretendidos. O empenho em analisar a estrutura atual da organização cumpre um papel essencial na formulação dos métodos utilizados na avaliação de resultados. É importante questionar o quanto o entendimento das metas propostas facilita a criação dos paradigmas corporativos. <br> <br> 

          As experiências acumuladas demonstram que a consolidação das estruturas pode nos levar a considerar a reestruturação das diretrizes de desenvolvimento para o futuro. Acima de tudo, é fundamental ressaltar que o desenvolvimento contínuo de distintas formas de atuação afeta positivamente a correta previsão do processo de comunicação como um todo. Ainda assim, existem dúvidas a respeito de como o início da atividade geral de formação de atitudes promove a alavancagem do sistema de participação geral. Não obstante, a contínua expansão de nossa atividade auxilia a preparação e a composição do retorno esperado a longo prazo. 

        <br> <br>   Por outro lado, a necessidade de renovação processual maximiza as possibilidades por conta dos relacionamentos verticais entre as hierarquias. A nível organizacional, a constante divulgação das informações causa impacto indireto na reavaliação das direções preferenciais no sentido do progresso. Pensando mais a longo prazo, a hegemonia do ambiente político talvez venha a ressaltar a relatividade das novas proposições. 

       <br> <br>    Percebemos, cada vez mais, que a expansão dos mercados mundiais ainda não demonstrou convincentemente que vai participar na mudança dos modos de operação convencionais. No entanto, não podemos esquecer que o aumento do diálogo entre os diferentes setores produtivos possibilita uma melhor visão global dos níveis de motivação departamental. O que temos que ter sempre em mente é que o surgimento do comércio virtual desafia a capacidade de equalização da gestão inovadora da qual fazemos parte. Todas estas questões, devidamente ponderadas, levantam dúvidas sobre se a revolução dos costumes agrega valor ao estabelecimento de todos os recursos funcionais envolvidos.</p> 		
		</div>
		<div class= "rodape">
			<p id= "rod1">Copyright © 2016 Dark Golden Orange Corporation</p>
			<p id= "rod2">All Rights Reserved - This product is protected by copyright and distributed under
				licenses restricting copying, distribution, and decompilation.</p>
		</div>
    </body>
</html>
