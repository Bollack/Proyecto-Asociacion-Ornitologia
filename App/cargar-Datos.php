<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Migración de datos a la base de Hidden Bird</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/consulta-albumes.css" rel="stylesheet">
    <script src="js/main.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/consulta-albumes.js"></script>
  </head>
  <body>

    <?php




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
      <h2 class="text-center">Good Night</h2>
      <div class="form-group">
          <label for="Nombre">Seleccione el archivo .xls del cual desea extraer los datos a importar:</label>
          <form name="album"  class="form-nAlbum form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input id="lefile" type="file" accept=".xls,.xlsx" style="display:none">
            <div class="input-append">
            <input id="archivoExcel" class="input-large" type="text">

            <button id="bRegistro" class="btn btn-lg btn-primary btn-block" type="submit">Subir álbum</button>
            <a class="btn" onclick="$('input[id=lefile]').click();">Seleccionar archivo</a>
        
     
            <script type="text/javascript">
              $('input[id=lefile]').change(function() {
                                  $('#archivoExcel').val($(this).val());
                                  });
            </script>
      </div> 
      <div class="form-group">
            <label for="TablatoExport">Escoja la tabla que desea importar:</label>
            <select class="form-control" id="TablatoExport" name="TablatoExport">
            </select>
          </div>   
      </div>
    </div>
    
  </body>
</html>