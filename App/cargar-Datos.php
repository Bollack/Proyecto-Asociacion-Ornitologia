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

      
      echo "<script type='text/javascript'>alert()</script>";

      error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);

        define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

        /** Include PHPExcel */
        require_once dirname(__FILE__) . '/../Classes/PHPExcel/IOFactory.php';

        /*Funciones que se activarán dependiendo de la opción que haya elegido
          el usuario. Cada una se activa para cada tablar a importar.
        */
        function orden_import(PHPExcel $mainObject)
        {
          $nombreArchivo ="OrdenAves_HiddenBird";
          $descripcionArchivo = "En este archivo xlsx se encuentran los datos necesarios para cargar en otra base de datos
                                 los datos de la tabla Orden."
          $mainObject->getProperties()->setCreator("Hidden Bird")
                       ->setLastModifiedBy("Hidden Bird")
                       ->setTitle($nombreArchivo)
                       ->setSubject($nombreArchivo)
                       ->setDescription($descripcionArchivo)
                       ->setKeywords("Progra_Bases_Good_Night")
                       ->setCategory("Data export");
          $mainObject->getActiveSheet()->setTitle($nombreArchivo);
          $mainObject->setActiveSheetIndex(0);

          $hojaActual$mainObject->worksheet
                  foreach ($worksheet->getRowIterator() as $row) {
            echo '    Row number - ' , $row->getRowIndex() , EOL;

            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
            foreach ($cellIterator as $cell) {
              if (!is_null($cell)) {
                echo '        Cell - ' , $cell->getCoordinate() , ' - ' , $cell->getCalculatedValue() , EOL;
              }
            }
          }
        }






        */
        // Create new PHPExcel object
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $objPHPExcel = $objReader->load("05featuredemo.xlsx");




        // Add some data
        echo date('H:i:s') , " Add some data" , EOL;
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'persona_id')
                    ->setCellValue('B1', 'nombre')
                    ->setCellValue('C1', 'Apellido')
                    ->setCellValue('D1', 'Good Night')
                    ->setCellValue('E1', 'Tipo_usuario_id');



        $objPHPExcel->getActiveSheet()->setCellValue('A8',"Hello\nWorld");
        $objPHPExcel->getActiveSheet()->getRowDimension(8)->setRowHeight(-1);
        $objPHPExcel->getActiveSheet()->getStyle('A8')->getAlignment()->setWrapText(true);



        // Rename worksheet
        echo date('H:i:s') , " Rename worksheet" , EOL;
        $objPHPExcel->getActiveSheet()->setTitle('Simple');


        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=$nombreArchivo');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Fri, 9 Aug 1996 03:10:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;





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