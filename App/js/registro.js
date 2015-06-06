$(document).ready(function(){
	var $counter = 2;
	$('#agTel').click(function(){
		$('#telefonos').append('<div class="form-group"><label for="Telefono'+$counter+'">Teléfono '+$counter+'</label><input type="text" id="Telefono'+$counter+'" class="form-control"></div>');
		$counter++;
	});
});