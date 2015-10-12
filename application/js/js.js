
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