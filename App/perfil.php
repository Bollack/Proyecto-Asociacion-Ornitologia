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
  <?php
      session_start();
  ?>

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
    
    <div class="container">
      <div id="info-head">
        <h1>Información del usuario</h1>
        <a href="editar-perfil.php" class="btn btn-default">Editar perfil</a>
      </div>
      <div id="info">  
        <div id="nombre" class="info">
          <h2>Nombre:</h2>
        </div>
        <div id="edad" class="info">
          <h2>Edad:</h2>
        </div>
        <div id="usuario" class="info">
          <h2>Usuario:</h2>
        </div>
        <div id="freg" class="info">
          <h2>Fecha de registro:</h2>
        </div>
      </div>

      <div id="fotos">
        <h1>Álbumes</h1>
        
        <div class="col-md-3 col-sm-5">
          <div class="thumbnail">
            <img src="http://www.iwantcovers.com/wp-content/uploads/2013/10/Blue-Abstract-Flower.jpg" alt="Not found">
            <div class="caption">
              <h3>Abstract</h3>
            </div>
          </div>
          <a href="" class="btn btn-default">Ver album</a>
        </div>
        
        <div class="col-md-3 col-sm-5">
          <div class="thumbnail">
            <img src="http://www.iwantcovers.com/wp-content/uploads/2013/10/Blue-Abstract-Flower.jpg" alt="Not found">
            <div class="caption">
              <h3>Abstract</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/perfil.js"></script>
    <?php
      $username = "Usuario";
      $password = "user123E";
      $hostname = "186.176.166.148:3306";
      $myDB = "hidden_bird";
      $dbhandle = mysqli_connect($hostname, $username, $password, $myDB);
      if(!$dbhandle){
        echo "Conexión fallida: " . mysqli_conect_error();
      }else{
        $sql = "SELECT Nombre, Apellido, Fecha_Nacimiento, Username, fecha_creacion FROM persona WHERE idPersona = ".$_SESSION['idPersona'];
        $sqlresult = mysqli_query($dbhandle, $sql);
        $row = mysqli_fetch_assoc($sqlresult);
        $fNac = $row['Fecha_Nacimiento'];
        $nombre = $row['Nombre']." ".$row['Apellido'];
        echo "<script type='text/javascript'>document.getElementById('nombre').innerHTML = document.getElementById('nombre').innerHTML + '<h3>".$nombre."</h3>'</script>";
        echo "<script type='text/javascript'>document.getElementById('usuario').innerHTML = document.getElementById('usuario').innerHTML + '<h3>".$row['Username']."</h3>'</script>";
        echo "<script type='text/javascript'>document.getElementById('freg').innerHTML = document.getElementById('freg').innerHTML + '<h3>".$row['fecha_creacion']."</h3>'</script>";
        
        $sql = "SELECT TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad FROM Persona WHERE idPersona=".$_SESSION['idPersona'];
        $sqlresult = mysqli_query($dbhandle, $sql);
        $row = mysqli_fetch_assoc($sqlresult);
        $edad = $row['edad']." (".$fNac.")";
        echo "<script type='text/javascript'>document.getElementById('edad').innerHTML = document.getElementById('edad').innerHTML + '<h3>".$edad."</h3>'</script>";
      }
    ?>
  </body>
</html>