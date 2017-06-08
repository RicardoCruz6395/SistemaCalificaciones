<?php
class Calificaciones_model extends CI_Model{

	public function getAulas( $activo = [0,1] ){
		$this->db->where_in('AULA_ACTIVO', $activo);
    	$result = $this->db->get('aulas');
    	return $result->result();
	}
    
    public function getById( $id ){
		$this->db->where('AULA_AULA', $id);
    	$result = $this->db->get('aulas');
    	return $result->row();
    }

    public function getByGrupoDetalle( $grupo_detalle ){
		$this->db->where('CALI_GRUPO_DETALLE', $grupo_detalle);
    	$result = $this->db->get('calificaciones');
    	return $result->result();
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