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
          <a class="navbar-brand" href="consulta-albumes.php">Hidden Bird</a>
        </div>
        
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="nav-derecha" class="nav navbar-nav">
            <li id="tab3" class="hidden"><a href="crear-album.php">Subir álbum</a></li>
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
      <div id="info-head">
        <h1>Información del usuario</h1>
        <h4>En esta sección puede visualizar y manejar la información de los álbumes 
          de las aves fotografiadas y compartirlas así con la comunidad de Hidden Bird. 
          Puede seleccionar su álbum y editar las fotografías en él, así como editar la 
          info general del mismo.</h4>
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

      </div>
      <div id="footer">
      </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/perfil.js"></script>
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
      $id = (isset($_GET['id']) ? $_GET['id']:$_SESSION['idPersona']);
      if(isset($_GET['return'])){
        echo "<script type='text/javascript'>document.getElementById('footer').innerHTML = document.getElementById('footer').innerHTML + '<a href=".$_GET['return']." style=\"width=350px;margin:auto;\"><input type=\"button\" id=\"regreso\" class=\"btn btn-lg btn-primary btn-block\" style=\"width:350px;margin:auto;\" value=\"Regresar\"></a>'</script>";
      }
      $username = "Usuario";
      $password = "user123E";
      $hostname = "186.176.166.148:3306";
      $myDB = "hidden_bird";
      $dbhandle = mysqli_connect($hostname, $username, $password, $myDB);
      if(!$dbhandle){
        echo "Conexión fallida: " . mysqli_conect_error();
      }else{
        $sql = "SELECT Nombre, Apellido, Fecha_Nacimiento, Username, fecha_creacion FROM persona WHERE idPersona = ".$id;
        $sqlresult = mysqli_query($dbhandle, $sql);
        $row = mysqli_fetch_assoc($sqlresult);
        $fNac = $row['Fecha_Nacimiento'];
        $nombre = $row['Nombre']." ".$row['Apellido'];
        echo "<script type='text/javascript'>document.getElementById('nombre').innerHTML = document.getElementById('nombre').innerHTML + '<h3>".$nombre."</h3>'</script>";
        echo "<script type='text/javascript'>document.getElementById('usuario').innerHTML = document.getElementById('usuario').innerHTML + '<h3>".$row['Username']."</h3>'</script>";
        echo "<script type='text/javascript'>document.getElementById('freg').innerHTML = document.getElementById('freg').innerHTML + '<h3>".$row['fecha_creacion']."</h3>'</script>";
        
        $sql = "SELECT TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad FROM Persona WHERE idPersona=".$id;
        $sqlresult = mysqli_query($dbhandle, $sql);
        $row = mysqli_fetch_assoc($sqlresult);
        $edad = $row['edad']." (".$fNac.")";
        echo "<script type='text/javascript'>document.getElementById('edad').innerHTML = document.getElementById('edad').innerHTML + '<h3>".$edad."</h3>'</script>";

        $sql = "SELECT COUNT(1) AS albumes FROM ave WHERE Persona_idPersona = ".$id;
        $sqlresult = mysqli_query($dbhandle, $sql);
        $row = mysqli_fetch_assoc($sqlresult);
        $cantidadAlbumes = $row['albumes'];
        if($cantidadAlbumes>=1){
          $sql = "SELECT Descripcion, nombre_album, idAve FROM ave WHERE Persona_idPersona = ".$id;
          $sqlresult = mysqli_query($dbhandle, $sql);
          while($row = mysqli_fetch_assoc($sqlresult)){
            $sql2 = "SELECT url FROM foto WHERE Ave_idAve = ".$row['idAve'];
            $sqlresult2 = mysqli_query($dbhandle, $sql2);
            $row2 = mysqli_fetch_assoc($sqlresult2);
            echo "<script type='text/javascript'>document.getElementById('fotos').innerHTML = document.getElementById('fotos').innerHTML + '<div class=\"col-sx-6 col-md-4\"><div class=\"thumbnail\"><img src=\"".$row2['url']."\" alt=\"Not found\"><div class=\"caption\"><h3>".$row['nombre_album']."</h3><p>".$row['Descripcion']."</p><button type=\"button\" id=\"album\" class=\"btn btn-lg btn-info btn-block\" type=\"submit\" value=\"".$row['nombre_album']."\">Ver Album</button></div></div></div>'</script>";
            }
          }else{
            echo "<script type='text/javascript'>document.getElementById('fotos').innerHTML = document.getElementById('fotos').innerHTML + '<h3>No tiene álbumes.</h3>'</script>";
          }
      }
    ?>
  </body>
</html>