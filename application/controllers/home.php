<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

 
 	function index() {
   		
   		
	     if($this->session->userdata('logged_in')) {

		     $session_data = $this->session->userdata('logged_in');
		     $data['nombre'] = $session_data['nombre'];
		     $this->load->view('calendar', $data);
		
		} else {
		     //If no session, redirect to login page
		     redirect('login', 'refresh');
		}
 	}
 
	public function logout() {

	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('home', 'refresh');
	}
	   
 

	public function vehiculos(){

		$this->load->model("vehiculo");
		
		$result = $this->vehiculo->getVehiculos();
		$html='';

		if($result!=0){

			foreach ($result as $row) {
				$html.="<tr id=\"".$row->codigo."\" class=\"click\">";
				$html.="<th class=\"referencia\">".$row->referencia."</th>";
				$html.="<th class=\"placa\">".$row->placa."</th>";
				$html.="<th class=\"cantidadMax\">".$row->cantidadMax."</th>";
				$html.="</tr>";		
			}
		}

		$data['html']=$html;
		$response = $this->load->view('crud_Vehiculos',$data ,TRUE);

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
					$result = $this->vehiculo->insert($data);
				
					echo "ok";
				}
		}
	}

	public function uVehiculo(){

		if($_POST) {	
				/*
				* se obtienen dichos valores.
				*/

				$id = $_POST["id"];
                $referencia = $_POST["referencia"];
				$placa =  $_POST["placa"];
				$cm =  $_POST["cm"];
				
				if ($referencia!= null && $placa != null && $cm != null&& $id!=null) {
					
					$this->load->model("vehiculo");
					$data = array('referencia'=>$referencia,'placa'=>$placa,'cm'=>$cm);
					$result = $this->vehiculo->update($id,$data);
					echo "ok";
				}
		}
	}

	public function eVehiculo(){

		if($_POST) {	
				/*
				* se obtienen dichos valores.
				*/
				$id=$_POST["id"];
              
				
				if ($id!=null) {
					
					$this->load->model("vehiculo");
					$result = $this->vehiculo->delete($id);
					echo "ok";
				}
		}
	}
}