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


          
        function orden_import()
        {
          $mainObject = new PHPExcel();

          foreach($mainObject->getWorksheetIterator()->getRowIterator() as $row) {

            echo '    Row number - ' , $row->getRowIndex() , EOL;

            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
            foreach ($cellIterator as $cell) {
              if (!is_null($cell)) {
                echo 'Cell - ' , $cell->getCoordinate() , ' - ' , $cell->getCalculatedValue() , EOL;
                }
              }
            }
          }
            $username = "Administrador";
            $password = "Admin13";
            $hostname = "186.176.166.148:3306";
            $myDB = "hidden_bird";
            $dbhandle = mysqli_connect($hostname, $username, $password, $myDB); 
            if(!$dbhandle){
                echo "<script type='text/javascript'>alert( 'Conexión Fallida. Intente de nuevo más tarde: mysqli_connect()->error')</script>";
            }else{
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
  
    
      <div class="contaier" style="width:600px;margin:auto;">
        <form id="form" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
          <h1 class="text-center">Importación de datos</h1>

          <div class="form-group">
              <h4 class="text-center">En esta sección de la aplicación se permite realizar la carga a partir de archivos .xlsx de datos provenientes de otras bases de datos. </h4>
          </div>
          <div class="form-group">
          <label for="Nombre">Seleccione el archivo .xls del cual desea extraer los datos a importar:</label>
          <form name="album"  class="form-nAlbum form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input id="lefile" type="file" accept=".xls,.xlsx" style="display:none">
            <div class="input-append">
            <input id="archivoExcel" class="input-large" type="text">
            <div class="form-group">
            <!--<button id="bRegistro" onclick="$('input[id=lefile]').click();" class="btn btn-lg btn-primary btn-block"  type="submit">Buscar archivo</button> -->
              <a class="btn" onclick="$('input[id=lefile]').click();">Seleccionar archivo</a>  
              <script type="text/javascript">
              $('input[id=lefile]').change(function() {
                                  $('#archivoExcel').val($(this).val());
                                  });
              </script>
            </div> 

          <div class="form-group">
              <form id="form" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                  <label>Seleccione una tabla que desea importar de un archivo xlsx y así poder ser insertada en la base de datos:</label><br>
                  <label class="radio-inline"><input type="radio" name="Importacion" value="Orden">Orden</label>
                  <label class="radio-inline"><input type="radio" name="Importacion" value="Suborden">Suborden</label>
                  <label class="radio-inline"><input type="radio" name="Importacion" value="Familia">Familia</label>
                  <label class="radio-inline"><input type="radio" name="Importacion" value="Genero">Género</label>
                  <label class="radio-inline"><input type="radio" name="Importacion" value="Especie">Especie</label>
                  <label class="radio-inline"><input type="radio" name="Importacion" value="Cantidad_huevos" checked>Cantidad de huevos</label>
                  <label class="radio-inline"><input type="radio" name="Importacion" value="Zona_vida">Zonas de vida</label>
                  <label class="radio-inline"><input type="radio" name="Importacion" value="Color">Color</label>
                  <label class="radio-inline"><input type="radio" name="Importacion" value="PajaroXPersona">Aves o álbumes de cada persona</label>
                  <label class="radio-inline"><input type="radio" name="Importacion" value="Persona">Personas</label>
                  <label class="radio-inline"><input type="radio" name="Importacion" value="Usuarios">Usuarios</label>
                  <label class="radio-inline"><input type="radio" name="Importacion" value="Telefonos">Teléfonos</label>
                  <label class="radio-inline"><input type="radio" name="Importacion" value="Correo">Correo</label>
                  <label class="radio-inline"><input type="radio" name="Importacion" value="Fotos">Fotos</label>
          </div>
          <button id="importacion" class="btn btn-lg btn-primary btn-block" type="submit">Iniciar importación </button>
        
        
        <div id="consola">
          
        </div> 



  </body>
</html>