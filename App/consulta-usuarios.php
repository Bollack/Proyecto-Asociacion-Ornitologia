<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consulta usuarios</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/consulta-usuarios.css" rel="stylesheet">
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
    
    <div class="container" style="width:600px;margin:auto;">
      <form id="form" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <h1 class="text-center">Búsqueda de usuarios registrados</h1>
        <label>Tipo de usuario:</label><br>
        <div class="form-group">          
          <label class="checkbox-inline"><input type="checkbox" name="Aficionado" id="Aficionado" value="1" checked>Aficionado</label>
          <label class="checkbox-inline"><input type="checkbox" name="Ornitologo" id="Ornitologo" value="2">Ornitólogo</label>
        </div>
        <div class="form-group">
          <label>Datos a mostrar:</label><br>
          <label class="checkbox-inline"><input type="checkbox" name="Nombre" id="Nombre" value="Nombre">Nombre</label>
          <label class="checkbox-inline"><input type="checkbox" name="Apellido" id="Apellido" value="Apellido">Apellido</label>
          <label class="checkbox-inline"><input type="checkbox" name="Sexo" id="Sexo" value="Sexo">Sexo</label>
          <label class="checkbox-inline"><input type="checkbox" name="fNac" id="fNac" value="Fecha_Nacimiento">Fecha de nacimiento</label>
          <label class="checkbox-inline"><input type="checkbox" name="Direccion" id="Direccion" value="Direccion">Dirección</label>
        </div>
        <button id="busqueda" class="btn btn-lg btn-primary btn-block" type="submit">Buscar</button>
      </form>

    </div class="container">
      <div id="personas" style="margin: auto;margin-top:10px; width:600px;" class="text-center">
              
      </div> 
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/consulta-usuarios.js"></script>
    
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
      $afficionado = $ornitologo = $nombre = $apellido = $sexo = $fecha = $direccion = 0;
      $username = "Administrador";
      $password = "Admin13";
      $hostname = "186.176.166.148:3306";
      $myDB = "hidden_bird";
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $dbhandle = mysqli_connect($hostname, $username, $password, $myDB); 
        if(!$dbhandle){
          echo "Conexión fallida: " . mysqli_conect_error();
        }else{
          echo "<script type='text/javascript'>document.getElementById('personas').innerHTML = document.getElementById('personas').innerHTML + '<h1>Usuarios encontrados:</h1>'</script>";
          $sql = "SELECT idPersona, Username, Tipo_usuario_idTipo_usuario";
          if(isset($_POST['Aficionado'])){
            $afficionado = 10;
          }
          if(isset($_POST['Ornitologo'])){
            $ornitologo = 10;
          }
          if(isset($_POST['Nombre'])){
            $nombre = 10;
            $sql .= ", Nombre";
          }
          if(isset($_POST['Apellido'])){
            $apellido = 10;
            $sql .= ", Apellido";
          }
          if(isset($_POST['Sexo'])){
            $sexo = 10;
            $sql .= ", Sexo";
          }
          if(isset($_POST['fNac'])){
            $fecha = 10;
            $sql .= ", Fecha_Nacimiento";
          }
          if(isset($_POST['Direccion'])){
            $direccion = 10;
            $sql .= ", Direccion";
          }
          $sql .= " FROM persona WHERE Tipo_usuario_idTipo_usuario ";
          if($afficionado==10 && $ornitologo==10){
            $sql.= "<> 3";
          }else{
            if($afficionado==10){
              $sql .= "= 1";
            }else{
              if($ornitologo==10){
                $sql .= "= 2";
              }else{
                $sql .= "= 3";
              }
            }
          }
        $sql .= " ORDER BY Username";
          $script = "";
          $sqlresult = mysqli_query($dbhandle, $sql);
          $counter = 0;
          while($row = mysqli_fetch_assoc($sqlresult)){
            $counter++;
            $script = "<script type='text/javascript'>document.getElementById('personas').innerHTML = document.getElementById('personas').innerHTML + '<div style=\"width:600px;\" class=\"col-sx-6 col-md-4 persona\" value=\"".$row['idPersona']."\"><div class=\"thumbnail\"><div class=\"caption\"><button type=\"button\" class=\"btn btn-lg btn-info btn-block persona\" type=\"submit\" value=\"".$row['idPersona']."\"> Usuario:".$row['Username']."<br>";
            if($nombre==10){
              $script .=  "Nombre: ".$row['Nombre']."<br>";
            }
            if($apellido==10){
              $script .=  "Apellido: ".$row['Apellido']."";
            }
            if($sexo==10){
              $script .=  "Sexo: ".$row['Sexo']."<br>";
            }
            if($fecha==10){
              $script .=  "Fecha de Nacimiento: ".$row['Fecha_Nacimiento']."<br>";
            }
            if($direccion==10){
              $script .=  "Dirección: ".$row['Direccion']."<br>";
            }
            if($row['Tipo_usuario_idTipo_usuario']==1){
              $script .=  "Tipo de usuario: Aficionado";
            }
            if($row['Tipo_usuario_idTipo_usuario']==2){
              $script .=  "Tipo de usuario: Ornitólogo";
            }
            if($row['Tipo_usuario_idTipo_usuario']==3){
              $script .=  "Tipo de usuario: Administrador";
            }
            $script .=  "</button></div></div></div>'</script>";
            echo $script;
          }
          if($counter==0){
            echo "<script type='text/javascript'>document.getElementById('personas').innerHTML = document.getElementById('personas').innerHTML + '<h4>No se encontraron resultados para su busqueda.</h4>'</script>";
          }
        }
      }
    ?>

  </body>
</html>