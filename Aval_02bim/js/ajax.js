$(document).ready(function(e){
	$(".menu a").click(function(e){
		e.preventDefault();
		var href=$(this).attr("href");
		$(".conteudo").load(href + " .conteudo");
	});
});

