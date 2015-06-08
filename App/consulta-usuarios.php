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

    <?php
      $a = $o = $n = $ap = $s = $f = $d = false;
      $username = "Administrador";
      $password = "Admin13";
      $hostname = "186.176.166.148:3306";
      $myDB = "hidden_bird";
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['Afficionado'])){
          $a = true;
        }
        if(isset($_POST['Ornitologo'])){
          $o = true;
        }
        $sql = "SELECT Username";
        if(isset($_POST['Nombre'])){
          $n = true;
          $sql .= ", Nombre";
        }
        if(isset($_POST['Apellido'])){
          $ap = true;
          $sql .= ", Apellido";
        }
        if(isset($_POST['Sexo'])){
          $s = true;
          $sql .= ", Sexo";
        }
        if(isset($_POST['fNac'])){
          $f = true;
          $sql .= ", Fecha_Nacimiento";
        }
        if(isset($_POST['Direccion'])){
          $d = true;
          $sql .= ", Direccion";
        }

        $sql .= " FROM persona WHERE Tipo_usuario_idTipo_usuario ";
        if($a==true && $o==true){
          $sql.= "<> 3";
        }else{
          if($a==true){
            $sql .= "= 1";
          }else{
            if($o==true){
              $sql .= "= 2";
            }else{
              $sql .= "= 3";
            }
          }
        }
        $sql .= " ORDER BY Username;";
        $dbhandle = mysqli_connect($hostname, $username, $password, $myDB); 
        if(!$dbhandle){
          echo "Conexión fallida: " . mysqli_conect_error();
        }else{
          echo $sql;
          $sqlresult = mysqli_query($dbhandle, $sql);
          while($row = mysqli_fetch_assoc($sqlresult)){
            echo "<script type='text/javascript'>document.getElementById('personas').innerHTML = document.getElementById('personas').innerHTML + '<div class=\"col-sx-6 col-md-4\"><div class=\"thumbnail\"><div class=\"caption\">";
            if($n){
              echo "<h4>Nombre: '".$row['Nombre']."'</h4>";
            }
            if($ap){
              echo "<h4>Apellido: '".$row['Apellido']."'</h4>";
            }
            if($s){
              echo "<h4>Sexo: '".$row['Sexo']."'</h4>";
            }
            if($f){
              echo "<h4>Fecha de Nacimiento: '".$row['Fecha_Nacimiento']."'</h4>";
            }
            if($d){
              echo "<h4>Dirección: '".$row['Direccion']."'</h4>";
            }
            if($row['Tipo_usuario_idTipo_usuario']=1){
              echo "<h4>Tipo de usuario: Aficionado</h4>";
            }
            if($row['Tipo_usuario_idTipo_usuario']=2){
              echo "<h4>Tipo de usuario: Ornitólogo</h4>";
            }
            if($row['Tipo_usuario_idTipo_usuario']=3){
              echo "<h4>Tipo de usuario: Administrador</h4>";
            }
            echo "</div></div></div>'</script>";
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
    
    <div class="contaier" style="width:600px;margin:auto;">
      <form id="form" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <h1 class="text-center">Usuarios registrados</h1>
        <div class="form-group">
          <label>Tipo de usuario:</label><br>
          <label class="checkbox-inline"><input type="checkbox" name="Aficionado" value="1" checked>Aficionado</label>
          <label class="checkbox-inline"><input type="checkbox" name="Ornitologo" value="2">Ornitólogo</label>
        </div>
        <div class="form-group">
          <label>Datos a mostrar:</label><br>
          <label class="checkbox-inline"><input type="checkbox" name="Nombre" value="Nombre">Nombre</label>
          <label class="checkbox-inline"><input type="checkbox" name="Apellido" value="Apellido">Apellido</label>
          <label class="checkbox-inline"><input type="checkbox" name="Sexo" value="Sexo">Sexo</label>
          <label class="checkbox-inline"><input type="checkbox" name="fNac" value="Fecha_Nacimiento">Fecha de nacimento</label>
          <label class="checkbox-inline"><input type="checkbox" name="Direccion" value="Direccion">Dirección</label>
        </div>
        <button id="busqueda" class="btn btn-lg btn-primary btn-block" type="submit">Busqueda</button>
      </form>
      
      <div id="personas">
      
      </div> 
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/consulta-usuarios.js"></script>
    
  </body>
</html>