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
}