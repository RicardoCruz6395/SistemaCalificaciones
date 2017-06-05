<?php
class Aulas_model extends CI_Model{

	public function getAulas(){
		$this->db->where('AULA_ACTIVO', 1);
    	$result = $this->db->get('aulas');
    	return $result->result();
	}
    
    public function getById( $id ){
		$this->db->where('AULA_AULA', $id);
    	$result = $this->db->get('aulas');
    	return $result->row();
    }

    public function getByNombre( $nombre ){
		$this->db->where('AULA_NOMBRE', $nombre);
    	$result = $this->db->get('aulas');
    	return $result->row();
    }

    public function insert( $nombre ){
        return $this->db->insert('aulas',['AULA_NOMBRE' => $nombre]);
    }

    public function update( $id, $nombre ){
        $this->db->set('AULA_NOMBRE', $nombre);
        $this->db->where('AULA_AULA', $id);
        return $this->db->update('aulas');
    }

    public function delete( $id ){
        $this->db->set('AULA_ACTIVO', 0);
        $this->db->where('AULA_AULA', $id);
        return $this->db->update('aulas');
    }

}