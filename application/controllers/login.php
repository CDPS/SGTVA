<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
 
	 function __construct() {

	   parent::__construct();
	 }
	 
	 function index() {
	   
	   $this->load->helper(array('form'));
	   $this->load->view('login_view');
	 }

	 public function login(){

		if($_POST) {	
				/*
				* se obtienen dichos valores.
				*/
                $cedula = $_POST["cedula"];
				$contrasenia =  $_POST["contrasenia"];

				$this->load->model("usuario");
				$result = $this->usuario->login($cedula, $contrasenia);
				
				if($result) {

			       	$sess_array = array();
			       	foreach($result as $row) {
			       	
			         	$sess_array = array(
			           	'codigo' => $row->codigo,
			           	'nombre' => $row->nombre,
			           	'cedula' => $row->cedula
			         	);

			         	$this->session->set_userdata('logged_in', $sess_array);
			     	}
			     	
			       	return TRUE;
			     }
			     else
			     {
			       $this->form_validation->set_message('check_database', 'Invalid username or password');
			       return false;
			     }
		}
	}
 
}
 
?>