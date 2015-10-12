<?php

Class Usuario extends CI_Model {


    var $nombre   = '';
    var $cedula = '';
    var $contrasenia    = '';

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function login($cedula, $contrasenia) {

      $this -> db -> select('codigo, nombre, cedula, contrasenia');
      $this -> db -> from('Usuarios');
      $this -> db -> where('cedula', $cedula);
      $this -> db -> where('contrasenia', $contrasenia);
      $this -> db -> limit(1);
 
      $query = $this -> db -> get();
     
      if($query -> num_rows() == 1) {

        return $query->result();

      } else {

         return false;
      }
    }
}
?>