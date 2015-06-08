$(document).ready(function(){
	if(nombre!="" && idUsuario!=""){
		$("#der-nav").prepend("<li><a href='perfil.php'>Mi perfil</a></li>");
	}else{
		$("#der-nav").prepend("<li><a href='ingresar.php'>Ingresar</a></li>");
	}
	var $counter = 2;
	var $cConter = 2;
	$('#agFoto').click(function(){
		$('#fotos').append('<div class="form-group"><label for="Foto'+$counter+'">Foto '+$counter+':</label><input type="text" id="Foto'+$counter+'" class="form-control" placeholder="URL//"></div>');
		$counter++;
	});
	$('#agColor').click(function(){
		$('#agColor').append('<div class="form-group"><label for="Color'+$cCounter+'">Color '+$cCounter+':</label><select class="form-control" id="Color'+$cCounter+'"></select></div>');
		$cCounter++;
	})
});