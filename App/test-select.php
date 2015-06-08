<?php
$username = "Administrador";
$password = "Admin13";
$hostname = "localhost";
$dbname = "hidden_bird";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
	$user = "aoeu";
	$sql = "SELECT idPersona FROM persona WHERE Username = '".$user."'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    $row = mysqli_fetch_assoc($result); 
	    $id = $row["idPersona"];
	    echo $id;
	    
	} else {
	    echo "0 results";
	}
}
?>