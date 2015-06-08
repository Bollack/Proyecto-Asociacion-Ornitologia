$(document).ready(function(){
	document.albumForm.cantFotos.value = 2;
	var $counter = 2;
	$('#agFoto').click(function(){
		$('#fotos').append('<div class="form-group"><label for="Foto'+$counter+'">Foto '+$counter+':</label><input type="text" id="Foto'+$counter+'" name ="Foto'+$counter+'" class="form-control" placeholder="URL//"></div>');
		$('#fotos').append('<div class="form-group"><label for="Desc'+$counter+'">Descripción de foto '+$counter+':</label><input type="text" id="Desc'+$counter+'" name="Desc'+$counter+'" class="form-control" placehalder=""></div>');
		$counter++;
		document.albumForm.cantFotos.value = $counter;
	});
});
