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
                  
                  if(respuesta=="ok"){
                        alert("Se registro el vehiculo");
                        
                        $("#referencia").val('');
                        $("#placa").val('');
                        $("#cm").val('');
                  }else{
                    alert("Debe ingresar todos los campos");
                  }
                }
            });
        }else{
            alert("Debe ingresar los datos correctamente");
        }
    });

});
