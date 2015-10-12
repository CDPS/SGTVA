$(document).ready(function() {

     $('#cVehiculo').click(function(event) {
       
        var ref = $('#referencia').val();
        var placa = $('#placa').val();
        var cm = $('#cm').val();

        if(!isNaN(cm) && placa!=null && cm!=null){

            $.ajax({
                url: "home/cVehiculo",
                type: "POST",
                data:{
                        referencia: ref,
                        placa: placa,
                        cm:cm
                },
                success: function(respuesta){
                    
                        alert("Se registro el vehiculo");
                        
                        $("#referencia").val('');
                        $("#placa").val('');
                        $("#cm").val('');

                        $.ajax({
                            url: "home/vehiculos",
                            type: "POST",
                            dataType: "html",
                            success: function(respuesta){
                    
                                $('.container').html(respuesta);
                                }
                        });


                }
            });
        }else{
            alert("Debe ingresar los datos correctamente");
        }
    });

   
    $(".click").click(function(e) {
        var data = $(this).attr("id");

        var ref= $("#"+data+" .ref").html();
        var cm =$("#"+data+" .cm").html();
        var pla = $("#"+data+" .pla").html();

        $("#referencia").val(ref);
        $("#placa").val(pla);
        $("#cm").val(cm);   
    });


});

