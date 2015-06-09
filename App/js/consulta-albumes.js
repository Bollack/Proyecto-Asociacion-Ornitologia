$(document).ready(function(){
	$('button').click(function(){
		window.location.href = "http://localhost/Proyecto-Asociacion-Ornitologia/App/album.php?album="+$(this).val()+"&return="+window.location;	
	});
});