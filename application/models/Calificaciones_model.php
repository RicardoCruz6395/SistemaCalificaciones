<?php
class Calificaciones_model extends CI_Model{

    public function getByGrupoDetalle( $grupo_detalle ){
		$this->db->where('CALI_GRUPO_DETALLE', $grupo_detalle);
    	$result = $this->db->get('calificaciones');
    	return $result->result();
    }

}