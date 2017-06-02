<?php
class Grupos_model extends CI_Model{

    public function getGrupos(){
        $sql = "SELECT * FROM grupos
                WHERE GRUP_ACTIVO = 1;";
        return $this->db->query($sql)->row();
    }

    
    public function materia( $id_grupo ){
    	$sql = "SELECT materias.* FROM grupos JOIN materias ON (GRUP_MATERIA = MATE_MATERIA) WHERE GRUP_GRUPO = '$id_grupo' LIMIT 1;";
        return $this->db->query($sql)->row();
    }

    public function docente( $id_grupo ){
    	$sql = "SELECT docentes.* FROM grupos JOIN docentes ON (GRUP_DOCENTE = DOCE_DOCENTE) WHERE GRUP_GRUPO = '$id_grupo' LIMIT 1;";
        return $this->db->query($sql)->row();
    }

    public function periodo( $id_grupo ){
    	$sql = "SELECT periodos.* FROM grupos JOIN periodos ON (GRUP_PERIODO = PERI_PERIODO) WHERE GRUP_GRUPO = '$id_grupo' LIMIT 1;";
        return $this->db->query($sql)->row();
    }

}