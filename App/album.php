<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Album</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/album.css" rel="stylesheet">
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
            <li id="tab3" class="hidden"><a href="crear-album.php">Subir album</a></li>
            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Consultas<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="consulta-albumes.php">Consulta de albumes</a></li>
                <li><a href="consulta-usuarios.php">Consulta de usuarios</a></li>
              </ul>
            </li>
            <li><a href="estadisticas.php">Estadísticas</a></li>
            <li id="tab1" class="hidden"><a href="tCatalogo.php">Tablas catalogo</a></li>
            <li id="tab2" class="hidden"><a href="especieAddModify.php">Control de especies</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right" id="der-nav">
            <li id="tab4" class="hidden"><a href="perfil.php">Mi perfil</a></li>
            <li><a href="ingresar.php">Ingresar</a></li>
            <li><a href="registro.php">Registrarse</a></li>
            <li><a href="log-out.php">Log Out</a></li>
          </ul>
        </div>
      </div>
    </nav>
    
    <div class="container">
      <div id="info-head" class="text-center"></div>
      <div id="fotos"></div>
    </div>
    <div id="footer">
      
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <?php
      session_start();
      if($_SESSION['idPersona']==1){
        echo "<script type=\"text/javascript\">document.getElementById(\"tab2\").className=\"\";</script>";
        echo "<script type=\"text/javascript\">document.getElementById(\"tab1\").className=\"\";</script>";
      }
      if($_SESSION['idPersona']!=""){
        echo "<script type=\"text/javascript\">document.getElementById(\"tab3\").className=\"\";</script>";
        echo "<script type=\"text/javascript\">document.getElementById(\"tab4\").className=\"\";</script>";
      }
      $username = "Usuario";
      $password = "user123E";
      $hostname = "186.176.166.148:3306";
      $myDB = "hidden_bird";
      $dbhandle = mysqli_connect($hostname, $username, $password, $myDB);
      if(!$dbhandle){
        echo "Conexión fallida: " . mysqli_conect_error();
      }else{
        $sql = "SELECT nombre_album, Descripcion, Especie_idEspecie, Persona_idPersona, Canton_idCanton, idAve FROM ave WHERE nombre_album = '".$_GET['album']."'";
        $sqlresult = mysqli_query($dbhandle, $sql);
        $row = mysqli_fetch_assoc($sqlresult);
        $nombre = $row['nombre_album'];
        $descripcion = $row['Descripcion'];
        $especie = $row['Especie_idEspecie'];
        $persona = $row['Persona_idPersona'];
        $canton = $row['Canton_idCanton'];
        $id = $row['idAve'];

        $sql = "SELECT Nombre, Apellido FROM persona WHERE idPersona = ".$persona;
        $sqlresult = mysqli_query($dbhandle, $sql);
        $row = mysqli_fetch_assoc($sqlresult);
        $persona = $row['Nombre']." ".$row['Apellido'];

        $sql = "SELECT Canton FROM canton WHERE idCanton = ".$canton;
        $sqlresult = mysqli_query($dbhandle, $sql);
        $row = mysqli_fetch_assoc($sqlresult);
        $canton = $row['Canton'];

        $sql = "SELECT Nombre_cientifico FROM especie WHERE idEspecie = ".$especie;
        $sqlresult = mysqli_query($dbhandle, $sql);
        $row = mysqli_fetch_assoc($sqlresult);
        $especie = $row['Nombre_cientifico'];

        echo "<script type='text/javascript'>document.getElementById('info-head').innerHTML = document.getElementById('info-head').innerHTML + '<h1>Álbum: ".$nombre." </h1><h2> Por: ".$persona."</h2>'</script>";
        echo "<script type='text/javascript'>document.getElementById('info-head').innerHTML = document.getElementById('info-head').innerHTML + '<h3>Especie: ".$especie."<br>Ubicación : ".$canton."</h3>'</script>";
        echo "<script type='text/javascript'>document.getElementById('info-head').innerHTML = document.getElementById('info-head').innerHTML + '<h4>Descripción: ".$descripcion."</h4>'</script>";

        $sql = "SELECT descripcion, url FROM foto WHERE Ave_idAve = ".$id;
        $sqlresult = mysqli_query($dbhandle, $sql);
        while($row = mysqli_fetch_assoc($sqlresult)){
          echo "<script type='text/javascript'>document.getElementById('fotos').innerHTML = document.getElementById('fotos').innerHTML + '<div class=\"col-sx-6 col-md-4\"><div class=\"thumbnail\"><img src=\"".$row['url']."\" alt=\"Not found\"><div class=\"caption\"><p>".$row['descripcion']."</p></div></div></div>'</script>";
        }

        echo "<script type='text/javascript'>document.getElementById('footer').innerHTML = document.getElementById('footer').innerHTML + '<a href=".$_GET['return']." style=\"width=350px;margin:auto;\"><input type=\"button\" id=\"regreso\" class=\"btn btn-lg btn-primary btn-block\" style=\"width:350px;margin:auto;\" value=\"Regresar\"></a>'</script>";
      }
      ?>
  </body>
</html>