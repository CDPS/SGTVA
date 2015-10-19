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
	   
 

//----------------------------------------------VEHICULOS---------------------------------------------//
	public function vehiculos(){

		$this->load->model("vehiculo");
		
		$result = $this->vehiculo->getVehiculos();
		$html='';

		if($result!=0){

			foreach ($result as $row) {
				$html.="<tr id=\"".$row->codigo."\" class=\"click\">";
				$html.="<th class=\"ref\">".$row->referencia."</th>";
				$html.="<th class=\"cm\">".$row->capacidadMax."</th>";
				$html.="<th class=\"pla\">".$row->placa."</th>";
				$html.="</tr>";		
			}
		}

		$data['html']=$html;
		$response = $this->load->view('crud_Vehiculos',$data ,TRUE);

		echo $response;
	}

	public function vehiculosCmb(){

		$this->load->model("vehiculo");
		
		$result = $this->vehiculo->getVehiculos();
		$html='';

		if($result!=0){

			foreach ($result as $row) {
				$html.="<option value=\"".$row->codigo."\">".$row->referencia."</option>";		
			}
		}
		echo $html;
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
					$data = array('referencia'=>$referencia,'placa'=>$placa,'capacidadMax'=>$cm);
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
					$data = array('referencia'=>$referencia,'placa'=>$placa,'capacidadMax'=>$cm);
					$result = $this->vehiculo->update($id,$data);
					if($result==1){
						echo "ok";
					}else{
						echo "fail";
					}
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
					if($result==1){
						echo "ok";
					}else{
						echo "fail";
					}
				}
		}
	}

//----------------------------------------------CONDUCTORES---------------------------------------------//
	public function conductores(){

		$this->load->model("conductor");
		
		$result = $this->conductor->getConductores();
		$html='';

		if($result!=0){

			foreach ($result as $row) {
				$html.="<tr id=\"".$row->codigo."\" class=\"click\">";
				$html.="<th class=\"nom\">".$row->nombre."</th>";
				$html.="<th class=\"tel\">".$row->numTelefono."</th>";
				$html.="</tr>";		
			}
		}

		$data['html']=$html;
		$response = $this->load->view('crud_conductor',$data ,TRUE);

		echo $response;
	}

	public function cConductor(){

		if($_POST) {	
				/*
				* se obtienen dichos valores.
				*/
                $nombre = $_POST["nombre"];
				$telefono =  $_POST["telefono"];
				
				if ($nombre!= null && $telefono != null) {

					$this->load->model("conductor");
					$data = array('nombre'=>$nombre,'numTelefono'=>$telefono);
					$result = $this->conductor->insert($data);
					echo "ok";
				}
		}

	}

	public function uConductor(){

		if($_POST) {	
				/*
				* se obtienen dichos valores.
				*/

				$id = $_POST["id"];
                $nombre = $_POST["nombre"];
				$telefono =  $_POST["telefono"];
				
				if ($nombre!= null && $telefono != null && $id!=null) {
					
					$this->load->model("conductor");
					$data = array('nombre'=>$nombre,'numTelefono'=>$telefono);
					$result = $this->conductor->update($id,$data);
					echo "ok";
				}
		}
	}


	public function eConductor(){

		if($_POST) {	
				/*
				* se obtienen dichos valores.
				*/
				$id=$_POST["id"];
              
				
				if ($id!=null) {
					
					$this->load->model("conductor");
					$result = $this->conductor->delete($id);
					echo "ok";
				}
		}
	}


	public function reserva(){

		if($_POST) {	
				/*
				* se obtienen dichos valores.
				*/

				$this->load->model("unidad");
		
				$result = $this->unidad->getUnidades();
				$unidades='';

				if($result!=0){

					foreach ($result as $row) {
						$unidades.="<tr id=\"".$row->codigo."\" class=\"click\">";
						$unidades.="<td class=\"ref\">".$row->nombre."</td>";
						$unidades.="</tr>";		
					}
				}


				$this->load->model("conductor");
		
				$result = $this->conductor->getConductores();
				$conductores='';

				if($result!=0){

					foreach ($result as $row) {
						$conductores.="<option value=\"".$row->codigo."\">".$row->nombre."</option>";		
					}
				}
				$data['unidades']=$unidades;
				$data['conductores']= $conductores;
				$fecha = $_POST["fecha"];
				$vehiculo = $_POST["vehiculo"];
				$data['fecha']=$fecha;
				$data['vehiculo'] = $vehiculo;
				$response = $this->load->view('reserva',$data ,TRUE);

				echo $response;
		}
	}

	public function agregarReserva(){

		if($_POST) {

			  $unidad      = $_POST["unidad"];    
			  $vehiculo    = $_POST["vehiculo"];
			  $conductor   = $_POST["conductor"];

			  $solicitante = $_POST["solicitante"];

			  $cedulaR     = $_POST["cedulaR"];
			  $descripcion = $_POST["descripcion"];

			  $salida      = $_POST["salida"];
			  $destino     = $_POST["destino"];

			  $horaS       = $_POST["horaS"];
			  $minutosS    = $_POST["minutosS"];
			  $apS         = $_POST["apS"];

			  $horaL       = $_POST["horaL"];
			  $minutosL    = $_POST["minutosL"];
			  $apL         = $_POST["apL"];

			  $fechaActual = $_POST["fechaActual"];
			  
			  $responsable = $_POST["rname"];


			  $this->load->model("solicitante");
			  $data = array('nombre'=>$solicitante);
			  $result = $this->solicitante->insert($data);


			  $this->load->model("actividad");
			  $data = array('nombreResponsable'=>$responsable,'cedulaResponsable'=>$cedulaR,'descripcion'=>$descripcion);
			  $result = $this->actividad->insert($data);


			  if($apS==1){
			  	$horaS+=12;
			  }
			  $dateSalida=$fechaActual." ".$horaS.":".$minutosS.":00";
			  
			  if($apL==1){
			  	$horaL+=12;
			  }
			  $dateLlegada= $fechaActual." ".$horaL.":".$minutosL.":00";

			  $this->load->model("viaje");
			  $data = array('fechaSalida'=>$dateSalida,'fechaLlegada'=>$dateLlegada, 'direccionOrigen'=>$salida, 'direccionDestino'=>$destino);
			  $result = $this->viaje->insert($data);
			

			  $query = $this->actividad->getLastInsert();
			  $respuesta= $query[0];
			  $idActividad= $respuesta->id;
		 
		 	  $query = $this->solicitante->getLastInsert();
			  $respuesta= $query[0];
			  $idSolicitante= $respuesta->id;

			  $query = $this->viaje->getLastInsert();
			  $respuesta= $query[0];
			  $idViaje= $respuesta->id;


			  $this->load->model("registro");
			  $data = array('fechaSolicitud'=>$fechaActual,'codigoViaje'=> $idViaje,'codigoActividad'=>$idActividad,'codigoSolicitante'=>$idSolicitante,'codigoUnidad'=>$unidad,'codigoConductor'=>$conductor,'codigoVehiculo'=>$vehiculo );
			  $result = $this->registro->insert($data);
			  
		}
	}


}