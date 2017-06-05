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

}