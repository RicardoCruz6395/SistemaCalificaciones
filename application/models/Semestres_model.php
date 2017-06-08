<?php
class Semestres_model extends CI_Model{
    
    public function getById( $id ){
        $this->db->where('SEME_SEMESTRE', $id);
    	$result = $this->db->get('semestres');
        return $result->row();
    }

    public function getSemestres(){
    	$result = $this->db->get('semestres');
    	return $result->result();
    }

   
}