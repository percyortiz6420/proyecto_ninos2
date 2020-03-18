<?php
//Archivo de conexión a la base de datos
require('php/conexion.php');
    $ficha=$_POST['ficha'];
    $Nombre_encargado=$_POST['nombre_encargado'];
    $Apellido_encargado=$_POST['apellido_encargado'];
    $Telefono_encargado=$_POST['telefono'];
    $Nombre_nino=$_POST['nombre_nino'];
    $Apellido_nino=$_POST['apellido_nino'];
    $edad_nino=$_POST['edad'];
    $Descripcion=$_POST['atencion'];
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



   

        $consulta = "UPDATE `encargado` SET `nombre` = '$Nombre_encargado', `apellido` = '$Apellido_encargado', `telefono1` = '$Telefono_encargado', `nombre_nino` = '$Nombre_nino', `apellido_nino` = '$Apellido_nino', `edad` = '$edad_nino', `atención_especial` = '$Descripcion' WHERE `encargado`.`id_encargado` = '$ficha'";

            if(mysqli_query($connection, $consulta)) {
                            
                //Cerramos la conexión con MySQL
                mysqli_close($connection);
                //Mostramos un mensaje
                echo "1";
               
            } else {
                //Si hay algún error con la inserción, se muestra un mensaje
                echo "2";
                
                
            };
        

?>


