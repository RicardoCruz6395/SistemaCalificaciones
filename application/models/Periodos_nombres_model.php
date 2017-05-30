<?php
class Periodos_nombres_model extends CI_Model{
    
    public function getPeriodoNombreById( $id ){
		$this->db->where('PNOM_PERIODO', $id);
    	$result = $this->db->get('periodos_nombre');
    	return $result->row();
    }

}