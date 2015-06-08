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
      require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';

      function ordenExport( mysqli_connect $conn)
      {
          $mainObject = new PHPExcel();
          $nombreArchivo ="OrdenAves_HiddenBird";
          $descripcionArchivo = "En este archivo xlsx se encuentran los datos necesarios para cargar en otra base de datos
                                 los datos de la tabla Orden."
          $mainObject->getProperties()->setCreator("Hidden Bird")
                       ->setLastModifiedBy("Hidden Bird")
                       ->setTitle("OrdenAves_HiddenBird")
                       ->setSubject("OrdenAves_HiddenBird")
                       ->setDescription("En este archivo xlsx se encuentran los datos necesarios para cargar en otra base de datos
                                 los datos de la tabla Orden.")
                       ->setKeywords("Progra_Bases_Good_Night")
                       ->setCategory("Data export");


      }







































      $username = "Administrador";
      $password = "Admin13";
      $hostname = "186.176.166.148:3306";
      $myDB = "hidden_bird";
      $dbhandle = mysqli_connect($hostname, $username, $password, $myDB); 
              if(!$dbhandle){
          echo "Conexión fallida: " . mysqli_conect_error();
        }else{





      // Create new PHPExcel object
      $objPHPExcel = new PHPExcel();

      // Set document properties
      $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
                     ->setLastModifiedBy("Maarten Balliauw")
                     ->setTitle("Office 2007 XLSX Test Document")
                     ->setSubject("Office 2007 XLSX Test Document")
                     ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                     ->setKeywords("office 2007 openxml php")
                     ->setCategory("Test result file");


      // Add some data
      $objPHPExcel->setActiveSheetIndex(0)
                  ->setCellValue('A1', 'Hello')
                  ->setCellValue('B2', 'world!')
                  ->setCellValue('C1', 'Hello')
                  ->setCellValue('D2', 'world!');

      // Miscellaneous glyphs, UTF-8
      $objPHPExcel->setActiveSheetIndex(0)
                  ->setCellValue('A4', 'Miscellaneous glyphs')
                  ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

      // Rename worksheet
      $objPHPExcel->getActiveSheet()->setTitle('Simple');


        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="01simple.xlsx"');
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
          <label for="Nombre">Seleccione la ruta en donde desea ubicar los archivos .xls resultantes:</label>
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