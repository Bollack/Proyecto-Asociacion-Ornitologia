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
          <a class="navbar-brand" href="consulta-albumes.php">Hidden Bird</a>
        </div>
        
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="nav-derecha" class="nav navbar-nav">
            <li id="tab3" class="hidden"><a href="consulta-albumes.php">Subir álbum</a></li>
            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Consultas<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="consulta-albumes.php">Consulta de álbumes</a></li>
                <li><a href="consulta-usuarios.php">Consulta de usuarios</a></li>
              </ul>
            </li>
            <li><a href="estadisticas.php">Estadísticas</a></li>
            <li id="tab1" class="hidden"><a href="tCatalogo.php">Tablas catalogo</a></li>
            <li id="tab2" class="hidden"><a href="especieAddModify.php">Control de especies</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right" id="der-nav">
            <li id="tab4" class="hidden"><a href="perfil.php">Mi perfil</a></li>
            <li id="tab5"><a href="ingresar.php">Ingresar</a></li>
            <li><a href="registro.php">Registrarse</a></li>
            <li><a href="log-out.php">Log Out</a></li>
          </ul>
        </div>
      </div>
    </nav>
    
    <div class="container">
      <div style="margin:auto">
        
      </div>
      <form id="form" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <img src="Images/logo_hidden_bird_transparente.png" style="width:304px;height:228px;">
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
        <!--<div class="form-group"> -->

        <!--</div> -->
        
      </form>
    </div>

    <footer class="footer">
      <div class="container">
        <h5 class="text-center">Hidden Bird es una plataforma web diseñada por estudiantes del Instituto Tecnológico de Costa Rica que le
        permite a personas aficionadas a la ornitología como a ornitólogos llevar su registro de fotografías de las
        distintas especies de aves presentes en Costa Rica. La plataforma le permite al usuario manejar álbumes de un
        ave capturada en su hábitat y subir fotografías de la misma, logrando así un control más sencillo de las fotografías.</h5>
      </div>
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <?php
      if($_SESSION['idPersona']==1){
        echo "<script type=\"text/javascript\">document.getElementById(\"tab2\").className=\"\";</script>";
        echo "<script type=\"text/javascript\">document.getElementById(\"tab1\").className=\"\";</script>";
      }
      if($_SESSION['idPersona']!=""){
        echo "<script type=\"text/javascript\">document.getElementById(\"tab3\").className=\"\";</script>";
        echo "<script type=\"text/javascript\">document.getElementById(\"tab4\").className=\"\";</script>";
        echo "<script type=\"text/javascript\">document.getElementById(\"tab5\").className=\"hidden\";</script>";
      }
    ?>
  </body>
</html>