<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Estadísticas</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estadisticas.css" rel="stylesheet">
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
      <div>
        <h3 id="avesReg">Aves registradas: </h3>
      </div>
      <div id="avesXzona">
        <h3>Cantidad de aves registradas por zona de vida:</h3>
      </div>
      <div id="avenXtamano">
        <h3>Cantidad de aves registradas por tamaño:</h3>
      </div>
      <div id="top5">
        <h3>Top 5 de personas con mayor cantidad de registros de aves:</h3>
      </div>
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
        echo "<script type=\"text/javascript\">document.getElementById(\"tab5\").className=\"hidden\";</script>";
      }
      $username = "Administrador";
      $password = "Admin13";
      $hostname = "186.176.166.148:3306";
      $myDB = "hidden_bird";
      $dbhandle = mysqli_connect($hostname, $username, $password, $myDB);
      if(!$dbhandle){
        $result = "Conexión fallida: " . mysqli_conect_error();
      }else{
        $sql = "SELECT COUNT(1) AS total FROM ave";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          $row = mysqli_fetch_assoc($sqlresult);
          $aves = $row['total'];
          echo "<script type='text/javascript'>document.getElementById('avesReg').innerHTML = document.getElementById('avesReg').innerHTML + '".$aves."'</script>";
        }

        $sql = "SELECT getZonaVidaFromID(idZonaVida) AS zona, getNumberAvesByZonaVida(idZonaVida) AS numero FROM zonavida ORDER BY getNumberAvesByZonaVida(idZonaVida) DESC";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $datos = "Cantidad de aves de la zona ".$row['zona'].": ".$row['numero'].".";
            echo "<script type='text/javascript'>document.getElementById('avesXzona').innerHTML = document.getElementById('avesXzona').innerHTML + '<h4>".$datos."</h4>'</script>";
          } 
        }

        $sql = "SELECT getTamanoFromID(idTamano) AS tamano, getNumberAvesByTamano(idTamano) AS numero FROM Tamano ORDER BY getNumberAvesByTamano(idTamano) DESC";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $datos = "Aves ".$row['tamano'].": ".$row['numero'].".";
            echo "<script type='text/javascript'>document.getElementById('avenXtamano').innerHTML = document.getElementById('avenXtamano').innerHTML + '<h4>".$datos."</h4>'</script>";
          } 
        }

        $sql = "SELECT Nombre AS nombre, Apellido AS apellido, getNumberAvesByPersona(idPersona) AS numero FROM persona ORDER BY getNumberAvesByPersona(idPersona) DESC";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          $total = 5;
          for($count=0;$count<$total;$count++){
            if($row = mysqli_fetch_assoc($sqlresult)){  
              $datos = $row['nombre']." ".$row['apellido'].": ".$row['numero']." aves.";
              echo "<script type='text/javascript'>document.getElementById('top5').innerHTML = document.getElementById('top5').innerHTML + '<h4>".$datos."</h4>'</script>";
            }
          } 
        }
      }
    ?>

  </body>
</html>