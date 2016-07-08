$(document).ready(function(e){
	$(".menuTopo a").click(function(e){
		e.preventDefault();
		var href=$(this).attr('href');
		$(".conteudo").load(href+" .conteudo");
	});

});
	function chama(botao) {
	var href = $(botao).attr('href');
	$(".conteudo").load(href + " .conteudo");
	
}
$(function(){
    $("body").on("click", ".cC", function(){
    if (!$(this).hasClass("hasDatepicker"))
    {
	$(this).datepicker({
		minDate: new Date(2000, 1 - 1, 1), 
		maxDate: 0,  	
		showOn: "button",
		buttonImage: "img/calendario.jpg",
		buttonImageOnly: true		
	});				
   }
  	});
});
$(function(){
    $("body").on("click", ".cF", function(){
    if (!$(this).hasClass("hasDatepicker"))
    {
	$(this).datepicker({
		minDate: new Date(1950, 1 - 1, 1), 
		maxDate: 0,  	
		showOn: "button",
		buttonImage: "img/calendario.jpg",
		buttonImageOnly: true		
	});				
   }
  	});
});
function verifica() {
	var nome = document.querySelector("#nome").value;
	var email = document.querySelector("#email").value;
	
	if((nome=="")||(email=="")){
		alert("Existem campos vazios");
		return false;
	}
}
