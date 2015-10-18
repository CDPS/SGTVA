
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

    $('#usuario').click(function(event) {
        
        $.ajax({
                url: "home/usuario",
                type: "POST",
                dataType: "html",
                success: function(respuesta){
                    
                   $('.container').html(respuesta);
                }
        });
    });

});

function link(url, update) {

    $.ajax({
        url: url,

        type: 'POST',
        dataType: 'html',
        success: function(respuesta)
        {
  
                $(update).html(respuesta);
                document.reload();
        }
    });
}