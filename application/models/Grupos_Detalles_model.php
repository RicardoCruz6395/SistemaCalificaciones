<?php
class Grupos_Detalles_model extends CI_Model{
    
    public function get_id(){
        
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