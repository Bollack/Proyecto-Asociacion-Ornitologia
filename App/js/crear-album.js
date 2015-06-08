$(document).ready(function(){
	document.album.cantFotos.value = 2;
	var $counter = 2;
	$('#agFoto').click(function(){
		$('#fotos').append('<div class="form-group"><label for="Foto'+$counter+'">Foto '+$counter+':</label><input type="text" id="Foto'+$counter+'" name ="Foto'+$counter+'" class="form-control" placeholder="URL//"></div>');
		document.album.cantFotos.value = $counter;
		$counter++;
	});
});