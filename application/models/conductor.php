<?php
class Conductor extends CI_Model {

    var $nombre  = '';
    var $numTelefono = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function delete($data){
        $this->db->delete('conductores', array('codigo' => $data)); 

    }

    function insert($data)
    {
        $this->db->insert('conductores', $data);
    }

    function update($id,$data){
        $this->db->where('codigo', $id);
        $this->db->update('conductores', $data);
    }

    function getConductores(){

        $this->db->select('codigo,nombre,numTelefono');
        $this->db->from('conductores');
    
        $query = $this->db->get();
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
        return 0;
    }

    

}