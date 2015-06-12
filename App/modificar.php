<?php
	$tabla = $_GET["t"];
	$valor = $_GET["v"];
	$columna = $_GET["c"];
	$idColumna = $_GET["idC"];
	$idTabla = $_GET["idT"];
	$return = $_GET["r"];
	
	$username = "Administrador";
	$password = "Admin13";
	$hostname = "186.176.166.148:3306";
	$myDB = "hidden_bird";
	$dbhandle = mysqli_connect($hostname, $username, $password, $myDB);
	if(!$dbhandle){
		echo "Conexión fallida: " . mysqli_conect_error();
	}else{
		$sql = "UPDATE ".$tabla." SET ".$columna."='".$valor."' WHERE ".$idTabla."=".$idColumna;
		if (mysqli_query($dbhandle, $sql)) {
			mysqli_close($dbhandle);
		    echo "<script type=\"text/javascript\">document.location.href='".$return."';</script>";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($dbhandle);
			mysqli_close($dbhandle);		    
		}

	}
?>
<html>
<head>
</head>
<body>
</body>
</html>