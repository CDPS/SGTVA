
<head>
    <script src="application/js/dia.js"></script> 
</head>

<div class="cReserva">

	<fieldset class="contenedorReserva">
    <legend class="contenedorReserva">Reserva Vehiculo <?php echo $fecha ?> </legend>
		
		<p><label for="cmbConductorV">Conductor:</label>
        <select  class="form-control" id="cmbConductorV">
	        <option value='0'>Conductor</option>
	        <?php echo $conductores ?>
		</select></p>

		<div class="cSolicitante">
	    	<fieldset class="contenedorSolicitate">
	    	<legend class="contenedorSolicitate">Solicitante</legend>

	    		<label>Solicitante:</label> <input type="text" class="form-control" id="solicitante"/>
				
				<label>Buscar:</label> <input type="text" name="buscador" class="form-control" id="buscador" />
				<br>

				<label>Unidades</label>
				<div id="unidades">
				<table id="tablaUnidades" class="table table-hover">    
					  <tbody>  
					     <?php echo $unidades ?>
					  </tbody>  
				</table>
			    </div>   
	    	 </fieldset>
		 </div>

		<div class="cActividad"> 
			<fieldset class="contenedorActividad">
	    	<legend class="contenedorActividad">Actividad</legend>
			
	    		<fieldset class="contenedorResponsable">
		    	<legend class="contenedorResponsable">Responsable</legend>
				
		    		<label>Nombre:</label> <input type="text" class="form-control" id="nombreR"/>
				
					<label id="cedulal">Cedula:</label> <input type="text" class="form-control" id="cedulaR" />
				       
				        
		    	 </fieldset>
			        
		    	 <label id="lDescripcion" for="descripcion">Descripción:</label>
  				 <textarea class="form-control" rows="8" id="descripcion"></textarea>

			        
	    	 </fieldset>
    	</div>


		<div class="cHoras"> 
			
			<fieldset class="contenedorSitio">
	    	<legend class="contenedorSitio">Sitio</legend>
			
	    		<label>Salida:</label> <input type="text" class="form-control" id="salida"/>
				
				<label id="destinol">Destino:</label> <input type="text" class="form-control" id="destino" />
			        
	    	 </fieldset>
			  

			<fieldset class="contenedorHora">
				

	    	<legend class="contenedorHora">Hora</legend>
				
				<div class="contenedorHoraS">
					
					  <label id="sH">Salida:</label>

					  <input type="text" class="form-control" id="horaS"/>
					  :
					  <input type="text" class="form-control" id="minutosS"/>

					  <select  class="form-control" id="cmbHoraS">
	        			<option value='0'>am</option>
	        			<option value='1'>pm</option>
	        		  </select>
        		 </div>

				
				<div class="contenedorHoraL">
					
				      <label id="sL">Llegada:</label>

					  <input type="text" class="form-control" id="horaL"/>
					  :
					  <input type="text" class="form-control" id="minutosL"/>

					 <select  class="form-control" id="cmbHoraL">
	        			<option value='0'>am</option>
	        			<option value='1'>pm</option>
	        		  </select>
        		 </div>
			      
	    	 </fieldset>
	
    	</div>

    	<div id="contenedorBotones">
    	 <button type="button" class="btn btn-success" id="cRV"> Aceptar </button> 
 		</div>
     </fieldset>
     
     <input class="unidadE" id=""> </input>
     <input class="vehiculoE" id="<?php echo $vehiculo?>"> </input>
     <input class="fechaActual" id="<?php echo $fecha ?>"> </input>
</div>