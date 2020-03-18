$(document).ready(function (){

$.get( "php/select4.php", function(echo) {
               
    $("#id_culto").html(echo);

    $('select').formSelect();

});

    


    function validar1() {
        
        var ficha = $('#noficha').val();
        var culto = $('#id_culto').val();
        var strurl = 'id_culto='+culto+'&noficha='+ficha;
        var resultado;
       
        
        $.ajax({
            url: "php/verificareg2.php",
            type: "POST",
            data: strurl,
            cache:false,
          
        beforeSend: function(){
          $("#pagina").text('cargando......');
        },
        success:function(echo){
            var data = echo.split(",");
           
          if(data[0]== 1) {
              
              var toastHTML = '<span>Ni&ntilde;o registrado a las '+data[1]+'!</span>';
              M.toast({html: toastHTML,classes:"#ff9800 orange"});
              $('#salidan').trigger('click');
              
            
          }else if(data[0]== ''){
            var toastHTML = '<span>Ni&ntilde;o no ha ingresado!</span>';
            M.toast({html: toastHTML,classes:"#ff9800 orange"});
            $('#salidan').trigger('click');
          } else if (data[0]== 2){
               
                            var user = $('#id').val();
                            var culto = $('#id_culto').val();
                            var hora =$('#hora_salida').val();
                            var ficha = $('#noficha').val();
                            var strurl = 'id='+user+'&id_culto='+culto+'&hora_salida='+hora+'&noficha='+ficha;
                            
                    
                        $.ajax({
                        url: "reg2.php",
                        type: "POST",
                        data: strurl,
                        cache:false,
                        
                    beforeSend: function(){
                        $("#pagina").text('cargando......');
                    },
                    success:function(echo){
                        
                        if(echo == 1) {
                            var toastHTML = '<span>Registro Ingresado!</span>';
                            M.toast({html: toastHTML,classes:"#1b5e20 green darken-4"});
                            $('#salidan').trigger('click');
                                
                        } else{
                            var toastHTML = '<span>Error, Registro no realizado!</span>';
                                M.toast({html: toastHTML,classes:"#b71c1c red darken-4"});
                                $('#salidan').trigger('click');
                            
                        }
                    }
                    });

              
          };
         
        }
        });
        
    };

    
        
    $("#cargar").on("submit", function(e){
        e.preventDefault();
        
        var nombre = $('#noficha').val();

        if(nombre != ''){
        var strurl = 'id='+nombre;
   
    $.ajax({
      url: "verficha.php",
      type: "POST",
      data: strurl,
      cache:false,
    
  beforeSend: function(){
    $("#pagina").text('cargando......');
  },
  success:function(echo){
      
      $("#resultados").html(echo);
      $('.materialboxed').materialbox();
      $('#imagen').addClass('responsive-img');  

      $("#registrar").click(function(){
        validar1();
    
      
  
  });
      
  },
  timeout:1000000
  });
    
}else{
    var toastHTML = '<span>Ingrese No. Ficha!</span>';
                        M.toast({html: toastHTML,classes:"#b71c1c red darken-4"});
}
});
$('select').formSelect();


  });