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
       $this->db->delete('vehiculos', array('id' => $data));

       if($this->db->affected_rows()==0) {
         return 0;
       }       
       return 1;
    }

    function insert($data)
    {
        if($this->db->insert('vehiculos', $data)){
            return 1;
        }
        return 0;
    }

    function update($id,$data){
        $this->db->where('id', $id);
        $this->db->update('vehiculos', $data);
        if($this->db->affected_rows()==0) {
         return 0;
       }       
       return 1;
    }

    function findById($id){

        $this->db->select('id,referencia,placa,cm');
        $this->db->from('vehiculos');
        $this->db->where('id', $id);
    
        $query = $this->db->get();
        if($query->num_rows() == 1 )
        {
            return $query->result();
        }
        return 0;
    }


    function getVehiculos(){

        $this->db->select('id,referencia,placa,cm');
        $this->db->from('vehiculos');
    
        $query = $this->db->get();
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
        return 0;
    }

}