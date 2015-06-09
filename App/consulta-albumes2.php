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
    <div class="contenedor" style="width:600px;margin:auto;">
      <form id="form" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <h1 class="text-center">Búsqueda de álbumes registrados</h1>
        <div class="form-group">
          <label>Filtrar tipo de pico:</label><br>
          <select class="form-control" id="Pico" name="Pico">
            <option value="NA">No importa</option>
          </select>
        </div>
        <div class="form-group">
          <label>Filtrar color:</label><br>
          <select class="form-control" id="Color" name="Color">
            <option value="NA">No importa</option>
          </select>
        </div>
        <div class="form-group">
          <label>Filtrar cantidad de huevos:</label><br>
          <select class="form-control" id="cHuevos" name="cHuevos">
            <option value="NA">No importa</option>
          </select>
        </div>
        <div class="form-group">
          <label>Filtrar zona de vida:</label><br>
          <select class="form-control" id="Zona" name="Zona">
            <option value="NA">No importa</option>
          </select>
        </div>
        <div class="form-group">
          <label>Filtrar tamaño:</label><br>
          <select class="form-control" id="Tamano" name="Tamano">
            <option value="NA">No importa</option>
          </select>
        </div>
        <div class="form-group">
          <label>Filtrar usuario:</label><br>
          <select class="form-control" id="Persona" name="Persona">
            <option value="NA">No importa</option>
          </select>
        </div>
        <button id="busqueda" style="margin-top:15px" class="btn btn-lg btn-primary btn-block" type="submit">Buscar</button>
      </form>
      <div id="fotos">

      </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/consulta-albumes.js"></script>
    <?php
      $username = "Usuario";
      $password = "user123E";
      $hostname = "186.176.166.148:3306";
      $myDB = "hidden_bird";
      $dbhandle = mysqli_connect($hostname, $username, $password, $myDB); 
      if(!$dbhandle){
        $result = "Conexión fallida: " . mysqli_conect_error();
      }else{
        $sql = "SELECT Color, Color_id FROM color";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $color = $row['Color'];
            echo "<script type=\"text/javascript\">document.getElementById('Color').innerHTML = document.getElementById('Color').innerHTML + \"<option value='".$row['Color_id']."'>".$color."</option>\"</script>";
          }
        }

        $sql = "SELECT Forma_Pico, idForma_Pico FROM forma_pico";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $pico = $row['Forma_Pico'];
            echo "<script type=\"text/javascript\">document.getElementById('Pico').innerHTML = document.getElementById('Pico').innerHTML + \"<option value='".$row['idForma_Pico']."'>".$pico."</option>\"</script>";
          }
        }

        $sql = "SELECT numero_huevos, idcantidad_huevos FROM cantidad_huevos";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $cHuevos = $row['numero_huevos'];
            echo "<script type=\"text/javascript\">document.getElementById('cHuevos').innerHTML = document.getElementById('cHuevos').innerHTML + \"<option value='".$row['idcantidad_huevos']."'>".$cHuevos."</option>\"</script>";
          }
        }

        $sql = "SELECT Zona, idZonaVida FROM zonavida";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $zona = $row['Zona'];
            echo "<script type=\"text/javascript\">document.getElementById('Zona').innerHTML = document.getElementById('Zona').innerHTML + \"<option value='".$row['idZonaVida']."'>".$zona."</option>\"</script>";
          }
        }

        $sql = "SELECT Tamano, idTamano FROM tamano";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $tamano = $row['Tamano'];
            echo "<script type=\"text/javascript\">document.getElementById('Tamano').innerHTML = document.getElementById('Tamano').innerHTML + \"<option value='".$row['idTamano']."'>".$tamano."</option>\"</script>";
          }
        }

        $sql = "SELECT Username, idPersona FROM persona";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $persona = $row['Username'];
            echo "<script type=\"text/javascript\">document.getElementById('Persona').innerHTML = document.getElementById('Persona').innerHTML + \"<option value='".$row['idPersona']."'>".$persona."</option>\"</script>";
          }
        }
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
          $pico = $_POST['Pico'];
          $color = $_POST['Color'];
          $cHuevos = $_POST['cHuevos'];
          $zona = $_POST['Zona'];
          $tamano = $_POST['Tamano'];
          $persona = $_POST['Persona'];

          $sql = "SELECT Especie_idEspecie, Persona_idPersona, color, idAve FROM ave";
          $sqlresult = mysqli_query($dbhandle, $sql);
          if(mysqli_num_rows($sqlresult)>0){
          	while($row = mysqli_fetch_assoc($sqlresult)){
          	  $vPico = $vColor = $vCHUevos = $vZona = $vTamano = $vPersona = false;
              $especie = $row['Especie_idEspecie'];
              $dueno = $row['Persona_idPersona'];
              $colorORG = $row['color'];
              $id = $row['idAve'];
              $sql = "SELECT ZonaVida_idZonaVida, Tamano_idTamano, numero_huevos_idnumero_huevos, Forma_Pico_idForma_Pico FROM especie WHERE idEspecie = ".$especie;
              $sqlresult = mysqli_query($dbhandle, $sql);
              $row = mysqli_fetch_assoc($sqlresult);
              if($pico=="NA" || $pico==$row['Forma_Pico_idForma_Pico']){
                $vPico = true;
              }else{
                $vPico = false;
              }
              if($color=="NA" || $color==$colorORG){
                $vColor = true;
              }else{
                $vColor = false;
              }
              if($cHuevos=="NA" || $cHuevos==$row['numero_huevos_idnumero_huevos']){
                $vCHUevos = true;
              }else{
                $vCHUevos = true;
              }
              if($zona=="NA" || $zona==$row['ZonaVida_idZonaVida']){
                $vZona = true;
              }else{
                $vZona = false;
              }
              if($tamano=="NA" || $tamano==$row['Tamano_idTamano']){
                $vTamano = true;
              }else{
                $vTamano = false;
              }
              if($persona=="NA" || $persona==$dueno){
                $vPersona = true;
              }else{
                $vPersona = false;
              }
              if($vPico && $vColor && $vCHUevos && $vZona && $vTamano && $vPersona){
              	$sql = "SELECT Descripcion, nombre_album FROM ave WHERE idAve = ".$id;
              	$sqlresult = mysqli_query($dbhandle, $sql);
              	$row = mysqli_fetch_assoc($sqlresult);
              	$sql2 = "SELECT url FROM foto WHERE Ave_idAve = ".$id;
	            $sqlresult2 = mysqli_query($dbhandle, $sql2);
	            $row2 = mysqli_fetch_assoc($sqlresult2);
	            echo "<script type='text/javascript'>document.getElementById('fotos').innerHTML = document.getElementById('fotos').innerHTML + '<div class=\"col-sx-6 col-md-4\"><div class=\"thumbnail\"><img src=\"".$row2['url']."\" alt=\"Not found\"><div class=\"caption\"><h3>".$row['nombre_album']."</h3><p>".$row['Descripcion']."</p><button type=\"button\" id=\"album\" class=\"btn btn-lg btn-info btn-block\" type=\"submit\" value=\"".$row['nombre_album']."\">Ver Album</button></div></div></div>'</script>";
              }
          	}
          }
        }
      }
    ?>
  </body>
</html>