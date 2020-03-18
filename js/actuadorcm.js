
  $(document).ready(function(){

    var ficha =prompt("ingrese No.ficha");
    var strurl = 'id='+ficha;
   
    $.ajax({
      url: "blob.php",
      type: "POST",
      data: strurl,
      cache:false,
    
  beforeSend: function(){
    $("#pagina").text('cargando......');
  },
  success:function(echo){
      $("#pagina").html(echo);
      $('.materialboxed').materialbox();
      $('#imagen').addClass('responsive-img');  
  },
  timeout:1000000
  });

   
  });