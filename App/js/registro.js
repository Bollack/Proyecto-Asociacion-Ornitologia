$(document).ready(function(){
	if(nombre!="" && idUsuario!=""){
		$("#der-nav").prepend("<li><a href='perfil.php'>Mi perfil</a></li>");
	}else{
		$("#der-nav").prepend("<li><a href='ingresar.php'>Ingresar</a></li>");
	}
	var $tCounter = 2;
	var $cConter = 2;
	$('#agTel').click(function(){
		$('#telefonos').append('<div class="form-group"><label for="Telefono'+$tCounter+'">Teléfono '+$tCounter+'</label><input type="text" id="Telefono'+$tCounter+'" class="form-control" placeholder="Telefono'+$tCounter+'"></div>');
		$tCounter++;
	});
	$('#agCor').click(function(){
		$('#correos').append('<div class="form-group"><label for="Correo'+$cConter+'">Correo '+$cConter+'</label><input type="text" id="Correo'+$cConter+'" class="form-control" placeholder="Correo'+$cConter+'"></div>');
		$cConter++;
	});
});
function declararVariable(pNombre, pID){
	nombre = pNombre;
	idUsuario = pID;
}