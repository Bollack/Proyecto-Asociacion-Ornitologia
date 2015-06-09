$(document).ready(function(){
	$('button').click(function(){
		window.location.href = "http://localhost/Proyecto-Asociacion-Ornitologia/App/perfil.php?id="+$(this).val()+"&return="+window.location;	
	});
});