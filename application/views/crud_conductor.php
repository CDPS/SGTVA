<head>
    <script src="application/js/crudConductores.js"></script> 
</head>

<h3>Conductores</h3>

 
<div class="vContainer">
	<div class="dtabla">
		<table class="table table-hover" id="cuerpoT">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Telefono</th>
						</tr>	
					</thead>

					<tbody>
						<?php echo $html ?>
					</tbody>
		</table>
	</div>
	<div class="crudv">

	<fieldset class="scheduler-border">
    <legend class="scheduler-border">Detalle Conductor</legend>
		
		    <label>Nombre:</label>
		    <p><label class="sr-only" for="nombre">Nombre</label>
		    <input type="text" class="form-control" id="nombre" placeholder="Nombre"></p>
		    
		    <label>Telefono:</label>
		  
		    <p><label class="sr-only" for="telefono">Telefono</label>
		    <input type="text" class="form-control" id="telefono" placeholder="Telefono"></p>

		 
             <button type="button" class="btn btn-success" id="cConductor"> Crear </button> 
             <button type="button" class="btn btn-success" id="eConductor"> Eliminar </button> 
             <button type="button" class="btn btn-success" id="uConductor"> Editar </button>   
             <input type="hidden" id="idC"> </input>    

     </fieldset>

	</div>

</div>
