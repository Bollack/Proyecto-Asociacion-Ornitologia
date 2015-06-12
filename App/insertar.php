<?php
	$tabla = $_GET["t"];
	$valor = $_GET["v"];
	$columna = $_GET["c"];
	$return = $_GET["r"];
	
	$username = "Administrador";
	$password = "Admin13";
	$hostname = "186.176.166.148:3306";
	$myDB = "hidden_bird";
	$dbhandle = mysqli_connect($hostname, $username, $password, $myDB);
	if(!$dbhandle){
		echo "Conexión fallida: " . mysqli_conect_error();
	}else{
		if(isset($_GET["ve"])){
			$valorExtra = "," . $_GET["ve"];
			$colExtra = "," . $_GET["ce"];
			$sql = "INSERT INTO ".$tabla." (".$columna.$colExtra.") VALUES ('".$valor."','".$valorExtra."')";
		}else{
			$valorExtra = "";
			$colExtra = "";
			$sql = "INSERT INTO ".$tabla." (".$columna.") VALUES ('".$valor."')";
		}
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