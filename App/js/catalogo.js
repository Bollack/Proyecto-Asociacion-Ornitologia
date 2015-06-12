$(document).ready(function(){
	$('#agregar').click(function(){
		console.log(nombre);
		if($("#requerimiento").val()==""){
			window.location.href = "http://localhost/Proyecto-Asociacion-Ornitologia/App/insertar.php?t="+nombre+"&c="+col+"&v="+$("#insertar").val()+"&r="+window.location;
		}else{
			window.location.href = "http://localhost/Proyecto-Asociacion-Ornitologia/App/insertar.php?t="+nombre+"&c="+col+"&ce="+colExtra+"&v="+$("#insertar").val()+"&ve="+$("#requerimiento").val()+"&r="+window.location;	
		}
	});
	$('#modificar').click(function(){
		window.location.href = "http://localhost/Proyecto-Asociacion-Ornitologia/App/modificar.php?t="+nombre+"&idT="+pk+"&c="+col+"&idC="+$("#modificado").val()+"&v="+$("#modificacion").val()+"&r="+window.location;
	});
});