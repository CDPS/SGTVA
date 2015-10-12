<?php
class Vehiculo extends CI_Model {

    var $placa   = '';
    var $referencia = '';
    var $cantidadMax    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    function getLast(){
 
        $query = $this->db->query("SELECT MAX(id) AS id FROM vehiculos");
        $row = $query->row_array();
        $id = trim($row['id']);
        return $id;
    }

    function delete($data){
        $this->db->delete('vehiculos', array('id' => $data)); 

    }

    function insert($data)
    {
        $this->db->insert('vehiculos', $data);
    }

    function update($id,$data){
        $this->db->where('id', $id);
        $this->db->update('vehiculos', $data);
    }

    function getVehiculos(){

        $this->db->select('codigo,referencia,placa,cantidadMax');
        $this->db->from('vehiculos');
    
        $query = $this->db->get();
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
        return 0;
    }

    

}