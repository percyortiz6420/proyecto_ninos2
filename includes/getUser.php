<?php
include '../php/conexion.php';


$id=$_POST['id']; 

$usuario = '';
$nombre = '';
$tipo = '';
    $q = "SELECT u.usuario,CONCAT(s.nombre,' ',s.apellido)as nombre,tp.Nombre as tipo from usuarios u inner join servidor s on u.id_servidor = s.Id_servidor inner join tipo_servidor tp on s.id_tiposervidor=tp.id_tiposervidor where u.id ='$id'"; 
    $conn=mysqli_query($connection,$q);

    while($resultados = mysqli_fetch_array($conn)) {
        $usuario = $resultados['usuario'];
        $nombre = $resultados['nombre'];
        $tipo= $resultados['tipo'];
       
    }

    echo $usuario.','.$nombre.','.$tipo;
    mysqli_close($connection);

?>