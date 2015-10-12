<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		$this->load->view('calendar');
        
	}

	public function vehiculos(){
		$this->load->model("vehiculo");
		
		$result = $this->vehiculo->getVehiculos();
		$html='';

		if($result!=0){

			foreach ($result as $row) {
				$html.="<tr id=\"".$row->id."\" class=\"click\">";
				$html.="<th class=\"ref\">".$row->referencia."</th>";
				$html.="<th class=\"cm\">".$row->cm."</th>";
				$html.="<th class=\"pla\">".$row->placa."</th>";
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