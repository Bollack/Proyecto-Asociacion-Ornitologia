<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/registro.css" rel="stylesheet">
  </head>
  <body>

    <?php
      session_start();
      
      $usuario = $errUsuario = $contraseña = $errPassword = $errNombre = $nombre = $errApellido = $apellido = $errFNac = $fNac = $errDireccion = $direccion = $errCorreo = $correo1 = $errTelefono = $telefono1 = $sexo = $tipo = $result = $script = "";
      $username = "Administrador";
      $password = "Admin13";
      $hostname = "186.176.166.148:3306";
      $myDB = "hidden_bird";
      if($_SERVER["REQUEST_METHOD"] == "POST"){
      if(empty($_POST["Usuario"])){
        $errUsuario = "Escriba su usuario";
      }else{
        $usuario = $_POST["Usuario"];
      }
      if(empty($_POST["Password"])){
        $errPassword = 'Escriba su contraseña';
      }else{
        $contraseña = md5($_POST["Password"]);
      }
      if(empty($_POST["Nombre"])){
        $errNombre = 'Escriba su nombre';
      }else{
        $nombre = $_POST["Nombre"];
      }
      if(empty($_POST["Apellido"])){
        $errApellido = 'Escriba su apellido';
      }else{
        $apellido = $_POST["Apellido"];
      }
      if(empty($_POST["fNac"])){
        $errFNac = 'Ingrese su fecha de nacimiento';
      }else{
        $fNac = $_POST["fNac"];
      }
      if(empty($_POST["Direccion"])){
        $errDireccion = 'Ingrese su direccion';
      }else{
        $direccion = $_POST["Direccion"];
      }
      if(empty($_POST["Correo1"])){
        $errCorreo = 'Ingrese por lo menos un correo';
      }else{
        $correo1 = $_POST["Correo1"];
      }
      if(empty($_POST["Telefono1"])){
        $errTelefono = 'Ingrese por lo menos un teléfono';
      }else{
        $telefono1 = $_POST["Telefono1"];
      }
      if($_POST['tUsuario']= "Aficionado"){
        $tipo = 1;
      }else{
        $tipo = 2;
      }      
      $sexo = $_POST['sexo'];
      $tCounter = $_POST['cantTelefonos'];
      $cCounter = $_POST['cantCorreos'];
      if(!$errUsuario && !$errPassword && !$errNombre && !$errTelefono && !$errCorreo && !$errApellido && !$errDireccion && !$errFNac){
        $dbhandle = mysqli_connect($hostname, $username, $password, $myDB); 
        if(!$dbhandle){
          echo "Conexión fallida: " . mysqli_conect_error();
        }else{
          $sql = "SELECT idPersona FROM persona WHERE Username = '".$usuario."'";
          $result = mysqli_query($dbhandle, $sql);
          if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result); 
            $id = $row["idPersona"];
          }
          $sql = "INSERT INTO persona (Username, Password, Nombre, Apellido, Sexo, Fecha_Nacimiento, Direccion, Tipo_usuario_idTipo_usuario) VALUES ('".$usuario."', '".$contraseña."', '".$nombre."', '".$apellido."', '".$sexo."', '".$fNac."', '".$direccion."', ".$tipo.")";
          if (mysqli_query($dbhandle, $sql)) {
            $sql = "SELECT idPersona FROM persona WHERE Username = '".$usuario."'";
            $result = mysqli_query($dbhandle, $sql);
            if (mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result); 
              $id = $row["idPersona"];
            }
            $sql = "";
            $count = 1;
            while($count<$tCounter){
              //$sql .= "INSERT INTO telefono (telefono, propietario_linea, usuario_creacion, usuario_modificacion) VALUES ('".$_POST['Telefono'.$count]."',".$id.",'".$usuario."','".$usuario."');";
              $sql.="CALL AddTelToUser(".$id.",'".$_POST['Telefono'.$count]."');";
              $count++;
            }
            $count = 1;
            while($count<$cCounter){
              //$sql .= "INSERT INTO correo (correo, Persona_idPersona, usuario_creacion, usuario_modificacion) VALUES ('".$_POST['Correo'.$count]."',".$id.",'".$usuario."','".$usuario."');";
              $sql.="CALL AddCorreoToUser(".$id.",'".$_POST['Correo'.$count]."');";
              $count++;
            }
            if (mysqli_multi_query($dbhandle, $sql)) {
              //echo "<script type='text/javascript'>alert('Se registro el usuario exitosamente')</script>";
              echo "Se registro el usuario exitosamente";
              mysqli_close($dbhandle);
              echo "<script type=\"text/javascript\">document.location.href=\"ingresar.php\";</script>";
            } else {
                //echo "<script type='text/javascript'>alert('Error: ".$sql."<br>".mysqli_error($dbhandle)."'')</script>";
                echo "Error: " . $sql . "<br>" . mysqli_error($dbhandle);
                $sql = "DELETE FROM persona where idPersona = ".$id;
                if (mysqli_query($dbhandle, $sql)) {
                  //echo "<script type='text/javascript'>alert('No se logro insertar el usuario')</script>";
                  echo "No se logro insertar el usuario";
                } else {
                  //echo "<script type='text/javascript'>alert('Error deleting record: ".mysqli_error($dbhandle)."'')</script>";
                  echo "Error deleting record: " . mysqli_error($dbhandle);
                }
            }
          } else {
            //echo "<script type='text/javascript'>alert('Error: ".$sql."<br>".mysqli_error($dbhandle)."'')</script>";
            echo "Error: " . $sql . "<br>" . mysqli_error($dbhandle);
          }
        } 
        mysqli_close($dbhandle);
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
    
    <div class="container">
      <form name="registro" class="form-registro form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h2 class="text-center">Registrarse</h2>
        <div class="form-group">
          <label for="Usuario">Usuario</label>
          <input type="text" id="Usuario" name="Usuario" class="form-control" placeholder="Usuario" required>
        </div>
        <div class="form-group">
          <label for="Password">Contraseña</label>
          <input type="password" id="Password" name="Password" class="form-control" placeholder="Password" required>
        </div>
        <div class="form-group">
          <label for="Nombre">Nombre</label>
          <input type="text" id="Nombre" name="Nombre" class="form-control" placeholder="Nombre" required>
        </div>
        <div class="form-group">
          <label for="Apellido">Apellido</label>
          <input type="text" id="Apellido" name="Apellido" class="form-control" placeholder="Apellido" required>
        </div>
        <div class="form-group">
          <label for="fNac">Fecha de Nacimiento</label>
          <input type="date" id="fNac" name="fNac" class="form-control" placeholder="dd/mm/yyyy" required>
        </div>
        <div class="form-group">
          <label for="Direccion">Dirección</label>
          <input type="text" id="Direccion" name="Direccion" class="form-control" placeholder="Dirección" required>
        </div>
        <div id="correos">
          <div class="form-group">
            <label for="Correo1">Correo 1</label>
            <input type="email" id="Correo1" name="Correo1" class="form-control" placeholder="Correo1" required>
          </div>
        </div>
        <h4 id="agCor" class="btn-info text-center" style="height:25px; font-weight:bold; color: white; border-radius: 10px; padding-top:2px">Agregar Correo</h4>
        <input type="hidden" name="cantCorreos" value="">
        <div id="telefonos">
          <div class="form-group">
            <label for="Telefono1">Teléfono 1</label>
            <input type="text" id="Telefono1" name="Telefono1" class="form-control" placeholder="Teléfono1" required>
          </div>
        </div>
        <h4 id="agTel" class="btn-info text-center" style="height:25px; font-weight:bold; color: white; border-radius: 10px; padding-top:2px">Agregar Teléfono</h4>
        <input type="hidden" name="cantTelefonos" value="">
        <div class="form-group">
          <label>Sexo</label><br>
          <label class="radio-inline"><input type="radio" name="sexo" value="Masculino" checked>Masculino</label>
          <label class="radio-inline"><input type="radio" name="sexo" value="Femenino">Femenino</label>
        </div>
        <div class="form-group">
          <label>Tipo de usuario</label><br>
          <label class="radio-inline"><input type="radio" name="tUsuario" value="Aficionado" checked>Aficionado</label>
          <label class="radio-inline"><input type="radio" name="tUsuario" value="Ornitólogo">Ornitólogo</label>
        </div>
        <button id="bRegistro" class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>
      </form>
    </div>

    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/registro.js"></script>
  </body>
</html>