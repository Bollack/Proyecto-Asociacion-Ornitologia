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
    
    <div class="container" id="container" style="width:600px; margin:auto;">
      <div class="text-center" id="tabla">
        <h1>Cantidad de huevos</h1>
      </div>
    </div>
    <input type="hidden" name="nombre" id="nombre" value="cantidad_huevos">
    <input type="hidden" name="idTabla" id="idTabla" value="idcantidad_huevos">
    <input type="hidden" name="columna" id="columna" value="numero_huevos">
    <input type="hidden" name="columnaExtra" id="columnaExtra" value="">
    <form name="ins" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="insertar" style="width:600px; margin:auto;">
        <div class="form-group">
          <label for="Insert">Insertar:</label>
          <input type="text" id="Insert" name="Insert1" class="form-control" placeholder="DATA">
        </div>
        <div class="form-group">
          <label for="requerimiento">Requeriento:</label>
          <select class="form-control" id="requerimiento" name="requerimiento">
            <option value="">Esta tabla no tiene requerimientos.</option>
          </select>
        </div>
        <h4 id="agregar" class="btn-info text-center" style="height:25px; font-weight:bold; color: white; border-radius: 10px; padding-top:2px">Insertar a la tabla</h4>
      </div>
    </form>      

    <form name="mod" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="modificar" style="width:600px; margin:auto;">
        <label for="cantidad">Modificar:</label>
        <select class="form-control" id="cantidad" name="cantidad">
        </select>
        <div class="form-group" style="margin-top:10px">
          <input type="text" id="mod" name="mod" class="form-control" placeholder="Modificación">
        </div>
        <h4 id="modificar" class="btn-info text-center" style="height:25px; font-weight:bold; color: white; border-radius: 10px; padding-top:2px">Modificar columna seleccionada</h4>
      </div>
    </form>

  	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/catalogo.js"></script>
    <?php
    	$username = "Administrador";
      $password = "Admin13";
      $hostname = "186.176.166.148:3306";
      $myDB = "hidden_bird";
      $dbhandle = mysqli_connect($hostname, $username, $password, $myDB);
      if(!$dbhandle){
        echo "Conexión fallida: " . mysqli_conect_error();
      }else{
      	$sql = "SELECT idcantidad_huevos, numero_huevos FROM cantidad_huevos";
        $sqlresult = mysqli_query($dbhandle, $sql);
        while($row = mysqli_fetch_assoc($sqlresult)){
        	echo "<script type='text/javascript'>document.getElementById('tabla').innerHTML = document.getElementById('tabla').innerHTML + '<h3>ID: ".$row["idcantidad_huevos"]." - DATA: ".$row["numero_huevos"]."</h3>'</script>";
          echo "<script type='text/javascript'>document.getElementById('cantidad').innerHTML = document.getElementById('cantidad').innerHTML + '<option value=".$row["idcantidad_huevos"].">".$row["numero_huevos"]."</option>'</script>";
        }
      }
  	?>
    </body>
</html>