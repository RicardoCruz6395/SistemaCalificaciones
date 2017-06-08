<?php

class Unidades_model extends CI_Model{

    public function insert( $materia, $numero){
        return $this->db->insert('unidades', ['UNID_MATERIA' => $materia, 'UNID_NUMERO' => $numero, 'UNID_NOMBRE' => 'UNIDAD ' . $numero ]);
    }
    
    public function getById( $id ){
    	$this->db->where('UNID_UNIDAD', $id);
    	$result = $this->db->get('unidades');
    	return $result->row();
    }

    public function getByMateria( $id_materia ){
    	$this->db->where('UNID_MATERIA', $id_materia);
    	$this->db->order_by('UNID_NUMERO', 'ASC');
    	$result = $this->db->get('unidades');
    	return $result->result();
    }

}