<?php 
session_start();
require('php/conexion.php');

$nombre=$_POST['nombre']; 
  
    $mensaje2 = "";
    $q = "SELECT * FROM `encargado` WHERE nombre_nino like '$nombre%' or apellido_nino like '$nombre%' or telefono1 like '$nombre%' or id_encargado like '$nombre%'"; 
    $conn=mysqli_query($connection,$q);
    $mensaje = '<table>
    <thead>
      <tr>
            <th>ficha</th>
          <th>Nombre Encargado</th>
          <th>Nombre Ni&ntilde;o</th>
          <th>Telefono Registrado</th>
          <th>Edad</th>
          <th>foto</th>
      </tr>
    </thead>';
    
    while($resultados = mysqli_fetch_array($conn)) {
        $ruta = $resultados['ruta'];
        $nombre_encargado = $resultados['nombre'];
        $apellido= $resultados['apellido'];
        $edad = $resultados['edad'];
        $ficha = $resultados['id_encargado'];
        $nombre_nino = $resultados['nombre_nino'];
        $apellido_nino = $resultados['apellido_nino'];
        $telefono = $resultados['telefono1'];
        
        $image = '';
        $exif='';
        
       
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
      




        
        $mensaje2 =$mensaje2.'
        <tbody>
          <tr>
          <td>'.$ficha.'</td>
            <td>'.$nombre_encargado.' '.$apellido.'</td>
            <td>'.$nombre_nino.' '.$apellido_nino.'</td>
            <td>'.$telefono.'</td> 
            <td>'.$edad.'</td> 
            <td><img src="'.$ruta.'" class="materialboxed" width="40px"></td>
            <td ><button class="r" alt="Eliminar" id="'.$ficha.'"><i class="material-icons prefix">delete</i></button></td>
          </tr>
          
        </tbody>
        ';
        
       

    };

    $mensaje = $mensaje.$mensaje2.'</table>';
    echo $mensaje;
    mysqli_close($connection);
    
    
?>
