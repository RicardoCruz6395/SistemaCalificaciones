<?php
class Ciclos_escolares_model extends CI_Model{
    
	public function getCiclosEscolares(){
		$this->db->where('CICL_ACTIVO', 1);
    	$result = $this->db->get('ciclos_escolares');
    	return $result->result();
	}

    public function getById( $id ){
		$this->db->where('CICL_CICLO', $id);
    	$result = $this->db->get('ciclos_escolares');
    	return $result->row();
    }

}