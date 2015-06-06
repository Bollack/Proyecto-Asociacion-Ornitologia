$(document).ready(function(){
	var $counter = 2;
	$('#agFoto').click(function(){
		$('#fotos').append('<div class="form-group"><label for="Foto'+$counter+'">Foto '+$counter+':</label><input type="text" id="Foto'+$counter+'" class="form-control" placeholder="URL//"></div>');
		$counter++;
	});
});