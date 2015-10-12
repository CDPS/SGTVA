<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		$this->load->view('calendar');
        
	}

	public function vehiculos(){

		$response = $this->load->view('crud_Vehiculos','',TRUE);

		echo $response;
	}
		
	public function cVehiculo(){

		if($_POST) {	
				/*
				* se obtienen dichos valores.
				*/
                $referencia = $_POST["referencia"];
				$placa =  $_POST["placa"];
				$cm =  $_POST["cm"];
				
				if ($referencia!= null && $placa != null && $cm != null) {
					
					$this->load->model("vehiculo");

					$data = array('referencia'=>$referencia,'placa'=>$placa,'cm'=>$cm);

					$this->vehiculo->insert($data);

					echo "ok";
				}
		}
	}
}