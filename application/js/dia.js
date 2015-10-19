$(document).ready(function() {

	 jQuery("#buscador").keyup(function(){
	    if( jQuery(this).val() != ""){
	        jQuery("#tablaUnidades tbody>tr").hide();
	        jQuery("#tablaUnidades td:contiene-palabra('" + jQuery(this).val() + "')").parent("tr").show();
	    }
	    else{
	        jQuery("#tablaUnidades tbody>tr").show();
	    }
	});


	jQuery.extend(jQuery.expr[":"], 
	{
	    "contiene-palabra": function(elem, i, match, array) {
	        return (elem.textContent || elem.innerText || jQuery(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
	    }
	});

	

	$(".click").click(function(e) {
        var data = $(this).attr("id");

        var nom= $("#"+data+" .ref").html();

        $(".unidadE").attr("id",data);
         
        $("#buscador").val(nom);
         jQuery("#tablaUnidades tbody>tr").hide();
	     jQuery("#tablaUnidades td:contiene-palabra('" + nom + "')").parent("tr").show();
    });



	$('#cRV').click(function(event) {
        
     	var unidad = $(".unidadE").attr("id");
     	var vehiculo =$(".vehiculoE").attr("id");
     	var solicitante = $("#solicitante").val();
     	
     	var responsable = $("#nombreR").val();

     	var cedulaR =  $("#cedulaR").val();
     	var descripcion =  $("#descripcion").val();
     	var salida =  $("#salida").val();
     	var destino =  $("#destino").val();

     	var horaS =  $("#horaS").val();
     	var minutosS=  $("#minutosS").val();
     	var apS=  $("#cmbHoraS").val();

     	var horaL =  $("#horaL").val();
     	var minutosL=  $("#minutosL").val();
     	var apL=  $("#cmbHoraL").val();
     	var conductor = $("#cmbConductorV").val();

     	var fechaActual =  $(".fechaActual").attr("id");

     	alert(fechaActual);
     	$.ajax({
                url: "home/agregarReserva",
                type: "POST",
                dataType: "html",
                data:{
                   
                  	 unidad: unidad,          
			     	 vehiculo: vehiculo,
			     	 solicitante: solicitante,
			     	 cedulaR: cedulaR,
			     	 descripcion: descripcion,
			     	 salida: salida,
			     	 destino: destino,
					 horaS: horaS,
			     	 minutosS: minutosS,
			     	 apS: apS,
			     	 horaL: horaL,
			     	 minutosL: minutosL,
			     	 apL: apL,
			     	 rname: responsable,
			     	 fechaActual: fechaActual,
			     	 conductor: conductor
			    },
                success: function(respuesta){
                    
                   alert("Todo ha acabado");
                }
        });
    });

});