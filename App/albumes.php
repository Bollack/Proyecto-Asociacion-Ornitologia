<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consulta de álbumes</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/consulta-albumes.css" rel="stylesheet">
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
    <div class="contenedor" style="width:600px;margin:auto;">
      <div id="fotos" style="width: 600px; margin-top:15px">

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
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = "Administrador";
        $password = "Admin13";
        $hostname = "186.176.166.148:3306";
        $myDB = "hidden_bird";
        $dbhandle = mysqli_connect($hostname, $username, $password, $myDB); 
        if(!$dbhandle){
          $result = "Conexión fallida: " . mysqli_conect_error();
        }else{
          $pico = $_POST['Pico'];
          $color = $_POST['Color'];
          $cHuevos = $_POST['cHuevos'];
          $zona = $_POST['Zona'];
          $tamano = $_POST['Tamano'];
          $persona = $_POST['Persona'];
          $sql = "SELECT  Descripcion, nombre_album, Especie_idEspecie, Persona_idPersona, color, idAve FROM ave";
          $sqlresult = mysqli_query($dbhandle, $sql);
          if(mysqli_num_rows($sqlresult)>0){
            while($row = mysqli_fetch_assoc($sqlresult)){
              $vPico = $vColor = $vCHUevos = $vZona = $vTamano = $vPersona = false;
              $especie = $row['Especie_idEspecie'];
              $dueno = $row['Persona_idPersona'];
              $colorORG = $row['color'];
              $id = $row['idAve'];
              $descripcion = $row['Descripcion'];
              $nombre = $row['nombre_album'];
              $sql2 = "SELECT ZonaVida_idZonaVida, Tamano_idTamano, numero_huevos_idnumero_huevos, Forma_Pico_idForma_Pico FROM especie WHERE idEspecie = ".$especie;
              $sqlresult2 = mysqli_query($dbhandle, $sql2);
              $row2 = mysqli_fetch_assoc($sqlresult2);
              if($pico==0 or $pico==$row2['Forma_Pico_idForma_Pico']){
                $vPico = true;
              }
              if($color==0 or $color==$colorORG){
                $vColor = true;
              }
              if($cHuevos==0 or $cHuevos==$row2['numero_huevos_idnumero_huevos']){
                $vCHUevos = true;
              }
              if($zona==0 or $zona==$row2['ZonaVida_idZonaVida']){
                $vZona = true;
              }
              if($tamano==0 or $tamano==$row2['Tamano_idTamano']){
                $vTamano = true;
              }
              if($persona==0 or $persona==$dueno){
                $vPersona = true;
              }
              if($vPico==true && $vColor==true && $vCHUevos==true && $vZona==true && $vTamano==true && $vPersona==true){
                $sql3 = "SELECT url FROM foto WHERE Ave_idAve = ".$id;
                $sqlresult3 = mysqli_query($dbhandle, $sql3);
                $row3 = mysqli_fetch_assoc($sqlresult3);
                echo "<script type='text/javascript'>document.getElementById('fotos').innerHTML = document.getElementById('fotos').innerHTML + '<div class=\"col-sx-6 col-md-4\"><div class=\"thumbnail\"><img src=\"".$row3['url']."\" alt=\"Not found\"><div class=\"caption\"><h3>".$nombre."</h3><p>".$descripcion."</p><button type=\"button\" id=\"album\" class=\"btn btn-lg btn-info btn-block\" type=\"submit\" value=\"".$nombre."\">Ver Album</button></div></div></div>'</script>\n";
              }
            }
          }
        }
      }
    ?>
  </body>
</html>