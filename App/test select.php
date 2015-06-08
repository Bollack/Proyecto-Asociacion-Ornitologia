<?php
$username = "Administrador";
$password = "Admin13";
$hostname = "localhost";
$myDB = "hidden_bird";
$dbhandle = mysqli_connect($hostname, $username, $password, $myDB); 
if(!$dbhandle){
  echo "Conexión fallida: " . mysqli_conect_error();
}else{
	$sql = "SELECT * FROM persona";
	$result = mysqli_query($dbhandle, $sql);

	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
	        echo "id: " . $row["idPersona"]. " - Name: " . $row["Nombre"]. " " . $row["Apellido"]. "<br>";
	    }
	} else {
	    echo "0 results";
	}
}
?>