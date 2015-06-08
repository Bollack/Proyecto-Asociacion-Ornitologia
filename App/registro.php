<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/registro.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/registro.js"></script>
    <script src="js/main.js"></script>
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
          <a class="navbar-brand" href="">Hidden Bird</a>
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
          </ul>

          <ul class="nav navbar-nav navbar-right" id="der-nav">
            <li><a href="registro.php">Registrarse</a></li>
            <li style="margin-top:8px;"><button type="button" class="btn btn-default">Log Out</button></li>
          </ul>
        </div>
      </div>
    </nav>
    
    <div class="container">
      <form class="form-registro form-horizontal">
        <h2 class="text-center">Registrarse</h2>
        <div class="form-group">
          <label for="Usuario">Usuario</label>
          <input type="text" id="Usuario" class="form-control" placeholder="Usuario" required>
        </div>
        <div class="form-group">
          <label for="Password">Contraseña</label>
          <input type="password" id="Password" class="form-control" placeholder="Password" required>
        </div>
        <div class="form-group">
          <label for="Nombre">Nombre</label>
          <input type="text" id="Nombre" class="form-control" placeholder="Nombre" required>
        </div>
        <div class="form-group">
          <label for="Apellido">Apellido</label>
          <input type="text" id="Apellido" class="form-control" placeholder="Apellido" required>
        </div>
        <div class="form-group">
          <label for="fNac">Fecha de Nacimiento</label>
          <input type="date" id="fNac" class="form-control" placeholder="Fecha de Nacimiento" required>
        </div>
        <div class="form-group">
          <label for="Direccion">Dirección</label>
          <input type="text" id="Direccion" class="form-control" placeholder="Dirección" required>
        </div>
        <div id="correos">
          <div class="form-group">
            <label for="Correo1">Correo 1</label>
            <input type="email" id="Correo1" class="form-control" placeholder="Correo1" required>
          </div>
        </div>
        <div class="form-group"><button id="agCor" class="btn btn-info">Agregar Correo</button></div>
        <div id="telefonos">
          <div class="form-group">
            <label for="Telefono1">Teléfono 1</label>
            <input type="text" id="Telefono1" class="form-control" placeholder="Teléfono1" required>
          </div>
        </div>
        <div class="form-group"><button id="agTel" class="btn btn-info">Agregar Teléfono</button></div>
        <div class="form-group">
          <label>Sexo</label><br>
          <label class="radio-inline"><input type="radio" name="sexo" checked>Masculino</label>
          <label class="radio-inline"><input type="radio" name="sexo">Femenino</label>
        </div>
        <div class="form-group">
          <label>Tipo de usuario</label><br>
          <label class="radio-inline"><input type="radio" name="tUsuario" checked>Aficionado</label>
          <label class="radio-inline"><input type="radio" name="tUsuario">Ornitólogo</label>
        </div>
        <button id="bRegistro" class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>
      </form>
    </div>

    
  </body>
</html>