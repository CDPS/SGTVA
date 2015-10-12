<?php
 
class TestVehiculos extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('vehiculo');
    }

    public function index()
	{
		echo "hola";
        
	}

	public function testRestarHora()
	{
 
        $test_name = 'Resta de minutos';
        $hora1 = '00:45';
        $hora2 = '00:20';
        $esperado = '00:25';
        $suma = $this->hora->restarTiempo($hora1,$hora2);
        echo $this->unit->run($suma, $esperado, $test_name);
 
        $test_name = 'Resta de horas';
        $hora1 = '15:15';
        $hora2 = '12:30';
        $esperado = '02:45';
        $suma = $this->hora->restarTiempo($hora1,$hora2);
        echo $this->unit->run($suma, $esperado, $test_name);
 
        $test_name = 'Resta de horas menos minutos';
        $hora1 = '12:08';
        $hora2 = '00:15';
        $esperado = '11:53';
        $suma = $this->hora->restarTiempo($hora1,$hora2);
        echo $this->unit->run($suma, $esperado, $test_name);
 
	}

	public function testFindById(){
		$id=1;
		$referencia="prueba";
		$placa="prueba";
		$cm="2";

		$esperado=array('id' => $id,'referencia'=>$referencia,'placa'=>$placa,'cm'=>$cm);
		
		$query = $this->vehiculo->findById($id);

		$respuesta= $query[0];
		$result = array();
		
		$result['id'] = $respuesta->id;
    	$result['referencia']= $respuesta->referencia;
    	$result['placa'] = $respuesta->referencia;
    	$result['cm']=$respuesta ->cm;
		
		print_r($result);
		
		print_r($esperado);
		echo $this->unit->run($result, $esperado, 'findById');	
	}
}