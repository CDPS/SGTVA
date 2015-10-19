
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

<<<<<<< HEAD
    $('#usuario').click(function(event) {
        
        $.ajax({
                url: "home/usuario",
                type: "POST",
                dataType: "html",
=======
    $('#cR').click(function(event) {
        
        var fecha = $('.dA').attr("id");
        var vehiculo= $( "#cmbVehiculos" ).val();
         $.ajax({
                url: "home/reserva",
                type: "POST",
                dataType: "html",
                data:{
                    fecha:fecha,
                    vehiculo:vehiculo
                },
>>>>>>> refs/remotes/origin/agregarReserva
                success: function(respuesta){
                    
                   $('.container').html(respuesta);
                }
        });
    });
<<<<<<< HEAD

});
=======
>>>>>>> refs/remotes/origin/agregarReserva


    $('#cmbVehiculos').on('change', function() {
       
        var vehiculo =$('#cmbVehiculos').val();
        var fecha = $('.dA').attr("id");

        $.ajax({
                url: "home/getReservas",
                type: "POST",
                dataType: "html",
                data:{
                    fecha:fecha,
                    vehiculo:vehiculo
                },
                success: function(respuesta){
                    
                   $('#cuerpoTR tbody').html(respuesta);
                }
        });
    });
    

});
