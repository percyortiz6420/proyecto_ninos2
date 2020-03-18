<?php 
require('php/conexion.php');

clearstatcache();
    $id=$_POST['id']; 

    $q = "SELECT * FROM encargado WHERE id_encargado = '$id'"; 
    $conn=mysqli_query($connection,$q);
    $mensaje='';
    
    while($resultados = mysqli_fetch_array($conn)) {
        $ruta = $resultados['ruta'];
        $nombre_encargado = $resultados['nombre'];
        $apellido= $resultados['apellido'];
        $edad = $resultados['edad'];
        $ficha = $resultados['id_encargado'];
        $nombre_nino = $resultados['nombre_nino'];
        $apellido_nino = $resultados['apellido_nino'];


        if(imagecreatefromjpeg($ruta)){
          $image = imagecreatefromjpeg($ruta);
          $exif = exif_read_data($ruta);
          if(!empty($exif['Orientation'])) {
              switch($exif['Orientation']) {
                  case 8:
                      $image = imagerotate($image,90,0);
                      break;
                  case 3:
                      $image = imagerotate($image,180,0);
                      break;
                  case 6:
                      $image = imagerotate($image,-90,0);
                      break;
              }
          }
          imagejpeg($image, $ruta);
        }else{
          $ruta = 'img/default-user-image.png';
        };

        $mensaje ='
        <div class="col s12 m2">
            <img src="img/logo.png" class="img">
          </div>
          <div class="col s12 m2 grey darken-4 center-align z-depth-3">
            <label class=" white-text" id="encabezado">FICHA NI&Ntilde;O NO. <span id="noficha">' . $ficha . '</span>
            <br>
            Nombre: <span id="nombre_nino">'.$nombre_nino.' '.$apellido_nino.'</span>
            </label>
            <h3 class="white-text center-align"></h3>    
          </div>
          <footer class="page-footer grey darken-2 z-depth-3">
              <div class="row">
                <div class="col l6 s12">
                <picture>
                  <img class="materialboxed responsive-img" src="' .$ruta. '">
                  </picture>
                </div>
    
                <div class="col l4 offset-l1 s12 card-panel grey darken-4" id="info">
                  <h3 class="white-text">Informacion</h3>
                  <hr>
                  <ul>
                    <li><label for="last_name" class="white-text text-lighten-3"><h5>Nombre Encargado:</h5></label><label for="last_name" class="white-text text-lighten-3" ><h4 id="nombre_encargado">'.$nombre_encargado.'</h4></label></li>
                    <li><label for="last_name" class="white-text text-lighten-3"><h5>Apellido Encargado:</h5></label><label for="last_name" class="white-text text-lighten-3" ><h4 id="apellido_encargado">'.$apellido.'</h4></label></li>
                    <li><label for="last_name" class="white-text text-lighten-3"><h5>Edad Ni&ntilde;o:</h5></label><label for="last_name" class="white-text text-lighten-3" > <h4 id="edad_nino">'.$edad.' A&ntilde;os</h4></label></li>
  
                  </ul>
                </div>
              
            </div>
            
          </footer>';

    };
    echo $mensaje;
    mysqli_close($connection);
    
    
?>