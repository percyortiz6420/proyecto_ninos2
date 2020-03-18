
<?php

 
$timezone="America/Guatemala";
$dt=new datetime("now",new datetimezone($timezone));
$hora = gmdate("d-m-Y",(time()+$dt->getOffset()));
$hora
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script  type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script> 
    <script src="js/cservicio.js"></script>
   <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    
    <title>Registro ni&ntilde;o</title>
    
</head>
<style>
  .loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('img/Loader.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}
#nota{
  color: red;
}
</style>
<body class="#e8f5e9 green lighten-5" id="body">
  
  <div class="row">


    
    <form class="col6  s12" accept-charset="utf-8" method="POST" id="cargar" enctype="multipart/form-data">
      
      <ul class="collection"> 
        <li class="collection-item">
          <div class="row">
        
            <i id="iconoheader" class="material-icons prefix">supervisor_account</i><h4>  CREACION NUEVO CULTO</h4>
      </div>
        </li>
      <li class="collection-item">
      <div class="row">
        <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
              <select name="id_coordinador" id="id_coordinador">
                
              </select>
            
            </div>
        
      </div>

    </li>
    
    <li class="collection-item">
      
      <div class="row">
        <div class="input-field col l8 s12">
          <i class="material-icons prefix">text_fields</i>
          <input placeholder="Descripci&oacute;n" id="descripcion" type="text" class="validate" name="descripcion">
          <label for="first_name">Descripci&oacute;n*</label>
        </div>
        <div class="input-field col l4 offset s12">
          <i class="material-icons prefix">date_range</i>
          <input placeholder="fecha" id="fecha" type="text" class="validate" name="fecha" value="<?=$hora?>" disabled>
          <label for="first_name">Fecha*</label>
        </div>
        
      </div>
      </li>
      
    </ul>
    <center>
    <button class="waves-effect waves-light btn-large" style="align-items: center;" type="submit" name="action" id="crear ">Crear
      
    </button>
    <div class="loader" style="display: none;"></div>
  </center>
    </form>
  <div id="mensaje"></div>
  </div>

</body>
</html>
