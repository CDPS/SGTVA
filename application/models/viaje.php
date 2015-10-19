<?php
class Viaje extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function insert($data)
    {
        if($this->db->insert('viajes', $data)){
            return 1;
        }
        return 0;
    }

    function findById($id){


        $this->db->select('codigo,referencia,placa,capacidadMax');
        $this->db->from('vehiculos');
        $this->db->where('codigo', $id);
    
        $query = $this->db->get();
        if($query->num_rows() == 1 )
        {
            return $query->result();
        }
        return 0;
    }

}