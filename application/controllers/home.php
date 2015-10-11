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
}