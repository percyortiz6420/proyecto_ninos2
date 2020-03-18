$(document).ready(function(){
    cargar();
    $('select').formSelect();
  
    function cargar(){
            $.get( "php/select3.php", function(echo) {
               
                $("#tipo_servidor").html(echo);

                $('select').formSelect();
            
              
            inserta();
            
              });
            

    };  

    function inserta(){

    $("#cargar").on("submit", function(e){
        e.preventDefault();


        if (validar()) {
            var toastHTML = '<span>Ingrese los Campos Obligatorios!</span>';
                            M.toast({html: toastHTML,classes:"#b71c1c red darken-4"});
        } else {
        var strurl = $('#cargar').serialize();
        $.ajax({
            url: "php/nuser.php",
            type: "POST",
            data: strurl,
            cache:false,
          
        beforeSend: function(){
          $(".loader").fadeOut("slow");
          $('.loader').attr('style','display:block;');
        },
        success:function(echo){
          

          $('.loader').attr('style','display:none;');
          
                if(echo == 2) {
                    var toastHTML = '<span>Error, intente de nuevo mas tarde!</span>';
                        M.toast({html: toastHTML,classes:"#b71c1c red darken-4"});
                        $('#cculto').trigger('click');
                        
                } else if (echo == 1){
                    var toastHTML = '<span>Servidor Ingresado!</span>';
                    M.toast({html: toastHTML,classes:"#1b5e20 green darken-4"});
                   $('#cculto').trigger('click');
                }
            
           
            
        }
        });


        }
    });
};




    function validar(){
        if ($('#nombre').val()==''||$('#apellido').val()==''||$('#telefono').val()==''||$('dpi').val()==''||$('#tipo_servidor').val()=='0') {
            return true;
        } 
    };



});