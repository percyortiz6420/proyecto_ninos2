<?php
//Archivo de conexión a la base de datos
require('php/conexion.php');

    $usuario=$_POST['usuario'];
    $pass=$_POST['pass'];
    $id_servidor=$_POST['id_servidor'];
   
//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");


    $usuario=str_replace($caracteres_malos, $caracteres_buenos, $usuario);
    $md5pass = md5($pass);


        $consulta = "INSERT INTO usuarios (usuario, contrasena, id_servidor) VALUES ('$usuario', '$md5pass', '$id_servidor');";

            if(mysqli_query($connection, $consulta)) {
                            
                //Cerramos la conexión con MySQL
                mysqli_close($connection);
                //Mostramos un mensaje
                die( "1" );
            } else {
                //Si hay algún error con la inserción, se muestra un mensaje
                die( "2" );
                
            };
        

?>


