
<?php
$username = "Administrador";
$password = "Admin13";
$hostname = "186.176.166.148:3306"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";
?>