<?php
//Archivo de conexión a la base de datos
require('php/conexion.php');

    $Nombre_encargado=$_POST['nombre_encargado'];
    $Apellido_encargado=$_POST['apellido_encargado'];
    $Telefono_encargado=$_POST['telefono_encargado'];
    $Nombre_nino=$_POST['nombre_nino'];
    $Apellido_nino=$_POST['apellido_nino'];
    $edad_nino=$_POST['edad_nino'];
    $Descripcion=$_POST['desatencion'];
//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");


    $Nombre_encargado=str_replace($caracteres_malos, $caracteres_buenos, $Nombre_encargado);
    $Apellido_encargado=str_replace($caracteres_malos, $caracteres_buenos, $Apellido_encargado);
    $Telefono_encargado=str_replace($caracteres_malos, $caracteres_buenos, $Telefono_encargado);
    
    $Nombre_nino=str_replace($caracteres_malos, $caracteres_buenos, $Nombre_nino);
    $Apellido_nino=str_replace($caracteres_malos, $caracteres_buenos, $Apellido_nino);
    $edad_nino=str_replace($caracteres_malos, $caracteres_buenos, $edad_nino);
    $Descripcion=str_replace($caracteres_malos, $caracteres_buenos, $Descripcion);


    date_default_timezone_set('UTC');
$nombre_imagen=$_FILES['imagen']['name'];
$ruta=$_FILES['imagen']['tmp_name'];


$permitidos = array("image/jpg", "image/jpeg");


if (in_array($_FILES['imagen']['type'], $permitidos))
{

    $nombreImagen=date('Y-m-d-h:i:s')."-".$nombre_imagen;
    $destino='imagenesBD/'.$nombreImagen;

    // set the default timezone to use. 
    date_default_timezone_set('UTC');
    //con esto la imagen siempre tendra un nombre distinto





    if(move_uploaded_file($ruta,$destino)){

        $consulta = "INSERT INTO encargado (nombre, apellido, telefono1, nombre_nino, apellido_nino, edad, atención_especial,ruta) VALUES ('$Nombre_encargado', '$Apellido_encargado', '$Telefono_encargado', '$Nombre_nino', '$Apellido_nino', '$edad_nino', '$Descripcion','$destino')";

            if(mysqli_query($connection, $consulta)) {
                            
                //Cerramos la conexión con MySQL
                mysqli_close($connection);
                //Mostramos un mensaje
                die( "1,".$destino );
            } else {
                //Si hay algún error con la inserción, se muestra un mensaje
                die( "2,".$destino );
                
            };
        };
}else {
    echo "3,".$destino;
};
?>


