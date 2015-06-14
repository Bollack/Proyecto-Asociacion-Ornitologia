<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administración de las especies en el sistema</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/perfil.css" rel="stylesheet">

     <script src="sweetalert-master/dist/sweetalert.min.js"></script>
     <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">

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
            <li><a href="tCatalogo.php">Tablas catálogo</a></li>
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
    
    <div class="container" id="container" style="width:600px; margin:auto;">
      <div class="text-center" id="tabla">
        <h1>Administración de especies del sistema</h1>
      </div>
    
    </div>
    <form name="stabla" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div id="stabla" class="class" style="width:600px;margin:auto;"> <!--Aquí va el cambio de clase-->
        <div class="text-center" id="titulo">
          <h3>Seleccione una opción.</h3>
        </div>
        <div class="text-center" id="descripcion">
          <p>En esta sección puede añadir y editar las especies de aves existentes en el sistema.Seleccione si desea añadir o modificar una especie</p>
        </div>
        <input id="submit" name="add" type="submit" value="Añadir especie" class="btn btn-primary btn-block" style="margin-top:20px">
        <input id="submit" name="modify" type="submit" value="Modificar especie" class="btn btn-primary btn-block" style="margin-top:20px">
      </div>

    </form>




    <!-- Aquí va el form/contenedor de todo lo que sale al insertar-->
    <form name="fInsertar" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div  class="hidden"style="width:600px; margin:auto" id="insertar"> <!--Aquí va el cambio de clase-->
        <div class="text-center" id="titulo">
            <h3>Inserción de especie.</h3>
        </div> 
        <div class="form-group">
            <label for="insertar">Seleccione el nombre científico del ave a insertar:</label>
            <input type="text" id="nombreCientifico_insert" name="nombreCientifico_insert" class="form-control" placeholder="Inserte aquí el nombre científico">
        </div>

        <div class="form-group">
            <label for="Genero-Label">Seleccione el género al cual pertenece la especie que desea insertar:</label>
            <select class"form-control" id="genero_insert" name="genero_insert">
            </select>
        </div>
        <div class="form-group">
            <label for="Tamano">Seleccione el tamaño promedio de la especie que desea insertar:</label>
            <select class="form-control" id="tamano_insert" name="tamano_insert">
            </select>
        </div>
            <label for="Cantidad_huevos">Seleccione la cantidad de huevos que en promedio suelen poner los individuos de la especie que desea insertar:</label>
            <select class"form-control" id="cantidadHuevos_insert" name="cantidadHuevos_insert">
            </select>
        </div>
        <div class="form-group">
            <label for="tipo-huevo">Seleccione el tipo de huevo (cáscara) la cual posee la especie que desea insertar: </label>
            <select class"form-control" id="tipoHuevo_insert" name="tipoHuevo_insert">
            </select>
        </div>
        <div class="form-group">
            <label for="zona">Seleccione la zona de vida de la especie la cual desea insertar: </label>
            <select class"form-control" id="ZonaVida_insert" name="ZonaVida_insert">
            </select>
        </div>
        <div class="form-group">
            <label for="forma">Seleccione la forma del pico que presentan los individuos de la especie que desea insertar:</label>
            <select class"form-control" id="formaPico_insert" name="formaPico_insert">
            </select>
        </div>
        <div class="form-group">
            <label for="tipoInc">Seleccione qué tipo de incubación mantienen los individuos de la especie que desea insertar:</label>
            <select class"form-control" id="tipoIncubacion_insert" name="tipoIncubacion_insert">
            </select>
        </div>
        <div class="form-group">
            <label for="tipoNid">Seleccione el tipo de nido que suelen realizar los individuos de la especie que desea insertar:</label>
            <select class"form-control" id="tipoNido_insert" name="tipoNido_insert">
            </select>
        </div>
        <div class="form-group">
            <label for="tiempoInc">Seleccione el tiempo de incubación promedio de los individuos de la especie que desea insertar:</label>
            <select class"form-control" id="tiempoIncubacion_insert" name="tiempoIncubacion_insert">
            </select>
        </div>
        <h4 id="agregar" class="btn-info text-center" style="height:25px; font-weight:bold; color: white; border-radius: 10px; padding-top:2px">Insertar a la tabla</h4>
      </div>
    </form>      

    <!-- Aquí va el contenedor/form que permite al usuario seleccionar cuál de las especies existentes desea modificar -->
    <form name="selectEspecie" role="form" id="selectEspecie" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="text-center" style="width:600px; margin:auto;" id="seleccionarEspecie"> <!--Aquí va el cambio de clase-->
        <div class="form-group">
          <label for="insertar">Seleccione la especie que desea modificar:</label>
          <select class="form-control" name="especies" id="especies">
          </select>
        </div>
        <input id="submit" name="BirdSelected" type="submit" value="Modificar especie seleccionada" class="btn btn-primary btn-block" style="margin-top:20px">
      </div>
    </form>


    
        <!-- Aquí va el contenedor/form de todo lo que sale al modificar y ya haber seleccionado una especie -->
    <form name="fModificar" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div  class="text-center" style="width:600px; margin:auto" id="modify">  <!--Aquí va el cambio de clase-->
        <div class="text-center" id="titulo">
            <h3>Modificación de especie.</h3>
        </div>
        <div class="text-center" id="info" style="width:600px;margin:auto;">
        </div>

        <div class="form-group">
            <label for="insertar">Seleccione el nuevo nombre científico del ave a modificar:</label>
            <input type="text" id="nombreCientifico_modify" name="nombreCientifico_modify" class="form-control" placeholder="Inserte aquí el nombre científico">
        </div>

        <div class="form-group">

            <label for="Genero-Label">Seleccione el nuevo género al cual pertenece la especie que desea modificar:</label>
            <select class"form-control" id="genero_modify" name="genero_modify">
            </select>
        </div>
        <div class="form-group">

            <label for="Tamano">Seleccione el nuevo tamaño promedio de la especie que desea modificar:</label>
            <select class="form-control" id="tamano_modify" name="tamano_modify">
            </select>
        </div>
        <div class="form-group">

            <label for="Cantidad_huevos">Seleccione la nuevo cantidad de huevos que en promedio suelen poner los individuos de la especie que desea modificar:</label>
            <select class"form-control" id="cantidadHuevos_modify" name="cantidadHuevos_modify">
            </select>
        </div>
        <div class="form-group">

            <label for="tipo-huevo">Seleccione el nuevo tipo de huevo (cáscara) la cual posee la especie que desea modificar: </label>
            <select class"form-control" id="tipoHuevo_modify" name="tipoHuevo_modify">
            </select>
        </div>
        <div class="form-group">

            <label for="zona">Seleccione la nueva zona de vida de la especie la cual desea modificar: </label>
            <select class"form-control" id="ZonaVida_modify" name="ZonaVida_modify">
            </select>
        </div>
        <div class="form-group">
            <label for="forma">Seleccione la nueva forma del pico que presentan los individuos de la especie que desea modificar:</label>
            <select class"form-control" id="formaPico_modify" name="formaPico_modify">
            </select>
        </div>
        <div class="form-group">
            <label for="tipoInc">Seleccione el nuevo tipo de incubación que mantienen los individuos de la especie que desea modificar:</label>
            <select class"form-control" id="tipoIncubacion_modify" name="tipoIncubacion_modify">
            </select>
        </div>
        <div class="form-group">
            <label for="tipoNid">Seleccione el nuevo tipo de nido que suelen realizar los individuos de la especie que desea modificar:</label>
            <select class"form-control" id="tipoNido_modify" name="tipoNido_modify">
            </select>
        </div>
        <div class="form-group">
            <label for="tiempoInc">Seleccione el nuevo tiempo de incubación promedio de los individuos de la especie que desea modificar:</label>
            <select class"form-control" id="tiempoIncubacion_modify" name="tiempoIncubacion_modify">
            </select>
        </div>
        <h4 id="modifyEspecie" class="btn-info text-center" style="height:25px; font-weight:bold; color: white; border-radius: 10px; padding-top:2px">Modificar especie seleccionada (Se guardarán los cambios realizados</h4>
      </div>
    </form>

  	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/adminEspecie.js"></script>

    <!--Aquí comienza el PHP-->

    <?php



      $username = "Administrador";
      $password = "Admin13";
      $hostname = "186.176.166.148:3306";
      $myDB = "hidden_bird";
      $dbhandle = mysqli_connect($hostname, $username, $password, $myDB);
      if(!$dbhandle){
          echo "Conexión fallida: " . mysqli_conect_error();
      }else{
          if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['add'])){ //Lo que pasa cuando se presiona Insertar Especie
              echo "Insertar";
              
              $sql1 = "SELECT Genero, idGenero FROM genero";
              $sqlresult1 = mysqli_query($dbhandle, $sql1);
              if(mysqli_num_rows($sqlresult1)>0){
                while($row1 = mysqli_fetch_assoc($sqlresult1)){
                  $id = $row1['idGenero'];
                  $dato =$row1['Genero'];
                  echo "Good Night";
                  echo "<script type='text/javascript'>document.getElementById('insertar').innerHTML = document.getElementById('genero_insert').innerHTML + '<option value=".$id.">".$dato."</option>'</script>";
                  echo "<script type='text/javascript'>document.getElementById('modify').innerHTML = document.getElementById('
                    genero_modify').innerHTML + '<option value=".$id.">".$dato."</option>'</script>";
                  //echo "<script type='text/javascript'>document.getElementById('insertar').innerHTML = document.getElementById('genero_insert').innerHTML + '<option value=".$id.">".$dato."</option>'</script>";
                }
              }
      
  
              $sql2 = "SELECT idForma_Pico, Forma_Pico FROM forma_pico";
              $sqlresult2 = mysqli_query($dbhandle, $sql2);
              if(mysqli_num_rows($sqlresult2)>0){
                while($row2 = mysqli_fetch_assoc($sqlresult2)){
                  $id = $row2['idForma_Pico'];
                  $dato =$row2['Forma_Pico'];
                  echo "<script type='text/javascript'>document.getElementById('insertar').innerHTML = document.getElementById('formaPico_insert').innerHTML + '<option value=".$id.">".$dato."</option>'</script>";
                }
              }


              $sql3 = "SELECT tipo_cascara, idTipo_Huevos FROM tipo_huevos";
              $sqlresult3 = mysqli_query($dbhandle, $sql3);
              if(mysqli_num_rows($sqlresult3)>0){
                while($row3 = mysqli_fetch_assoc($sqlresult3)){
                  $id = $row3['idTipo_Huevos'];
                  $dato =$row3['tipo_cascara'];
                  echo "<script type='text/javascript'>document.getElementById('insertar').innerHTML = document.getElementById('tipoHuevo_insert').innerHTML + '<option value=".$id.">".$dato."</option>'</script>";
                }
              }


              $sql4 = "SELECT Tipo_incubacion, idTipo_incubacion FROM tipo_incubacion";
              $sqlresult4 = mysqli_query($dbhandle, $sql4);
              if(mysqli_num_rows($sqlresult4)>0){
                while($row4 = mysqli_fetch_assoc($sqlresult4)){
                  $dato = $row4['Tipo_incubacion'];
                  $id =$row4['idTipo_incubacion'];
                  echo "<script type='text/javascript'>document.getElementById('insertar').innerHTML = document.getElementById('tipoIncubacion_insert').innerHTML + '<option value=".$id.">".$dato."</option>'</script>";
                }
              }

              $sql5 = "SELECT numero_huevos, idcantidad_huevos FROM cantidad_huevos";
              $sqlresult5 = mysqli_query($dbhandle, $sql5);
              if(mysqli_num_rows($sqlresult5)>0){
                while($row5 = mysqli_fetch_assoc($sqlresult5)){
                  $dato = $row5['numero_huevos'];
                  $id =$row5['idcantidad_huevos'];
                 echo "<script type='text/javascript'>document.getElementById('insertar').innerHTML = document.getElementById('cantidadHuevos_insert').innerHTML + '<option value=".$id.">".$dato."</option>'</script>";
                }
              }


              $sql6 = "SELECT Tipo, idTipo_Nido FROM tipo_nido";
              $sqlresult6 = mysqli_query($dbhandle, $sql6);
              if(mysqli_num_rows($sqlresult6)>0){
                while($row6 = mysqli_fetch_assoc($sqlresult6)){
                  $dato = $row6['Tipo'];
                  $id =$row6['idTipo_Nido'];
                  echo "<script type='text/javascript'>document.getElementById('insertar').innerHTML = document.getElementById('tipoNido_insert').innerHTML + '<option value=".$id.">".$dato."</option>'</script>";
                }
              }

              $sql7 = "SELECT Tiempo_incubacion, idTiempo_incubacion FROM tiempo_incubacion";
              $sqlresult7 = mysqli_query($dbhandle, $sql7);
              if(mysqli_num_rows($sqlresult7)>0){
                while($row7 = mysqli_fetch_assoc($sqlresult7)){
                  $id = $row7['idTiempo_incubacion'];
                  $dato =$row7['Tiempo_incubacion'];
                  echo "<script type='text/javascript'>document.getElementById('insertar').innerHTML = document.getElementById('tiempoIncubacion_insert').innerHTML + '<option value=".$id.">".$dato."</option>'</script>";
                }
              }


              $sql8 = "SELECT Tamano, idTamano FROM tamano";
              $sqlresult8 = mysqli_query($dbhandle, $sql8);
              if(mysqli_num_rows($sqlresult8)>0){
                while($row8 = mysqli_fetch_assoc($sqlresult8)){
                  $id = $row8['idTamano'];
                  $dato =$row8['Tamano'];
                  echo "<script type='text/javascript'>document.getElementById('insertar').innerHTML = document.getElementById('tamano_insert').innerHTML + '<option value=".$id.">".$dato."</option>'</script>";
                }
              }
              $sql9 = "SELECT Zona, idZonaVida FROM zonavida";
              $sqlresult9 = mysqli_query($dbhandle, $sql9);
              if(mysqli_num_rows($sqlresult9)>0){
                while($row9 = mysqli_fetch_assoc($sqlresult9)){
                  $id = $row9['idZonaVida'];
                  $dato =$row9['Zona'];
                  echo "<script type='text/javascript'>document.getElementById('insertar').innerHTML = document.getElementById('ZonaVida_insert').innerHTML + '<option value=".$id.">".$dato."</option>'</script>";
                }
              }
              echo "<script type='text/javascript'>document.getElementById('stabla').className='hidden';</script>";
              echo "<script type='text/javascript'>document.getElementById('insertar').className='text-center';</script>";
          }else if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['modify'])) 
          //Lo que pasa cuando se presione Modificar  especie
          {
              
              
              echo "Modificar";
              $sql10 = "SELECT Nombre_cientifico, idEspecie FROM especie";
              $sqlresult10 = mysqli_query($dbhandle, $sql10);
              if(mysqli_num_rows($sqlresult10)>0){
                while($row10 = mysqli_fetch_assoc($sqlresult10)){
                  $especie = $row10['Nombre_cientifico'];
                  $idEspecie = $row10['idEspecie'];
                  echo "<script type=\"text/javascript\">document.getElementById('selectEspecie').innerHTML = document.getElementById('especies').innerHTML + \"<option value='".$idEspecie."'>".$especie."</option>\"</script>";
                }
              }

              echo "<script type='text/javascript'>document.getElementById('seleccionarEspecie').className='class';</script>";
              //echo "<script type='text/javascript'>document.getElementById('stabla').className='hidden';</script>";
          }else if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['BirdSelected']))
          { 
            //Lo que pasa una vez se seleccione la especie a modificar. 
              echo "Ave seleccionada";
              //Ver como obtener el id de la especie seleccionada el select especies, dentro del div seleccionarEspecie del form selectEspecie. Dicho id es el value del la opción del select.
              //Será 1 because fuck php.
              $idEspecieSeleccionada="1";

              echo "<script type='text/javascript'>var idEspecie = '".$idEspecieSeleccionada."';</script>";

              //Se comienza a generar y a mostrar los datos de la especie seleccionada
              //para que el usuario compare con los datos que desea modificar.

              $sql11 = "SELECT getNombreCientificoFromEspecieID(".$idEspecieSeleccionada.")";
              $sqlresult11 = mysqli_query($dbhandle, $sql11);
              $row11=mysql_fetch_array($sqlresult11);
              $nombreCienActual = $row11[0];
              echo "<script type='text/javascript'>document.getElementById('info').innerHTML + '<h3>Nombre científico actual: ".$nombreCienActual."</h3>'</script>";


              $sql12 = "SELECT getTamanoFromEspecieID(".$idEspecieSeleccionada.")";
              $sqlresult12 = mysqli_query($dbhandle, $sql12);
              $row12=mysql_fetch_array($sqlresult12);
              $tamanoActual = $row12[0];
                  echo "<script type='text/javascript'>document.getElementById('info').innerHTML + '<h3>Tamaño actual: ".$tamanoActual."</h3>'</script>";


              $sql13 = "SELECT getFormaPicoFromEspecieID(".$idEspecieSeleccionada.")";
              $sqlresult13 = mysqli_query($dbhandle, $sql13);
              $row13=mysql_fetch_array($sqlresult13);
              $generoActual = $row13[0];
                  echo "<script type='text/javascript'>document.getElementById('info').innerHTML + '<h3>Género al cual pertenece la especie actualmente: ".$generoActual."</h3>'</script>";

              $sql14 = "SELECT getTipoHuevosFromEspecieID(".$idEspecieSeleccionada.")";
              $sqlresult14 = mysqli_query($dbhandle, $sql14);
              $row14=mysql_fetch_array($sqlresult14);
              $tipHueActual = $row14[0];
                  echo "<script type='text/javascript'>document.getElementById('info').innerHTML + '<h3>Tipo actual de los huevos de los individuos de la especie: ".$tipHueActual."</h3>'</script>";

              $sql15 = "SELECT getTipoIncubacionFromEspecieID(".$idEspecieSeleccionada.")";
              $sqlresult15 = mysqli_query($dbhandle, $sql15);
              $row15=mysql_fetch_array($sqlresult15);
              $tipIncActual = $row15[0];
              echo $tipIncActual;
                  echo "<script type='text/javascript'>document.getElementById('info').innerHTML + '<h3>Tipo de incubación actual de la especie: ".$tipIncActual."</h3>'</script>";


              $sql16 = "SELECT getCantidadHuevosFromEspecieID(".$idEspecieSeleccionada.")";
              $sqlresult16 = mysqli_query($dbhandle, $sql16);
              $row16=mysql_fetch_array($sqlresult16);
              $cantHueActual = $row16[0];
                echo "<script type='text/javascript'>document.getElementById('info').innerHTML + '<h3>Cantidad actual de huevos de los individuos de la especie: ".$cantHueActual."</h3>'</script>";


              $sql17 = "SELECT getTipoNidoFromEspecieID(".$idEspecieSeleccionada.")";
              $sqlresult17 = mysqli_query($dbhandle, $sql17);
              $row17=mysql_fetch_array($sqlresult17);
              $tipNidActual = $row17[0];
                  echo "<script type='text/javascript'>document.getElementById('info').innerHTML + '<h3>Tipo de Nido actual de la especie: ".$tipNidActual."</h3>'</script>";


              $sql18 = "SELECT getTiempoIncubacionFromEspecieID(".$idEspecieSeleccionada.")";
              $sqlresult18 = mysqli_query($dbhandle, $sql18);
              $row18=mysql_fetch_array($sqlresult18);
              $tiempIncActual = $row18[0];
                  echo "<script type='text/javascript'>document.getElementById('info').innerHTML + '<h3>Tiempo actual de incubación de la especie: ".$tiempIncActual."</h3>'</script>";


              $sql19 = "SELECT getZonaVidaFromEspecieID(".$idEspecieSeleccionada.")";
              $sqlresult19 = mysqli_query($dbhandle, $sql19);
              $row19=mysql_fetch_array($sqlresult19);
              $zonVidActual = $row19[0];
                  echo "<script type='text/javascript'>document.getElementById('info').innerHTML + '<h3>Zona de vida actual de la especie: ".$zonVidActual."</h3>'</script>";

              //Comienza el llenado de los selects de dicha sección de modificación
        /*
              $sql20 = "SELECT Genero, idGenero FROM genero";
              $sqlresult1 = mysqli_query($dbhandle, $sql20);
              if(mysqli_num_rows($sqlresult20)>0){
                while($row20 = mysqli_fetch_assoc($sqlresult20)){
                  $id = $row20['idGenero'];
                  $dato =$row20['Genero'];
                  echo "Good Night";
                  echo "<script type='text/javascript'>document.getElementById('modify').innerHTML = document.getElementById('
                    genero_modify').innerHTML + '<option value=".$id.">".$dato."</option>'</script>";

                }
              }

              $sql21 = "SELECT idForma_Pico, Forma_Pico FROM forma_pico";
              $sqlresult21 = mysqli_query($dbhandle, $sql2);
              if(mysqli_num_rows($sqlresult21)>0){
                while($row2 = mysqli_fetch_assoc($sqlresult2)){
                  $id = $row2['idForma_Pico'];
                  $dato =$row2['Forma_Pico'];
                  echo "<script type='text/javascript'>document.getElementById('insertar').innerHTML = document.getElementById('formaPico_insert').innerHTML + '<option value=".$id.">".$dato."</option>'</script>";
                }
              }


              $sql3 = "SELECT tipo_cascara, idTipo_Huevos FROM tipo_huevos";
              $sqlresult3 = mysqli_query($dbhandle, $sql3);
              if(mysqli_num_rows($sqlresult3)>0){
                while($row3 = mysqli_fetch_assoc($sqlresult3)){
                  $id = $row3['idTipo_Huevos'];
                  $dato =$row3['tipo_cascara'];
                  echo "<script type='text/javascript'>document.getElementById('insertar').innerHTML = document.getElementById('tipoHuevo_insert').innerHTML + '<option value=".$id.">".$dato."</option>'</script>";
                }
              }


              $sql4 = "SELECT Tipo_incubacion, idTipo_incubacion FROM tipo_incubacion";
              $sqlresult4 = mysqli_query($dbhandle, $sql4);
              if(mysqli_num_rows($sqlresult4)>0){
                while($row4 = mysqli_fetch_assoc($sqlresult4)){
                  $dato = $row4['Tipo_incubacion'];
                  $id =$row4['idTipo_incubacion'];
                  echo "<script type='text/javascript'>document.getElementById('insertar').innerHTML = document.getElementById('tipoIncubacion_insert').innerHTML + '<option value=".$id.">".$dato."</option>'</script>";
                }
              }

              $sql5 = "SELECT numero_huevos, idcantidad_huevos FROM cantidad_huevos";
              $sqlresult5 = mysqli_query($dbhandle, $sql5);
              if(mysqli_num_rows($sqlresult5)>0){
                while($row5 = mysqli_fetch_assoc($sqlresult5)){
                  $dato = $row5['numero_huevos'];
                  $id =$row5['idcantidad_huevos'];
                 echo "<script type='text/javascript'>document.getElementById('insertar').innerHTML = document.getElementById('cantidadHuevos_insert').innerHTML + '<option value=".$id.">".$dato."</option>'</script>";
                }
              }


              $sql6 = "SELECT Tipo, idTipo_Nido FROM tipo_nido";
              $sqlresult6 = mysqli_query($dbhandle, $sql6);
              if(mysqli_num_rows($sqlresult6)>0){
                while($row6 = mysqli_fetch_assoc($sqlresult6)){
                  $dato = $row6['Tipo'];
                  $id =$row6['idTipo_Nido'];
                  echo "<script type='text/javascript'>document.getElementById('insertar').innerHTML = document.getElementById('tipoNido_insert').innerHTML + '<option value=".$id.">".$dato."</option>'</script>";
                }
              }

              $sql7 = "SELECT Tiempo_incubacion, idTiempo_incubacion FROM tiempo_incubacion";
              $sqlresult7 = mysqli_query($dbhandle, $sql7);
              if(mysqli_num_rows($sqlresult7)>0){
                while($row7 = mysqli_fetch_assoc($sqlresult7)){
                  $id = $row7['idTiempo_incubacion'];
                  $dato =$row7['Tiempo_incubacion'];
                  echo "<script type='text/javascript'>document.getElementById('insertar').innerHTML = document.getElementById('tiempoIncubacion_insert').innerHTML + '<option value=".$id.">".$dato."</option>'</script>";
                }
              }


              $sql8 = "SELECT Tamano, idTamano FROM tamano";
              $sqlresult8 = mysqli_query($dbhandle, $sql8);
              if(mysqli_num_rows($sqlresult8)>0){
                while($row8 = mysqli_fetch_assoc($sqlresult8)){
                  $id = $row8['idTamano'];
                  $dato =$row8['Tamano'];
                  echo "<script type='text/javascript'>document.getElementById('insertar').innerHTML = document.getElementById('tamano_insert').innerHTML + '<option value=".$id.">".$dato."</option>'</script>";
                }
              }
              $sql9 = "SELECT Zona, idZonaVida FROM zonavida";
              $sqlresult9 = mysqli_query($dbhandle, $sql9);
              if(mysqli_num_rows($sqlresult9)>0){
                while($row9 = mysqli_fetch_assoc($sqlresult9)){
                  $id = $row9['idZonaVida'];
                  $dato =$row9['Zona'];
                  echo "<script type='text/javascript'>document.getElementById('modify').innerHTML = document.getElementById('ZonaVida_insert').innerHTML + '<option value=".$id.">".$dato."</option>'</script>";
                }
              }

              */

              
              
          }
      }
  	?>
    </body>
</html>

      