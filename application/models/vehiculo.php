<?php
class Vehiculo extends CI_Model {

    var $placa   = '';
    var $referencia = '';
    var $cm    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function delete($data){
        $this->db->delete('vehiculos', array('codigo' => $data)); 

    }

    function insert($data)
    {
        $this->db->insert('vehiculos', $data);
    }

    function update($id,$data){
        $this->db->where('codigo', $id);
        $this->db->update('vehiculos', $data);
    }

    function getVehiculos(){

        $this->db->select('codigo,referencia,placa,capacidadMax');
        $this->db->from('vehiculos');
    
        $query = $this->db->get();
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
        return 0;
    }

    

}