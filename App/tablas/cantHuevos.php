<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/perfil.css" rel="stylesheet">
  </head>
  <body>

  	<nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="crear-album.php">Hidden Bird</a>
        </div>
        
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="nav-derecha" class="nav navbar-nav">
            <li><a href="crear-album.php">Subir album</a></li>
            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Consultas<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="consulta-albumes.php">Consulta de albumes</a></li>
                <li><a href="consulta-usuarios.php">Consulta de usuarios</a></li>
              </ul>
            </li>
            <li><a href="estadisticas.php">Estadísticas</a></li>
            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tablas<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="tablas/cantHuevos.php">Cantidad huevos</a></li>
                <li><a href="tablas/color.php">Color</a></li>
                <li><a href="tablas/correoAdmin.php">Correo Admin</a></li>
                <li><a href="tablas/dataLog.php">Data Log</a></li>
                <li><a href="tablas/especie.php">Especie</a></li>
                <li><a href="tablas/familia.php">Familia</a></li>
                <li><a href="tablas/formaPico.php">Forma pico</a></li>
                <li><a href="tablas/genero.php">Genero</a></li>
                <li><a href="tablas/nombreComun.php">Nombre común</a></li>
                <li><a href="tablas/nombreIngles.php">Nombre inglés</a></li>
                <li><a href="tablas/orden.php">Orden</a></li>
                <li><a href="tablas/suborden.php">Suborden</a></li>
                <li><a href="tablas/tamano.php">Tamaño</a></li>
                <li><a href="tablas/tiempoIncubacion.php">Tiempo incubación</a></li>
                <li><a href="tablas/tipoHuevos.php">Tipo Huevos</a></li>
                <li><a href="tablas/tipoIncubacion.php">Tipo incubación</a></li>
                <li><a href="tablas/tipoNido.php">Tipo nido</a></li>
                <li><a href="tablas/zonaVida.php">Zona de vida</a></li>
              </ul>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right" id="der-nav">
            <li><a href="perfil.php">Mi perfil</a></li>
            <li><a href="ingresar.php">Ingresar</a></li>
            <li><a href="registro.php">Registrarse</a></li>
            <li><a href="log-out.php">Log Out</a></li>
          </ul>
        </div>
      </div>
    </nav>
    
    <div class="container" id="container" style="width:600px; argin:auto;">
      <form id="form" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h1 class="text-center">¿Que tabla catalogo desea ver?</h1>
        <div class="form-group">
          <label for="Tabla">Tabla:</label>
          <select class="form-control" id="Tabla" name="Tabla">
            <option value="cantidad_huevos">Cantidad de huevos</option>
            <option value="canton">Cantón</option>
            <option value="clase">Clase</option>
            <option value="color">Color</option>
            <option value="correo">Correo</option>
            <option value="correo_admin">Correo JOB</option>
            <option value="data_log">Data Log</option>
            <option value="especie">Especie</option>
            <option value="familia">Familia</option>
            <option value="forma_pico">Forma pico</option>
            <option value="foto">Foto</option>
            <option value="genero">Genero</option>
            <option value="nombre_comun">Nombre común</option>
            <option value="nombre_ingles_ave">Nombre ingles</option>
            <option value="orden">Orden</option>
            <option value="persona">Persona</option>
            <option value="provincia">Provincia</option>
            <option value="suborden">Suborden</option>
            <option value="tamano">Tamaño</option>
            <option value="telefono">Teléfono</option>
            <option value="tiempo_incubacion">Tiempo de incubación</option>
            <option value="tipo_huevos">Tipo de huevos</option>
            <option value="tipo_incubacion">Tipo de incubación</option>
            <option value="tipo_nido">Tipo de nido</option>
            <option value="tipo_usuario">Tipo de Usuario</option>
            <option value="zonavida">Zona de vida</option>
          </select>
        </div>
      </form>
    </div>
  	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <?php
  	$username = "Usuario";
      $password = "user123E";
      $hostname = "186.176.166.148:3306";
      $myDB = "hidden_bird";
      $dbhandle = mysqli_connect($hostname, $username, $password, $myDB);
      if(!$dbhandle){
        echo "Conexión fallida: " . mysqli_conect_error();
      }else{
      	$sql = "SELECT * FROM cantidad_huevos";
        $sqlresult = mysqli_query($dbhandle, $sql);
        while($row = mysqli_fetch_assoc($sqlresult)){
        	//$data = $row[]
        	//echo "<script type='text/javascript'>document.getElementById('container').innerHTML = document.getElementById('container').innerHTML + '<h3>".$edad."</h3>'</script>";
        }
      }
  	?>
    </body>
</html>