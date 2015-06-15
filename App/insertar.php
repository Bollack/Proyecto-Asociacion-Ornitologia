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
     	echo "Error de conexión a la base de datos";
		echo "Conexión fallida: " . mysqli_conect_error();
	}else{
		if(isset($_GET["ve"])){
			$valorExtra =  $_GET["ve"];
			$colExtra = "," . $_GET["ce"];
			//$valorExtra = $_GET["ve"];
			//$colExtra =  $_GET["ce"];
			//$sql = "INSERT INTO ".$tabla." (".$columna.",".$colExtra.") VALUES (".$valor.",".$valorExtra.")";
			$sql = "INSERT INTO ".$tabla." (".$columna.$colExtra.") VALUES ('".$valor."','".$valorExtra."')";
			echo $sql;
		}else{
			$valorExtra = "";
			$colExtra = "";
			$sql = "INSERT INTO ".$tabla." (".$columna.") VALUES ('".$valor."')";
			echo $sql;
		}
		if (mysqli_query($dbhandle, $sql)) {
			mysqli_close($dbhandle);
		    echo "<script type=\"text/javascript\">";
			echo "setTimeout(function(){swal(\"Dato insertado\", \"Se ha insertado el dato correctamente\", \"success\");";
		    echo "},1000);</script>";
			sleep(1);
			echo "<script type=\"text/javascript\">document.location.href='".$return."';</script>";
		} else {
			$error = "Conexión fallida: " . mysqli_connect_error();
			echo "Query cannot be made";
			echo $error;
		    echo "<script type=\"text/javascript\">";
			echo "setTimeout(function(){swal(\"ERROR, PANIC!\", \"El dato no se ha podido insertar por carácteres inválidos, ya existe o por error de conexión.\"'".mysqli_connect_error()."' \"error\");";
		    echo "},1000);;</script>";
			sleep(1);
			mysqli_close($dbhandle);
			echo "<script type=\"text/javascript\">document.location.href='".$return."';</script>";		    
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