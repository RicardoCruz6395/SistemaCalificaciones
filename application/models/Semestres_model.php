<?php
class Semestres_model extends CI_Model{
    
    public function getById( $semestre ){
        $result = $this->db->query("SELECT SEME_NOMBRE FROM semestres WHERE SEME_SEMESTRE =  $semestre;");
        return $result->row();
    }

    public function getSemestres(){
    	$result = $this->db->get('semestres');
    	return $result->result();
    }

   
}