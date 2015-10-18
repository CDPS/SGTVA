
$(document).ready(function() {

    $('#vehiculos').click(function(event) {
    	
        $.ajax({
                url: "home/vehiculos",
                type: "POST",
                dataType: "html",
                success: function(respuesta){
                	
                   $('.container').html(respuesta);
                }
        });
    });

    $('#conductores').click(function(event) {
        
        $.ajax({
                url: "home/conductores",
                type: "POST",
                dataType: "html",
                success: function(respuesta){
                    
                   $('.container').html(respuesta);
                }
        });
    });

    $('#cV').click(function(event) {
        
        var fecha = $('.dA').attr("id");
        
         $.ajax({
                url: "home/reserva",
                type: "POST",
                dataType: "html",
                data:{
                    fecha:fecha
                },
                success: function(respuesta){
                    
                   $('.container').html(respuesta);
                }
        });
    });

});
