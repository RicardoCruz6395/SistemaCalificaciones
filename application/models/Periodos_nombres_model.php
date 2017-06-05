<?php
class Periodos_nombres_model extends CI_Model{
    
    public function getPeriodosNombres(){
		$this->db->where('PNOM_ACTIVO', 1);
    	$result = $this->db->get('periodos_nombres');
    	return $result->result();
    }

    public function getById( $id ){
		$this->db->where('PNOM_PERIODO', $id);
    	$result = $this->db->get('periodos_nombres');
    	return $result->row();
    }

}