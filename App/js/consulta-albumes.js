$(document).ready(function(){
	$('button').click(function(){
		window.location.href = "../App/album.php?album="+$(this).val()+"&return="+window.location;	
	});
});