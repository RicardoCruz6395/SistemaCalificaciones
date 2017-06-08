<?php
class Grupos_Detalles_model extends CI_Model{
    
    public function getById( $id ){
        $this->db->where('GDET_DETALLE', $id);
        $result = $this->db->get('grupos_detalles');
        return $result->row();
    }

    public function getByGrupo( $id_grupo ){
		$this->db->where('GDET_GRUPO', $id_grupo);
		$this->db->where('GDET_ACTIVO', 1);
        $result = $this->db->get('grupos_detalles');
        return $result->result();
    }

    public function grupo( $id_grupo_detalle ){
    	$sql = "SELECT grupos.*
				FROM grupos
				JOIN grupos_detalles ON (GRUP_GRUPO = GDET_GRUPO)
				WHERE GDET_DETALLE = '$id_grupo_detalle'
				LIMIT 1;";
		return $this->db->query($sql)->row();
    }

    public function insert($id_grupo, $id_alumno){
        return $this->db->insert('grupos_detalles', [ 'GDET_GRUPO' => $id_grupo, 'GDET_ALUMNO' => $id_alumno ]);       
    }

    public function delete( $id ){
        $this->db->set('GDET_ACTIVO', 0);
        $this->db->where('GDET_DETALLE', $id);
        return $this->db->update('grupos_detalles');
    }

}