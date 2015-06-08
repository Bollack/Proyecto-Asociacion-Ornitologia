$(document).ready(function(){
	if(nombre!="" && idUsuario!=""){
		$("#der-nav").prepend("<li><a href='perfil.php'>Mi perfil</a></li>");
	}else{
		$("#der-nav").prepend("<li><a href='ingresar.php'>Ingresar</a></li>");
	}
});