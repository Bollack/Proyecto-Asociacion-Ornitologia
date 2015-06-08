$(document).ready(function(){
	document.registro.cantTelefonos.value = 2;
	document.registro.cantCorreos.value = 2;
	var $tCounter = 2;
	var $cCounter = 2;
	$('#agTel').click(function(){
		$('#telefonos').append('<div class="form-group"><label name="Telefono'+$tCounter+'" for="Telefono'+$tCounter+'">Teléfono '+$tCounter+'</label><input type="text" id="Telefono'+$tCounter+'" class="form-control" placeholder="Telefono'+$tCounter+'"></div>');
		document.registro.cantTelefonos.value = $tCounter;
		$tCounter++;
	});
	$('#agCor').click(function(){
		$('#correos').append('<div class="form-group"><label name="Correo'+$cCounter+'" for="Correo'+$cCounter+'">Correo '+$cCounter+'</label><input type="text" id="Correo'+$cCounter+'" class="form-control" placeholder="Correo'+$cCounter+'"></div>');
		document.registro.cantCorreos.value = $cCounter;
		$cCounter++;
	});
});