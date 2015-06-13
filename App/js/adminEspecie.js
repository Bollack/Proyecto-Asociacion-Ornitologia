$(document).ready(function(){
	$('#addEspecie').click(function(){
		console.log(nombre);

			window.location.href = "../App/especieAddAlter.php?t="+"&nom_cien"+$("#nombreCientifico_insert").val()+"&id_Gen="+$("#genero_insert")val()+"&id_For_Pico="+$("#formaPico_insert").val()+"&id_Tipo_Hue="+$("#formaPico_insert").val()+"&id_Tipo_Inc="+$("#tipoIncubacion_insert").val()+"&id_Cant_Hue="+$("#cantidadHuevos_insert").val()+"&id_Tipo_Ni="+$("#tipoNido_insert").val()+"&id_Tiem_Inc="+$("#tiempoIncubacion_insert").val()+"&id_Size="+$("#tamano_insert").val()+"&c="+"&id_Zon_Vi="+$("#ZonaVida_insert").val()+"&isModify=+"+"0"+window.location;	
			//window.location.href = "../App/especieAddAlter.php?t="+"&nom_cien"+$("#nombreCientifico_insert").val()+"&id_Gen="+$("#genero_insert").options["#genero_insert".selectedIndex].value+"&id_For_Pico="+$("#formaPico_insert").options["#formaPico_insert".selectedIndex].value+"&id_Tipo_Hue="+$("#formaPico_insert").options["#formaPico_insert".selectedIndex].value+$("#").options["#".selectedIndex].value+"&id_Tipo_Inc="+$("#tipoIncubacion_insert").options["#tipoIncubacion_insert".selectedIndex].value+"&id_Cant_Hue="+$("#cantidadHuevos_insert").options["#cantidadHuevos_insert".selectedIndex].value+"&id_Tipo_Ni="+$("#tipoNido_insert").options["#tipoNido_insert".selectedIndex].value+"&id_Tiem_Inc="+$("#tiempoIncubacion_insert").options["#tiempoIncubacion_insert".selectedIndex].value+"&id_Size="+$("#tamano_insert").options["#tamano_insert".selectedIndex].value+"&c="+"&id_Zon_Vi="+$("#ZonaVida_insert").options["#ZonaVida_insert".selectedIndex].value+"&isModify=+"+"0"+window.location;	
	});
	$('#modifyEspecie').click(function(){
		window.location.href = "../App/especieAddAlter.php?t="+"&id_Main="+idEspecie+"&nom_cien"+$("#nombreCientifico_insert").val()+"&id_Gen="+$("#genero_insert")val()+"&id_For_Pico="+$("#formaPico_insert").val()+"&id_Tipo_Hue="+$("#formaPico_insert").val()+"&id_Tipo_Inc="+$("#tipoIncubacion_insert").val()+"&id_Cant_Hue="+$("#cantidadHuevos_insert").val()+"&id_Tipo_Ni="+$("#tipoNido_insert").val()+"&id_Tiem_Inc="+$("#tiempoIncubacion_insert").val()+"&id_Size="+$("#tamano_insert").val()+"&c="+"&id_Zon_Vi="+$("#ZonaVida_insert").val()+"&isModify=+"+"1"+window.location;
	});
});
 e.options[e.selectedIndex].value
			$idEspecie =  $_GET["id_Main"];
			$pNombreCientifico = "," . $_GET["nom_cien"];
			$pGenero = "," . $_GET["id_Gen"];
			$pFormaPico = "," . $_GET["id_For_Pico"];
			$pTipoHuevos = "," . $_GET["id_Tipo_Hue"];
			$pTipoIncubacion= "," . $_GET["id_Tipo_Inc"];
			$pCantHuevos = "," . $_GET["id_Cant_Hue"];
			$pTipoNido = "," . $_GET["id_Tipo_Ni"];
			$pTiempoIncubacion = "," . $_GET["id_Tiem_Inc"];
			$pTamano = "," . $_GET["id_Size"];
			$pZonaVida = "," . $_GET["id_Zon_Vi"];