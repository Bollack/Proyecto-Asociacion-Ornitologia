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
    $usuario = $errUsuario = $contraseña = $errPassword = $result = "";
   
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
        $errPassword = 'Escriba su password';
      }else{
        $contraseña = $_POST["inputPassword"];
      }
      if(!$errUsuario && !$errPassword){
        //connection to the database
        $dbhandle = mysqli_connect($hostname, $username, $password, $myDB); 
        if(!$dbhandle){
          $result = "Conexión fallida: " . mysqli_conect_error();
        }else{
          $result = "Conexión exitosa";
          $sql = "SELECT idZonaVida FROM zonavida where idZonaVida =1";
          $sqlresult = mysqli_query($dbhandle, $sql);

          if (mysqli_num_rows($sqlresult) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($sqlresult)) {
                  echo "id: " . $row["idZonaVida"]."<br>";
              }
          } else {
              echo "0 results";
          }
        }
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
          <a class="navbar-brand" href="">Hidden Bird</a>
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
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="ingresar.php">Ingresar</a></li>
            <li><a href="registro.php">Registrarse</a></li>
            <li style="margin-top:8px;"><button type="button" class="btn btn-default">Log Out</button></li>
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
        <div class="form-group">
          <?php echo $result; ?>
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
    <script src="js/ingresar.js"></script>
  </body>
</html>