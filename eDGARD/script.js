$(document).ready(function(e){
	$("#dialogo").hide();
	$(".comentario hr").hide();
	$(".menuPrincipal a").click(function(e){
		e.preventDefault();
		var href=$(this).attr('href');
		$(".conteudo").load(href+" .conteudo");
	});
	$(".sobre").click(function(e){
		e.preventDefault();
		var href=$(this).attr('href');
		$(".conteudo").load(href+" .conteudo");
		$(".comentario").hide();
		$(".menuPrincipal").hide();
	});
	$(".links").click(function(e){
		e.preventDefault();
		var href=$(this).attr('href');
		$(".conteudo").load(href+" .conteudo");
		$(".comentario").hide();
		$(".menuPrincipal").hide();
	});
});

function dialogo() {
	$("#dialogo").dialog({
			modal:true,
			resizable:false,
			width:400,
			height:200,
		buttons: {
	"Confirma": function(){
	$(this).dialog("close");
	verifica();
		},
	Cancelar: function(){
		$(this).dialog("close");
		}
		}
	});
};

function verifica(){
	var teste1 = 0;
	var valida = 0;
	var erro1 = 0;
	var erro2 = 0;
	var teste2 = 0;
	var nome = document.querySelector("#nome").value;
	var email = document.querySelector("#email").value;
	erro1 = 0;
	erro2 = 0;
	for (var i=0; i<nome.length; i++){
		if(nome[i]== " "){
		teste1= 1;
		erro1 = 1;
		}
	}
	for (var i=0; i<email.length; i++){
		if(email[i]== "@"){
		valida= 1;
		}
	}
	if(teste1==1){
		var nome = document.querySelector("#nome").value.split(' ');
		var fnome = nome[0];
		var snome = nome[1];
		if(fnome.length < 3){
			teste2 = 1;
			erro1 = 1;	
		}
		if(snome.length < 4){
			erro1 = 1;
			teste2 = 1;	
		}
	}else{
			teste2 = 1;
			erro1 = 1;	
	 }
	if(valida==1){	

		var email = document.querySelector("#email").value.split('@');
		var fmail = email[0];
		var smail = email[1];
		if(fmail.length < 3){
			teste2 = 1;	
			erro2 = 1;
		}
		if(smail.length < 4){
			teste2 = 1;
			erro2 = 1;		
		}
	}else{
			teste2 = 1;	
			erro2 = 1;
	 }
	 if(teste2== 1){
		alert("Verificar os Campos Obrigatórios");	
		if(erro1 == 1){
			$("#hrnome").show();	
		}
	
		if(erro2 == 1){
			$("#hremail").show();	
		}	 
	}
}
