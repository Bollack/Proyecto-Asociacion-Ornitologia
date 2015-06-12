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
/*
    
      <?php

        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);

        if (PHP_SAPI == 'cli')
          die('This example should only be run from a Web Browser');

        /** Include PHPExcel */
        require_once dirname(__FILE__) . '/Classes/PHPExcel.php';


          
        function orden_export()
        {
            $username = "Administrador";
            $password = "Admin13";
            $hostname = "186.176.166.148:3306";
            $myDB = "hidden_bird";
            $conectado = mysqli_connect($hostname, $username, $password, $myDB); 
          $mainObject = new PHPExcel();
          $nombreArchivo= "Orden_Datos_Hidden_Bird";
          $descripcionArchivo="Archivo que contiene datos de la tabla orden.";
          $mainObject->getProperties()->setCreator("Hidden Bird")
               ->setLastModifiedBy("Hidden Bird")
               ->setTitle($nombreArchivo)
               ->setSubject($nombreArchivo)
               ->setDescription($descripcionArchivo);
          $query = "SELECT idOrden, Orden, Clase_idClase FROM ORDEN;";
          $mainObject->setActiveSheetIndex(0)
            ->setCellValue('A1', 'ID')
            ->setCellValue('B1', 'Descripcion')
            ->setCellValue('C1', 'Id_clase');

          $sqlresult = mysqli_query($conectado, $query);
          $worksheet=$mainObject-> getSheet(0);
          $rowIterator= $worksheet->getRowIterator();
          $rowIterator->resetStart();
          $rowIterator->next();
          if ($sqlresult->num_rows>0)
          {

              while($row1 = mysqli_fetch_assoc($sqlresult)){
                    $row=$rowIterator->current();
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->current()->setCellValue($row1["idOrden"]);
                    $cellIterator->next();
                    $cellIterator->current()->setCellValue($row1["Orden"]);
                    $cellIterator->next();
                    $cellIterator->current()->setCellValue($row1["Clase_idClase"]);
                    $cellIterator->rewind();
                    $rowIterator->next();

              }
          }
          header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          header('Content-Disposition: attachment;filename="orden_tabla_HiddenBird.xlsx"');
          header('Cache-Control: max-age=0');
          // If you're serving to IE 9, then the following may be needed
          header('Cache-Control: max-age=1');

          // If you're serving to IE over SSL, then the following may be needed
          header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
          header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
          header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
          header ('Pragma: public'); // HTTP/1.0

          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
          $objWriter->save('php://output');
          echo "<script type='text/javascript'>alert( Exportación dada con éxito.')</script>";

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
                  if (!isset($_POST['Exportacion'])){
                      echo "<script type='text/javascript'>alert('Seleccione alguna opción de exportación.')</script>";
                  }else
                  {
                      $respuesta = $_POST['Exportacion'];
                      echo $respuesta;
                      if ($respuesta=="Orden")
                      {
                        orden_export();

                      }else if($respuesta=="Suborden")
                      {

                      }else if($respuesta=="Familia")
                      {

                      }else if($respuesta=="Genero")
                      {

                      }else if($respuesta=="Especie")
                      {

                      }else if($respuesta=="Cantidad_huevos")
                      {

                      }else if($respuesta=="Zona_vida")
                      {

                      }else if($respuesta=="Color")
                      {

                      }else if($respuesta=="PajaroXPersona")
                      {

                      }else if($respuesta=="Persona")
                      {

                      }else if($respuesta=="Usuarios")
                      {

                      }else if($respuesta=="Telefonos")
                      {

                      }else if($respuesta=="Correo")
                      {

                      }else{ //Telefono

                      }
                  }

                }else{

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
            <li><a href="tCatalogo.php">Tablas catálogo</a></li>
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
            <h1 class="text-center">Exportación de datos</h1>

            <div class="form-group">
                <h4 class="text-center">En esta sección de la aplicación se realiza la conversión de los datos de las tablas en la base de datos a archivos .xlsx(Microsoft Office Excel), permitiendo así que el administrador mantenga un respaldo de los datos en otro formato y que así este pueda ser compartido con otros usuarios o insertado en otras bases de datos.</h4>
            </div>
            <div class="form-group">
              <label>Seleccione una tabla que desea exportar como archivo xlsx y así poder ser leída por otras aplicaciones web similares:</label><br>
              <label class="radio-inline"><input type="radio" name="Exportacion" value="Orden">Orden</label>
              <label class="radio-inline"><input type="radio" name="Exportacion" value="Suborden">Suborden</label>
              <label class="radio-inline"><input type="radio" name="Exportacion" value="Familia">Familia</label>
              <label class="radio-inline"><input type="radio" name="Exportacion" value="Genero">Género</label>
              <label class="radio-inline"><input type="radio" name="Exportacion" value="Especie">Especie</label>
              <label class="radio-inline"><input type="radio" name="Exportacion" value="Cantidad_huevos" checked>Cantidad de huevos</label>
              <label class="radio-inline"><input type="radio" name="Exportacion" value="Zona_vida">Zonas de vida</label>
              <label class="radio-inline"><input type="radio" name="Exportacion" value="Color">Color</label>
              <label class="radio-inline"><input type="radio" name="Exportacion" value="PajaroXPersona">Aves o álbumes de cada persona</label>
              <label class="radio-inline"><input type="radio" name="Exportacion" value="Persona">Personas</label>
              <label class="radio-inline"><input type="radio" name="Exportacion" value="Usuarios">Usuarios</label>
              <label class="radio-inline"><input type="radio" name="Exportacion" value="Telefonos">Teléfonos</label>
              <label class="radio-inline"><input type="radio" name="Exportacion" value="Correo">Correo</label>
              <label class="radio-inline"><input type="radio" name="Exportacion" value="Fotos">Fotos</label>
            </div>
            <button id="busqueda" class="btn btn-lg btn-primary btn-block" type="submit">Iniciar exportación </button>
          </form>
          
          <div id="consola">
            
          </div> 