<?php
	//$tabla = $_GET["t"];
	//$valor = $_GET["v"];
	//$columna = $_GET["c"];
	$return = $_GET["r"];
	
	$username = "Administrador";
	$password = "Admin13";
	$hostname = "186.176.166.148:3306";
	$myDB = "hidden_bird";
	$dbhandle = mysqli_connect($hostname, $username, $password, $myDB);
	if(!$dbhandle){
		echo "Conexión fallida: " . mysqli_conect_error();
	}else{
		if($_GET["isModify"]=="1"){
			echo "Modificando especie...";
			$idEspecie =  $_GET["id_Main"];
			$pNombreCientifico = ",'" . $_GET["nom_cien"];
			$pGenero = "'," . $_GET["id_Gen"];
			$pFormaPico = "," . $_GET["id_For_Pico"];
			$pTipoHuevos = "," . $_GET["id_Tipo_Hue"];
			$pTipoIncubacion= "," . $_GET["id_Tipo_Inc"];
			$pCantHuevos = "," . $_GET["id_Cant_Hue"];
			$pTipoNido = "," . $_GET["id_Tipo_Ni"];
			$pTiempoIncubacion = "," . $_GET["id_Tiem_Inc"];
			$pTamano = "," . $_GET["id_Size"];
			$pZonaVida = "," . $_GET["id_Zon_Vi"];
			$sql = "CALL  modifyEspecie(".$idEspecie.$pNombreCientifico.$pGenero.$pFormaPico.$pTipoHuevos.$pTipoIncubacion.$pCantHuevos.$pTipoNido.$pTiempoIncubacion.$pTamano.$pZonaVida." );";
			echo $sql;
			if (mysqli_query($dbhandle, $sql)) {
				mysqli_close($dbhandle);
			    echo "<script type=\"text/javascript\">";
				echo "setTimeout(function(){swal(\"Especie modificada\", \"Se ha modificado la especie correctamente\", \"success\");";
			    echo "},1000);</script>";
				sleep(2);
				echo "<script type=\"text/javascript\">document.location.href='".$return."';</script>";
			} else {
			    echo "<script type=\"text/javascript\">";
				echo "setTimeout(function(){swal(\"ERROR, PANIC!\", \"La especie no se ha podido modificar por carácteres inválidos, ya existe o por error de conexión.\", \"error\");";
			    echo "},1000);</script>";
				mysqli_close($dbhandle);
				sleep(2);
				//echo "<script type=\"text/javascript\">document.location.href='".$return."';</script>";		    
			}




		}else{ //Aquí sucede el backend al querer insertar una especie
			echo "Insertando especie...";
			echo $_GET["isModify"];
			$pNombreCientifico = $_GET["nom_cien"];
			$pGenero = "'," . $_GET["id_Gen"];
			$pFormaPico = "," . $_GET["id_For_Pico"];
			$pTipoHuevos = "," . $_GET["id_Tipo_Hue"];
			$pTipoIncubacion= "," . $_GET["id_Tipo_Inc"];
			$pCantHuevos = "," . $_GET["id_Cant_Hue"];
			$pTipoNido = "," . $_GET["id_Tipo_Ni"];
			$pTiempoIncubacion = "," . $_GET["id_Tiem_Inc"];
			$pTamano = "," . $_GET["id_Size"];
			$pZonaVida = "," . $_GET["id_Zon_Vi"];
			$sql1 = "CALL  insert_Especie('".$pNombreCientifico.$pGenero.$pFormaPico.$pTipoHuevos.$pTipoIncubacion.$pCantHuevos.$pTipoNido.$pTiempoIncubacion.$pTamano.$pZonaVida." );";
			echo $sql1;
			if (mysqli_query($dbhandle, $sql1)) {
				mysqli_close($dbhandle);
			    echo "<script type=\"text/javascript\">";
				echo "setTimeout(function(){swal(\"Especie insertada\", \"Se ha insertado la especie en la base de datos correctamente\", \"success\");";
			    echo "},1000);</script>";
				sleep(4);
				echo "<script type=\"text/javascript\">document.location.href='".$return."';</script>";
			} else {
			    echo "<script type=\"text/javascript\">";
				echo "setTimeout(function(){swal(\"ERROR, PANIC!\", \"El dato no se ha podido insertar por carácteres inválidos, ya existe o por error de conexión.\", \"error\");";
			    echo "},1000);</script>";
				mysqli_close($dbhandle);
				sleep(4);
				//echo "<script type=\"text/javascript\">document.location.href='".$return."';</script>";		    
			}

		}
		

	}
?>
<html>
<head>
	  <script src="sweetalert-master/dist/sweetalert.min.js"></script>
     <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
</head>
<body>
</body>
</html>