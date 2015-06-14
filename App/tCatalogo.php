<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/perfil.css" rel="stylesheet">

     <script src="sweetalert-master/dist/sweetalert.min.js"></script>
     <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">

  </head>
  <body>
    <?php
      session_start();
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
    
    <div class="container" id="container" style="width:600px; margin:auto;">
      <div class="text-center" id="tabla">
        <h1>Seleccione una tabla:</h1>
      </div>
    </div>
    <form name="stabla" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div id="stabla" style="width:600px;margin:auto;">
        <select class="form-control" name="tabla" id="tabla">
          <option value="0">Cantidad de Huevos</option>
          <option value="1">Color</option>
          <option value="3">Familia</option>
          <option value="4">Forma de Pico</option>
          <option value="5">Género</option>
          <option value="6">Nombre común</option>
          <option value="7">Nombre en inglés</option>
          <option value="8">Orden</option>
          <option value="9">Suborden</option>
          <option value="10">Tamaño</option>
          <option value="11">Tiempo de incubación</option>
          <option value="12">Tipo de huevo</option>
          <option value="13">Tipo de incubación</option>
          <option value="14">Tipo de nido</option>
          <option value="15">Zona de vida</option>
          <!--<option value="16">DATA LOG</option>-->
        </select>
        <input id="submit" name="submit" type="submit" value="Seleccionar tabla" class="btn btn-primary btn-block" style="margin-top:10px">
      </div>
    </form>

    <div class="text-center" id="info" style="width:600px;margin:auto;">
    </div>

    <form name="fInsertar" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="hidden" style="width:600px; margin:auto;" id="fi">
        <div class="form-group">
          <label for="insertar">Insertar:</label>
          <input type="text" id="insertar" name="insertar" class="form-control" placeholder="DATA">
        </div>
        <div class="form-group">
          <label for="requerimiento">Requerimiento:</label>
          <select class="form-control" id="requerimiento" name="requerimiento">
          </select>
        </div>
        <h4 id="agregar" class="btn-info text-center" style="height:25px; font-weight:bold; color: white; border-radius: 10px; padding-top:2px">Insertar a la tabla</h4>
      </div>
    </form>      

    <form class="horizontal-form" name="fModificar" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="hidden" style="width:600px; margin:auto;" id="fm">
        <label for="modificado">Modificar:</label>
        <select class="form-control" id="modificado" name="modificado">
        </select>
        <div class="form-group" style="margin-top:10px">
          <input type="text" id="modificacion" name="modificacion" class="form-control" placeholder="Modificación">
        </div>
        <h4 id="modificar" class="btn-info text-center" style="height:25px; font-weight:bold; color: white; border-radius: 10px; padding-top:2px">Modificar columna seleccionada</h4>
      </div>
    </form>

  	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/catalogo.js"></script>
    <?php
      if($_SESSION['idPersona']==1){
        echo "<script type=\"text/javascript\">document.getElementById(\"tab2\").className=\"\";</script>";
        echo "<script type=\"text/javascript\">document.getElementById(\"tab1\").className=\"\";</script>";
      }
      if($_SESSION['idPersona']!=""){
        echo "<script type=\"text/javascript\">document.getElementById(\"tab3\").className=\"\";</script>";
        echo "<script type=\"text/javascript\">document.getElementById(\"tab4\").className=\"\";</script>";
        echo "<script type=\"text/javascript\">document.getElementById(\"tab5\").className=\"hidden\";</script>";
      }
      function getFilaArregloFromTabla($arreglo, $posArreglo, $nombreTabla)
      {
        $len = count($arreglo);
        for ($i=0;$i<$len;$i++)
        {
          if($arreglo[$i][$posArreglo]==$nombreTabla)
          {
            return $i;
          }
        }
      }


      if(isset($_POST["tabla"])){
        $tabla = $_POST["tabla"];
        $constantes = [["cantidad_huevos","idcantidad_huevos", "numero_huevos",""],
        ["color","Color_id","Color",""],
        ["especie","idEspecie","Nombre_cientifico","Genero_idGenero","genero"],
        ["familia","idFamilia","Familia","Suborden_idSuborden", "suborden"],
        ["forma_pico","idForma_Pico","Forma_Pico",""],
        ["genero","idGenero","Genero","Familia_idFamilia","familia"],
        ["nombre_comun","idNombre_comun","Nombre","Especie_idEspecie","familia"],
        ["nombre_ingles_ave","idNombre_ingles_ave","nombre","Especie_idEspecie", "especie"],
        ["orden","idOrden","Orden","Clase_idClase","clase"],
        ["suborden","idSuborden","Suborden","Orden_idOrden", "orden"],
        ["tamano","idTamano","Tamano",""],
        ["tiempo_incubacion","idTiempo_incubacion","Tiempo_incubacion",""],
        ["tipo_huevos","idTipo_Huevos","tipo_cascara",""],
        ["tipo_incubacion","idTipo_incubacion","Tipo_incubacion",""],
        ["tipo_nido","idTipo_Nido","Tipo",""],
        ["zonavida","idZonaVida","Zona",""]];
        echo "<script type='text/javascript'>var nombre = '".$constantes[$tabla][0]."';</script>";
        echo "<script type='text/javascript'>var pk = '".$constantes[$tabla][1]."';</script>";
        echo "<script type='text/javascript'>var col = '".$constantes[$tabla][2]."';</script>";
        echo "<script type='text/javascript'>var colExtra = '".$constantes[$tabla][3]."';</script>";
        $username = "Administrador";
        $password = "Admin13";
        $hostname = "186.176.166.148:3306";
        $myDB = "hidden_bird";
        $dbhandle = mysqli_connect($hostname, $username, $password, $myDB);
        if(!$dbhandle){
          echo "Conexión fallida: " . mysqli_conect_error();
        }else{
          echo "<script type='text/javascript'>document.getElementById('info').innerHTML = document.getElementById('info').innerHTML + '<h3>".$constantes[$tabla][0]."</h3>'</script>";
          $sql = "SELECT ".$constantes[$tabla][1].", ".$constantes[$tabla][2]." FROM ".$constantes[$tabla][0]." ORDER BY ".$constantes[$tabla][1]."";
          $sqlresult = mysqli_query($dbhandle, $sql);
          while($row = mysqli_fetch_assoc($sqlresult)){
            $pk = $row[$constantes[$tabla][1]];
            $data = $row[$constantes[$tabla][2]];
            echo "<script type='text/javascript'>document.getElementById('info').innerHTML = document.getElementById('info').innerHTML + '<h3>ID: ".$pk." - DATA: ".$data."</h3>'</script>";
            echo "<script type='text/javascript'>document.getElementById('modificado').innerHTML = document.getElementById('modificado').innerHTML + '<option value=".$pk.">".$data."</option>'</script>";
            echo "<script type='text/javascript'>document.getElementById('fm').className='class';</script>";
            echo "<script type='text/javascript'>document.getElementById('fi').className='class';</script>";
          }
          if($constantes[$tabla][3]!=""){
            $posArregloInArreglo= getFilaArregloFromTabla($constantes,0,$constantes[$tabla][4]);
            echo $posArregloInArreglo;

            $sql="SELECT ".$constantes[$posArregloInArreglo][1].", ".$constantes[$posArregloInArreglo][2]." FROM ".$constantes[$tabla][4];
            echo $sql;
            $sqlresult = mysqli_query($dbhandle,$sql);
            while($row = mysqli_fetch_assoc($sqlresult))
            {
              $pk = $row[$constantes[$posArregloInArreglo][1]];
              $dato = $row[$constantes[$posArregloInArreglo][2]];
               echo "<script type='text/javascript'>document.getElementById('requerimiento').innerHTML = document.getElementById('requerimiento').innerHTML + '<option value=".$pk.">".$dato."</option>'</script>";
            echo "<script type='text/javascript'>document.getElementById('fm').className='class';</script>";
            }

          }else{
            echo "<script type='text/javascript'>document.getElementById('requerimiento').innerHTML = document.getElementById('requerimiento').innerHTML + '<option value=\"\">Esta tabla no tiene requerimientos.</option>'</script>";
          }
        }
      }
    	
  	?>
    </body>
</html>

      