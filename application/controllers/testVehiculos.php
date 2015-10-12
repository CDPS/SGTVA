<?php
 
class TestVehiculo extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('vehiculo');
       
    }

    public function index(){
    	echo "prueba";
    }


}