$(document).ready( function(e){
	$(".menuPrincipal a ").click(function(e){
		e.preventDefault();
		var href = $(this).attr(’href’);
		$(".conteudo").load(href + ".conteudo");
	});
});
