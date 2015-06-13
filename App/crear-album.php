<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creación álbum</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/crear-album.css" rel="stylesheet">
  </head>
  <body>

    <?php
    session_start();

    $nombre = $errNombre = $especie = $color = $provincia = $canton = $foto1 = $errFoto = $descripcion = $result = $script = "";
    $username = "Usuario";
    $password = "user123E";
    $hostname = "186.176.166.148:3306";
    $myDB = "hidden_bird";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      if(empty($_POST["Nombre"])){
        $errNombre = "Escriba un nombre para el álbum.";
      }else{
        $nombre = $_POST["Nombre"];
      }
      if(empty($_POST["Foto1"])){
        $errFoto = "El álbum no se puede crear vacio.";
      }
      $descripcion = $_POST["Descripcion"];
      $especie = $_POST["Especie"];
      $color = $_POST["Color"];
      $provincia = $_POST["Provincia"];
      $canton = $_POST["Canton"];
      $fCounter = $_POST["cantFotos"];
      echo $fCounter;
      if(!$errNombre && !$errFoto){
        $dbhandle = mysqli_connect($hostname, $username, $password, $myDB); 
        if(!$dbhandle){
          echo "Conexión fallida: " . mysqli_conect_error();
        }else{
          $sql ="SELECT idEspecie FROM especie WHERE Nombre_cientifico = '".$especie."'";
          $result = mysqli_query($dbhandle, $sql);
          $row = mysqli_fetch_assoc($result);
          $especieId = $row['idEspecie'];

          $sql = "SELECT idCanton FROM canton WHERE Canton ='".$canton."'";
          $result = mysqli_query($dbhandle, $sql);
          $row = mysqli_fetch_assoc($result);
          $cantonId = $row['idCanton'];
          /*
          $sql = "SELECT Color_id FROM color WHERE Color ='".$color."'";
          $result = mysqli_query($dbhandle, $sql);
          $row = mysqli_fetch_assoc($result);
          $colorId = $row['Color_id'];
          */
          $sql = "CALL insert_ave_album  ( '".$_SESSION['usuario']."', '".$nombre."', '".$descripcion."', '".$especie."', '".$canton."', '".$color."');";
          #$sql = "INSERT INTO ave (Descripcion, usuario_creacion, usuario_modificacion, Especie_idEspecie, Persona_idPersona, Canton_idCanton, nombre_album, color) VALUES ('".$descripcion."', '".$_SESSION['usuario']."', '".$_SESSION['usuario']."', ".$especieId.", ".$_SESSION['idPersona'].",".$cantonId.", '".$nombre."',".$colorId.")";
          echo $sql;
          if (mysqli_query($dbhandle, $sql)) {
            $sql = "SELECT idAve FROM ave WHERE nombre_album='".$nombre."'";
            $result = mysqli_query($dbhandle, $sql);
            $row = mysqli_fetch_assoc($result); 
            $id = $row["idAve"];

            $sql = "";
            $count = 1;
            while ($count<$fCounter) {

              #$sql.="CALL "
              $sql .= "INSERT INTO foto (descripcion, usuario_creacion, usuario_modificacion, url, Ave_idAve) VALUES ('".$_POST['Desc'.$count]."','".$_SESSION["usuario"]."','".$_SESSION["usuario"]."','".$_POST['Foto'.$count]."',".$id.");";
              $count++;
            }
            if(mysqli_multi_query($dbhandle,$sql)){
              echo "Se registro el usuario exitosamente";
              mysqli_close($dbhandle);
              echo "<script type=\"text/javascript\">document.location.href=\"crear-album.php\";</script>";
            }else{
              echo "Error: " . $sql . "<br>" . mysqli_error($dbhandle);
              $sql = "DELETE FROM ave WHERE nombre_album = '".$nombre."'";
              if(mysqli_query($dbhandle,$sql)){
                echo "No se logro insertar el usuario";
              }else{
                echo "Error deleting record: " . mysqli_error($dbhandle);
              }
            }
          }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($dbhandle);
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
    
    <div class="container">
      <form name="albumForm"  class="form-nAlbum form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h2 class="text-center">Crear álbum</h2>
        <h5>En esta sección usted puede crear un álbum de fotografías de un ave que fotografió. Ingrese el cantón donde logró fotografiar a dicha ave
          (seleccionado primero la provincia), así como la especie de la misma y los colores que pudo ver en ella. Puede añadir otras fotografías  del ave posteriormente.</h5>
        <div class="form-group">
          <label for="Nombre">Nombre:</label>
          <input name="Nombre" type="text" id="Nombre" class="form-control" placeholder="Nombre" required>
        </div>
        <div class="form-group">
          <label for="Especie">Especie Ave:</label>
          <select class="form-control" id="Especie" name="Especie">
          </select>
        </div>
        <div class="form-group">
          <label for="Color">Color Primario:</label>
          <select class="form-control" id="Color" name="Color">
          </select>
        </div>
        <div class="form-group">
          <label for="Provincia">Provincia:</label>
          <select class="form-control" id="Provincia" name="Provincia">
          </select>
        </div>
        <div class="form-group">
          <label for="Canton">Cantón:</label>
          <select class="form-control" id="Canton" name="Canton">
          </select>
        </div>
        <div id="fotos">
          <div class="form-group">
            <label for="Foto1">Foto 1:</label>
            <input type="text" id="Foto1" name ="Foto1" class="form-control" placeholder="URL//" required>
          </div>
          <div class="form-group">
            <label for="Desc1">Descripción de foto 1:</label>
            <input type="text" id="Desc1" name="Desc1" class="form-control" placehalder="">
          </div>
        </div>
        <h4 id="agFoto" class="btn-info text-center" style="height:25px; font-weight:bold; color: white; border-radius: 10px; padding-top:2px">Agregar Foto</h4>
        <input type="hidden" name="cantFotos" id="cantFotos" value="">
        <div class="form-group">
          <label for="Descripcion">Descripción del álbum:</label>
          <textarea class="form-control" rows="5" id="Descripcion" name="Descripcion"></textarea>
        </div>
        <button id="bRegistro" class="btn btn-lg btn-primary btn-block" type="submit">Subir álbum</button>
      </form>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/crear-album.js"></script>
    <?php
      $usuario = $errUsuario = $contraseña = $errPassword = $errNombre = $nombre = $errApellido = $apellido = $errFNac = $fNac = $errDireccion = $direccion = $errCorreo = $correo1 = $errTelefono = $telefono1 = $sexo = $tipo = $result = $script = "";
      $username = "Usuario";
      $password = "user123E";
      $hostname = "186.176.166.148:3306";
      $myDB = "hidden_bird";
      $dbhandle = mysqli_connect($hostname, $username, $password, $myDB); 
      if(!$dbhandle){
        $result = "Conexión fallida: " . mysqli_connect_error();
      }else{
        $sql = "SELECT Nombre_cientifico FROM especie";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $especie = $row['Nombre_cientifico'];
            echo "<script type=\"text/javascript\">document.getElementById('Especie').innerHTML = document.getElementById('Especie').innerHTML + \"<option value='".$especie."'>".$especie."</option>\"</script>";
          }
        }

        $sql = "SELECT Color FROM color";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $color = $row['Color'];
            echo "<script type=\"text/javascript\">document.getElementById('Color').innerHTML = document.getElementById('Color').innerHTML + \"<option value='".$color."'>".$color."</option>\"</script>";
          }
        }

        $sql = "SELECT Provincia FROM provincia";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $provincia = $row['Provincia'];
            echo "<script type=\"text/javascript\">document.getElementById('Provincia').innerHTML = document.getElementById('Provincia').innerHTML + \"<option value='".$provincia."'>".$provincia."</option>\"</script>";
          }
        }

        $sql = "SELECT Canton FROM Canton WHERE Provincia_idProvincia = 1";
        $sqlresult = mysqli_query($dbhandle, $sql);
        if(mysqli_num_rows($sqlresult)>0){
          while($row = mysqli_fetch_assoc($sqlresult)){
            $canton = $row['Canton'];
            echo "<script type=\"text/javascript\">document.getElementById('Canton').innerHTML = document.getElementById('Canton').innerHTML + \"<option value='".$canton."'>".$canton."</option>\"</script>";
          }
        }
        mysqli_close($dbhandle);
      }
      ?>
    
  </body>
</html>