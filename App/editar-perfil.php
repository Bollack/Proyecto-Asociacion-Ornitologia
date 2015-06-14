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
    <div class="container"style="width:600px;margin:auto;">
      <form name="registro" class="form-registro form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h2 class="text-center">Editar datos</h2>
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
    <script src="js/editar-perfil.js"></script>
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
    ?>
  </body>
</html>