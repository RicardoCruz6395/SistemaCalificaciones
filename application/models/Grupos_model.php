<?php
class Grupos_model extends CI_Model{
    // Elaborado por Angel Camara
    public function test(){

        $result = $this->db->query("SELECT * FROM alumnos");
        if($result->num_rows() > 0) {
            return $result->result();
        }else{
            return null;
        }
    }

}