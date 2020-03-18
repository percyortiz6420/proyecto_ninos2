<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script  type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script> 
    <script src="js/actuador.js"></script>
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


    <div class="col6  #43a047 green darken-1 container center-align z-depth-3" id="forma"> <!-- Note that "m8 l9" was added -->
     <center> <img id="imagen" class="materialboxed s3" width="200" src="img/logo.png"></center>
    </div>
    
    <form class="col6  s12 container" accept-charset="utf-8" method="POST" id="cargar" enctype="multipart/form-data">
      
      <ul class="collection z-depth-3"> 
        <li class="collection-item">
          <div class="row">
        
            <i id="iconoheader" class="material-icons prefix">supervisor_account</i><h4>  DATOS DEL ENCARGADO</h4>
      </div>
        </li>
      <li class="collection-item">
      <div class="row">
        <div class="input-field col l6 s12">
          <i class="material-icons prefix">title</i>
          <input placeholder="Nombre Encargado" id="nombre_encargado" type="text" class="validate" name="nombre_encargado">
          <label for="first_name">Nombre(s)*</label>
        </div>
        <div class="input-field col l6 s12">
          <i class="material-icons prefix">title</i>
          <input placeholder="Apellido Encargado" id="apellido_encargado" type="text" class="validate" name="apellido_encargado">
          <label for="last_name">Apellido(s)*</label>
        </div>

      </div>
      <div class="row">
        <div class="input-field col s10">
          <i class="material-icons prefix">call</i>
          <input placeholder="Numero de Telefono" id="telefono_encargado" class="validate" type="tel" name="telefono_encargado">
          <label for="first_name">Telefono*</label>
        </div>
       
     

      </div>

    </li>
    <li class="collection-item">
      <div class="row">
    <i id="iconoheader" class="material-icons prefix">people_outline</i>
    <h4>DATOS DEL NI&Ntilde;O</h4>
  </div>
    </li>
    <li class="collection-item">
      <div class="row">
        <div class="input-field col l6 s12">
          <i class="material-icons prefix">title</i>
          <input placeholder="Nombre(s) del ni&ntilde;o" id="nombre_nino" type="text" class="validate" name="nombre_nino">
          <label for="first_name">Nombre(s)*</label>
        </div>
        <div class="input-field col l6 s12">
          <i class="material-icons prefix">title</i>
          <input placeholder="Apellido(s) del ni&ntilde;o" id="apellido_nino" type="text" class="validate" name="apellido_nino">
          <label for="last_name">Apellido(s)*</label>
        </div>  

      </div>
      <div class="row">
        <div class="input-field col l6 s12">
          <i class="material-icons prefix">exposure_plus_1</i>
          <input placeholder="edad" id="edad" type="tel" class="validate" name="edad_nino">
          <label for="first_name">Edad*</label>
        </div>
        <div class="input-field col l6 s12">
          <i class="material-icons prefix">local_hospital</i>
            <select id="atencion_especial">
              <option value="No" >No</option>
              <option value="Si" >Si</option>
            </select>
            <label>Atencion Especial</label>
          </div>
        
      </div>
      <div class="row" style="display: none;" id="divatencion">
        <div class="input-field col l12 s12">
          
          <input placeholder="Describa la atencion especial" value="Ninguna" id="descripcion_atencion" type="text" class="validate" name="desatencion">
          <label for="first_name">Atencion Especial</label>
        </div>
        

      </div>
      </li>
      <li class="collection-item">
        <div class="row">
      <i id="iconoheader" class="material-icons prefix">add_photo_alternate</i>
      <h4>Fotografia</h4>
    </div>
      </li>
      <li class="collection-item">
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">add_a_photo</i>
            
            <input type="file" name="imagen" class='na'/>
            
            
            
          </div>
           
  
        </div>
       </li>
    </ul>
    <center>
    <button class="waves-effect waves-light btn-large" style="align-items: center;" type="submit" name="action" id="enviar">Enviar
      <i class="material-icons right">send</i>
    </button>
    <div class="loader" style="display: none;"></div>
  </center>
    </form>
  <div id="mensaje"></div>
  </div>
<label for="copyright" id="cp">©2020 Ebenekids Guatemala, All rights reserved.</label>
</body>
</html>