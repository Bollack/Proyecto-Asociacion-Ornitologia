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
            <li><a href="tCatalogo.php">Tablas catálogo</a></li>
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
      <form class="form-inline" id="form" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <h1 class="text-center">Búsqueda de álbumes registrados</h1>
        <div class="form-group">
          <label>Filtrar tipo de pico:</label><br>
          <select class="form-control" id="Pico" name="Pico">
            <option value=0>No importa</option>
          </select>
        </div>
        <div class="form-group">
          <label>Filtrar color:</label><br>
          <select class="form-control" id="Color" name="Color">
            <option value=0>No importa</option>
          </select>
        </div>
        <div class="form-group">
          <label>Filtrar cantidad de huevos:</label><br>
          <select class="form-control" id="cHuevos" name="cHuevos">
            <option value=0>No importa</option>
          </select>
        </div>
        <div class="form-group">
          <label>Filtrar zona de vida:</label><br>
          <select class="form-control" id="Zona" name="Zona">
            <option value=0>No importa</option>
          </select>
        </div>
        <div class="form-group">
          <label>Filtrar tamaño:</label><br>
          <select class="form-control" id="Tamano" name="Tamano">
            <option value=0>No importa</option>
          </select>
        </div>
        <div class="form-group">
          <label>Filtrar usuario:</label><br>
          <select class="form-control" id="Persona" name="Persona">
            <option value=0>No importa</option>
          </select>
        </div>
        <div class="form-group">
          <label>Filtrar cantón:</label><br>
          <select class="form-control" id="Canton" name="Canton">
            <option value=0>No importa</option>
          </select>
        </div>
        <div class="form-group">
          <label>Filtrar nombre del álbum:</label><br>
          <select class="form-control" id="Nombre" name="Nombre">
            <option value=0>No importa</option>
          </select>
        </div>
        <div class="form-group">
          <label>Filtrar especie:</label><br>
          <select class="form-control" id="Especie" name="Especie">
            <option value=0>No importa</option>
          </select>
        </div>
        <div class="form-group">
          <label>Filtrar familia:</label><br>
          <select class="form-control" id="Familia" name="Familia">
            <option value=0>No importa</option>
          </select>
        </div>
        <div class="form-group">
          <label>Filtrar genero:</label><br>
          <select class="form-control" id="Genero" name="Genero">
            <option value=0>No importa</option>
          </select>
        </div>
        <div class="form-group">
          <label>Filtrar nombre común:</label><br>
          <select class="form-control" id="NombreC" name="NombreC">
            <option value=0>No importa</option>
          </select>
        </div>
        <div class="form-group">
          <label>Filtrar nombre ingles:</label><br>
          <select class="form-control" id="NombreI" name="NombreI">
            <option value=0>No importa</option>
          </select>
        </div>
        <div class="form-group">
          <label>Filtrar orden:</label><br>
          <select class="form-control" id="Orden" name="Orden">
            <option value=0>No importa</option>
          </select>
        </div>
        <div class="form-group">
          <label>Filtrar provincia:</label><br>
          <select class="form-control" id="Provincia" name="Provincia">
            <option value=0>No importa</option>
          </select>
        </div>
        <div class="form-group">
          <label>Filtrar suborden:</label><br>
          <select class="form-control" id="Suborden" name="Suborden">
            <option value=0>No importa</option>
          </select>
        </div>
        <div class="form-group">
          <label>Filtrar tiempo incubación:</label><br>
          <select class="form-control" id="TiempoI" name="TiempoI">
            <option value=0>No importa</option>
          </select>
        </div>
        <div class="form-group">
          <label>Filtrar tipo de huevos:</label><br>
          <select class="form-control" id="TipoH" name="TipoH">
            <option value=0>No importa</option>
          </select>
        </div>
        <div class="form-group">
          <label>Filtrar tipo incubación:</label><br>
          <select class="form-control" id="TipoI" name="TipoI">
            <option value=0>No importa</option>
          </select>
        </div>
        <div class="form-group">
          <label>Filtrar tipo nido:</label><br>
          <select class="form-control" id="TipoN" name="TipoN">
            <option value=0>No importa</option>
          </select>
        </div>
        <button id="busqueda" style="margin-top:15px" class="btn btn-lg btn-primary btn-block" type="submit">Buscar</button>
      </form>
      <div id="fotos" style="width: 600px; margin-top:15px">
      </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/consulta-albumes.js"></script>
    <?php
      $username = "Administrador";
      $password = "Admin13";
      $hostname = "186.176.166.148:3306";
      $myDB = "hidden_bird";
      $dbhandle = mysqli_connect($hostname, $username, $password, $myDB); 
      if(!$dbhandle){
        $result = "Conexión fallida: " . mysqli_conect_error();
      }else{
        $sql = "SELECT Color, Color_id FROM color ORDER BY Color_id";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $color = $row['Color'];
            echo "<script type=\"text/javascript\">document.getElementById('Color').innerHTML = document.getElementById('Color').innerHTML + \"<option value='".$row['Color_id']."'>".$color."</option>\"</script>\n";
          }
        }

        $sql = "SELECT Forma_Pico, idForma_Pico FROM forma_pico ORDER BY idForma_Pico";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $pico = $row['Forma_Pico'];
            echo "<script type=\"text/javascript\">document.getElementById('Pico').innerHTML = document.getElementById('Pico').innerHTML + \"<option value='".$row['idForma_Pico']."'>".$pico."</option>\"</script>\n";
          }
        }

        $sql = "SELECT numero_huevos, idcantidad_huevos FROM cantidad_huevos ORDER BY idcantidad_huevos";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $cHuevos = $row['numero_huevos'];
            echo "<script type=\"text/javascript\">document.getElementById('cHuevos').innerHTML = document.getElementById('cHuevos').innerHTML + \"<option value='".$row['idcantidad_huevos']."'>".$cHuevos."</option>\"</script>\n";
          }
        }

        $sql = "SELECT Zona, idZonaVida FROM zonavida ORDER BY idZonaVida";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $zona = $row['Zona'];
            echo "<script type=\"text/javascript\">document.getElementById('Zona').innerHTML = document.getElementById('Zona').innerHTML + \"<option value='".$row['idZonaVida']."'>".$zona."</option>\"</script>\n";
          }
        }

        $sql = "SELECT Tamano, idTamano FROM tamano ORDER BY idTamano";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $tamano = $row['Tamano'];
            echo "<script type=\"text/javascript\">document.getElementById('Tamano').innerHTML = document.getElementById('Tamano').innerHTML + \"<option value='".$row['idTamano']."'>".$tamano."</option>\"</script>\n";
          }
        }

        $sql = "SELECT Username, idPersona FROM persona ORDER BY idPersona";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $persona = $row['Username'];
            echo "<script type=\"text/javascript\">document.getElementById('Persona').innerHTML = document.getElementById('Persona').innerHTML + \"<option value='".$row['idPersona']."'>".$persona."</option>\"</script>\n";
          }
        }

        $sql = "SELECT Canton, idCanton FROM canton ORDER BY idCanton";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $canton = $row['Canton'];
            echo "<script type=\"text/javascript\">document.getElementById('Canton').innerHTML = document.getElementById('Canton').innerHTML + \"<option value='".$row['idCanton']."'>".$canton."</option>\"</script>\n";
          }
        }
        
        $sql = "SELECT nombre_album, idAve FROM ave ORDER BY idAve";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $nombre = $row['nombre_album'];
            echo "<script type=\"text/javascript\">document.getElementById('Nombre').innerHTML = document.getElementById('Nombre').innerHTML + \"<option value='".$row['idAve']."'>".$nombre."</option>\"</script>\n";
          }
        }

        $sql = "SELECT Nombre_cientifico, idEspecie FROM especie ORDER BY idEspecie";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $especie = $row['Nombre_cientifico'];
            echo "<script type=\"text/javascript\">document.getElementById('Especie').innerHTML = document.getElementById('Especie').innerHTML + \"<option value='".$row['idEspecie']."'>".$especie."</option>\"</script>\n";
          }
        }

        $sql = "SELECT Familia, idFamilia FROM familia ORDER BY idFamilia";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $familia = $row['Familia'];
            echo "<script type=\"text/javascript\">document.getElementById('Familia').innerHTML = document.getElementById('Familia').innerHTML + \"<option value='".$row['idFamilia']."'>".$familia."</option>\"</script>\n";
          }
        }

        $sql = "SELECT Genero, idGenero FROM genero ORDER BY idGenero";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $genero = $row['Genero'];
            echo "<script type=\"text/javascript\">document.getElementById('Genero').innerHTML = document.getElementById('Genero').innerHTML + \"<option value='".$row['idGenero']."'>".$genero."</option>\"</script>\n";
          }
        }

        $sql = "SELECT Nombre, idNombre_comun FROM nombre_comun ORDER BY idNombre_comun";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $nombre = $row['Nombre'];
            echo "<script type=\"text/javascript\">document.getElementById('NombreC').innerHTML = document.getElementById('NombreC').innerHTML + \"<option value='".$row['idNombre_comun']."'>".$nombre."</option>\"</script>\n";
          }
        }

        $sql = "SELECT nombre, idNombre_ingles_ave FROM nombre_ingles_ave ORDER BY idNombre_ingles_ave";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $nombre = $row['nombre'];
            echo "<script type=\"text/javascript\">document.getElementById('NombreI').innerHTML = document.getElementById('NombreI').innerHTML + \"<option value='".$row['idNombre_ingles_ave']."'>".$nombre."</option>\"</script>\n";
          }
        }

        $sql = "SELECT Orden, idOrden FROM orden ORDER BY idOrden";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $orden = $row['Orden'];
            echo "<script type=\"text/javascript\">document.getElementById('Orden').innerHTML = document.getElementById('Orden').innerHTML + \"<option value='".$row['idOrden']."'>".$orden."</option>\"</script>\n";
          }
        }

        $sql = "SELECT Provincia, idProvincia FROM provincia ORDER BY idProvincia";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $provincia = $row['Provincia'];
            echo "<script type=\"text/javascript\">document.getElementById('Provincia').innerHTML = document.getElementById('Provincia').innerHTML + \"<option value='".$row['idProvincia']."'>".$provincia."</option>\"</script>\n";
          }
        }

        $sql = "SELECT Suborden, idSuborden FROM suborden ORDER BY idSuborden";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $suborden = $row['Suborden'];
            echo "<script type=\"text/javascript\">document.getElementById('Suborden').innerHTML = document.getElementById('Suborden').innerHTML + \"<option value='".$row['idSuborden']."'>".$suborden."</option>\"</script>\n";
          }
        }

        $sql = "SELECT Tiempo_incubacion, idTiempo_incubacion FROM tiempo_incubacion ORDER BY idTiempo_incubacion";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $tiempo = $row['Tiempo_incubacion'];
            echo "<script type=\"text/javascript\">document.getElementById('TiempoI').innerHTML = document.getElementById('TiempoI').innerHTML + \"<option value='".$row['idTiempo_incubacion']."'>".$tiempo."</option>\"</script>\n";
          }
        }

        $sql = "SELECT tipo_cascara, idTipo_huevos FROM tipo_huevos ORDER BY idTipo_huevos";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $tipo = $row['tipo_cascara'];
            echo "<script type=\"text/javascript\">document.getElementById('TipoH').innerHTML = document.getElementById('TipoH').innerHTML + \"<option value='".$row['idTipo_huevos']."'>".$tipo."</option>\"</script>\n";
          }
        }

        $sql = "SELECT Tipo_incubacion, idTipo_incubacion FROM tipo_incubacion ORDER BY idTipo_incubacion";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $tipo = $row['Tipo_incubacion'];
            echo "<script type=\"text/javascript\">document.getElementById('TipoI').innerHTML = document.getElementById('TipoI').innerHTML + \"<option value='".$row['idTipo_incubacion']."'>".$tipo."</option>\"</script>\n";
          }
        }

        $sql = "SELECT Tipo, idTipo_Nido FROM tipo_nido ORDER BY idTipo_Nido";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $tipo = $row['Tipo'];
            echo "<script type=\"text/javascript\">document.getElementById('TipoN').innerHTML = document.getElementById('TipoN').innerHTML + \"<option value='".$row['idTipo_Nido']."'>".$tipo."</option>\"</script>\n";
          }
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){
          $pico = $_POST['Pico'];
          $color = $_POST['Color'];
          $cHuevos = $_POST['cHuevos'];
          $zona = $_POST['Zona'];
          $tamano = $_POST['Tamano'];
          $persona = $_POST['Persona'];
          $canton = $_POST['Canton'];
          $nombre = $_POST['Nombre'];
          $especie = $_POST['Especie'];
          $familia = $_POST['Familia'];
          $genero = $_POST['Genero'];
          $nombreC =$_POST['NombreC'];
          $nombreI = $_POST['NombreI'];
          $orden = $_POST['Orden'];
          $provincia = $_POST['Provincia'];
          $suborden = $_POST['Suborden'];
          $tiempoI = $_POST['TiempoI'];
          $tipoH = $_POST['TipoH'];
          $tipoI = $_POST['TipoI'];
          $tipoN = $_POST['TipoN'];
          $counter = 0;
          $sql = "SELECT  Descripcion, nombre_album, Especie_idEspecie, Persona_idPersona, Canton_idCanton, color, idAve FROM ave";
          $sqlresult = mysqli_query($dbhandle, $sql);
          if(mysqli_num_rows($sqlresult)>0){
            while($row = mysqli_fetch_assoc($sqlresult)){
              $vPico = $vColor = $vCHUevos = $vZona = $vTamano = $vPersona = $vCanton = $vNombre = $vEspecie = $vFamilia = $vGenero = $vNombreC = $vNombreI = $vOrden = $vProvincia = $vSuborden = $vTiempoI = $vTipoH = $vTipoI = $vTipoN = false;
              $dueno = $row['Persona_idPersona'];
              $colorORG = $row['color'];
              $id = $row['idAve'];
              $descripcionORG = $row['Descripcion'];
              $nombreORG = $row['nombre_album'];
              $cantonORG = $row['Canton_idCanton'];
              $especieORG = $row['Especie_idEspecie'];
              $sql2 = "SELECT ZonaVida_idZonaVida, Tamano_idTamano, Tiempo_incubacion_idTiempo_incubacion, Tipo_Nido_idTipo_Nido, numero_huevos_idnumero_huevos, Tipo_iincubacion_idTipo_incubacion, Tipo_Huevos_idTipo_Huevos, Forma_Pico_idForma_Pico, Genero_idGenero, Nombre_cientifico, idEspecie FROM especie WHERE idEspecie = ".$especieORG;
              $sqlresult2 = mysqli_query($dbhandle, $sql2);
              $row2 = mysqli_fetch_assoc($sqlresult2);
              $generoORG = $row['Genero_idGenero'];
              $sql3 = "";

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
              if($canton==0 or $canton==$row['Canton_idCanton']){
                $vCanton = true;
              }
              if($nombre==0 or $nombre==$nombreORG){
                $vNombre = true;
              }
              if($especie==0 or $especie==$row['idEspecie']){
                $vEspecie = true;
              }
              if($familia==0 or $familia==true){   //////////////////////////////////////////////////////////
                $vFamilia = true;
              }
              if($genero==0 or $genero==$row['Genero_idGenero']){
                $vGenero = true;
              }
              if($nombreC==0 or $nombreC==true){   //////////////////////////////////////////////////////////
                $vNombreC = true;
              }
              if($nombreI==0 or $nombreI==true){   //////////////////////////////////////////////////////////
                $vNombreI = true;
              }
              if($orden==0 or $orden==true){       //////////////////////////////////////////////////////////
                $vOrden = true;
              }
              if($provincia==0 or $provincia==true){////////////////////////////////////////////////////////
                $vProvincia = true;
              }
              if($suborden==0 or $suborden==true){ /////////////////////////////////////////////////////////
                $vSuborden = true;
              }
              if($tiempoI==0 or $tiempoI==$row['Tiempo_incubacion_idTiempo_incubacion']){
                $vGenero = true;
              }
              if($tipoH==0 or $tipoH==$row['Tipo_Huevos_idTipo_Huevos']){
                $vTipoH = true;
              }
              if($tipoI==0 or $tipoI==$row['Tipo_iincubacion_idTipo_incubacion']){
                $vTipoI = true;
              }
              if($tipoN==0 or $tipoN==$row['Tipo_Nido_idTipo_Nido']){
                $vTipoN = true;
              }

              if($vPico==true && $vColor==true && $vCHUevos==true && $vZona==true && $vTamano==true && $vPersona==true && $vCanton==true && $vNombre==true && $vEspecie==true && $vFamilia==true && $vGenero==true && $vNombreC==true && $vNombreI==true && $vOrden==true && $vProvincia==true && $vSuborden==true && $vTiempoI==true && $vTipoH==true && $vTipoI==true && $vTipoN==true){
                $counter++;
                $sql3 = "SELECT url FROM foto WHERE Ave_idAve = ".$id;
                $sqlresult3 = mysqli_query($dbhandle, $sql3);
                $row3 = mysqli_fetch_assoc($sqlresult3);
                echo "<script type='text/javascript'>document.getElementById('fotos').innerHTML = document.getElementById('fotos').innerHTML + '<div class=\"col-sx-6 col-md-4\"><div class=\"thumbnail\"><img src=\"".$row3['url']."\" alt=\"Not found\"><div class=\"caption\"><h3>".$nombreORG."</h3><p>".$descripcionORG."</p><button type=\"button\" id=\"album\" class=\"btn btn-lg btn-info btn-block\" type=\"submit\" value=\"".$nombreORG."\">Ver Album</button></div></div></div>'</script>\n";
              }
            }
          }
          if($counter==0){
            echo "<script type='text/javascript'>document.getElementById('fotos').innerHTML = document.getElementById('fotos').innerHTML + '<h3>No hubo resultados.</h3>'</script>";
          }
        }
      }
    ?>
  </body>
</html>