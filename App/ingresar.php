<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de sesión</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ingresar.css" rel="stylesheet">
  </head>
  <body>

    <?php
    session_start();
    $usuario = $errUsuario = $contraseña = $errPassword = $result = $script = "";
    $username = "Administrador";
    $password = "Admin13";
    $hostname = "186.176.166.148:3306";
    $myDB = "hidden_bird";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      if(empty($_POST["inputUsuario"])){
        $errUsuario = "Escriba su nombre de usuario";
      }else{
        $usuario = $_POST["inputUsuario"];
      }
      if(empty($_POST["inputPassword"])){
        $errPassword = 'Escriba su contraseña';
      }else{
        $contraseña = md5($_POST["inputPassword"]);
      }
      if(!$errUsuario && !$errPassword){
        $dbhandle = mysqli_connect($hostname, $username, $password, $myDB); 
        if(!$dbhandle){
          echo "Conexión fallida: " . mysqli_conect_error();
        }else{          
          $sql = "SELECT idPersona, Username, Password, Nombre FROM persona where Username = '".$usuario."'";
          $sqlresult = mysqli_query($dbhandle, $sql);
          if (mysqli_num_rows($sqlresult) > 0) {
            $row = mysqli_fetch_assoc($sqlresult);
            if($row["Password"] = $contraseña){
              $result = "Conectado exitosamente";
              $_SESSION['idPersona'] = $row["idPersona"];
              $_SESSION['usuario'] = $usuario;
              echo "<script type=\"text/javascript\">document.location.href=\"crear-album.php\";</script>";
            }else{
              echo "Contraseña incorrecta!";
            }
          } else {
              echo "No se encontró el usuario!";
          }
        }
        mysqli_close($dbhandle);
      }
    }
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
      <form id="form" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h2 class="text-center">Porfavor inicie sesión</h2>
        <div class="form-group">
          <label for="inputUsuario">Usuario</label>
          <input type="text" id="inputUsuario" name ="inputUsuario" class="form-control" placeholder="Usuario" value="<?php echo $usuario; ?>">
          <p class="text-danger"><?php echo $errUsuario;?></p>
        </div>
        <div class="form-group">
          <label for="inputPassword">Contraseña</label>
          <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Contraseña" required value="<?php echo $contraseña; ?>">
          <p class="text-danger"><?php echo $errPassword;?></p>
        </div>
        <div class="form-group">
          <input id="submit" name="submit" type="submit" value="Iniciar sesión" class="btn btn-primary">
        </div>
        
      </form>
    </div>

    <footer class="footer">
      <div class="container">
        <h6 class="text-center">Hidden Bird es una plataforma web diseñada por estudiantes del Instituto Tecnológico de Costa Rica que le
        permite a personas aficionadas a la ornitología como a ornitólogos llevar su registro de fotografías de las
        distintas especies de aves presentes en Costa Rica. La plataforma le permite al usuario manejar álbumes de un
        ave capturada en su hábitat y subir fotografías de la misma, logrando así un control más sencillo de las fotografías.</h6>
      </div>
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>