<?php
 
class TestReservas extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('registro');
    }

  public function index()
	{
		$this->testgetReservas();
		$this->testgetRegistrosDia();
		$this->testFechas();
	}

	public function testgetReservas(){

		$vehiculo =5;
		$fecha="2015-6-28";

		

		$nombre="Cristian";
		$fechaSalida ="2015-06-28 06:00:00";
		$fechaLlegada ="2015-06-28 20:00:00";
		$descripcion = "Viaje a islas margarita";
		$direccionOrigen = "Armeni";
		$solicitante = "Fabio";

		$esperado=array('nombre' => $nombre,'fechaSalida'=>$fechaSalida,'fechaLlegada' =>$fechaLlegada, 'descripcion' =>$descripcion, 
						'direccionOrigen'=>$direccionOrigen, 'solicitante'=>$solicitante);
		
		$query = $this->registro->getRegistros($fecha,$vehiculo);

		$respuesta = $query[0];
		$result = array();
		$result['nombre'] = $respuesta->nombre;
    	$result['fechaSalida']= $respuesta->fechaSalida;
    	$result['fechaLlegada'] = $respuesta->fechaLlegada;
		$result['descripcion'] = $respuesta->descripcion;
		$result['direccionOrigen'] = $respuesta->direccionOrigen;
		$result['solicitante'] = $respuesta->solicitante;

		echo $this->unit->run($result, $esperado, 'getReservasTest');	
		
	}


	public function testgetRegistrosDia(){


		$esperado=array('codigoVehiculo' =>4,'codigoConductor'=>8,'fechaLlegada' =>"2015-10-30 08:45:00", 'fechaSalida' =>"2015-10-30 07:00:00");
		$fecha = "2015-10-30";
		$query = $this->registro->getRegistrosDia($fecha);
		$respuesta = $query[0];
		$result = array();

		$result['codigoVehiculo'] = $respuesta->codigoVehiculo;
    	$result['codigoConductor']= $respuesta->codigoConductor;
    	$result['fechaLlegada'] = $respuesta->fechaLlegada;
		$result['fechaSalida'] = $respuesta->fechaSalida;
		
		echo $this->unit->run($result, $esperado, 'testgetRegistrosDia');	
	}

	public function testFechas(){

		
		$fechaInicio="2015-11-25 7:00:00";
		$fechaFin=   "2015-11-25 9:00:00";

		$fechaInicio1="2015-11-25 10:00:00";
		$fechaFin1=   "2015-11-25 11:00:00";

		if($fechaFin1>$fechaInicio && $fechaFin1 <$fechaFin){
			
			echo $this->unit->run(0, 1, 'testFechas');	
		}else{
			echo $this->unit->run(1, 1, 'testFechas');	
		}
	}
	
}