$(document).ready(function(){
	$('button').click(function(){
		window.location.href = "../App/perfil.php?id="+$(this).val()+"&return="+window.location;	
	});
});