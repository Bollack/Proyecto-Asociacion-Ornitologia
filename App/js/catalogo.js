$(document).ready(function(){
	$('#agregar').click(function(){
		if($("#requerimiento").val()==""){
			window.location.href = "http://localhost/Proyecto-Asociacion-Ornitologia/App/insertar.php?t="+$("#nombre").val()+"&c="+$("#columna").val()+"&v="+$("#Insert").val()+"&r="+window.location;
		}else{
			window.location.href = "http://localhost/Proyecto-Asociacion-Ornitologia/App/insertar.php?t="+$("#nombre").val()+"&c="+$("#columna").val()+"&ce="+$("#columnaExtra").val()+"&v="+$("#Insert").val()+"&ve="+$("#requerimiento").val()+"&r="+window.location;	
		}
	});
	$('#modificar').click(function(){
		window.location.href = "http://localhost/Proyecto-Asociacion-Ornitologia/App/modificar.php?t="+$("#nombre").val()+"&idT="+$("#idTabla").val()+"&c="+$("#columna").val()+"&idC="+$("#cantidad").val()+"&v="+$("#mod").val()+"&r="+window.location;
	});
});