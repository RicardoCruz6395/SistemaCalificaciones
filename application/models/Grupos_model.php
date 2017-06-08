<?php
class Grupos_model extends CI_Model{

    public function getById( $id ){
        $this->db->where_in('GRUP_GRUPO', $id);
        return $this->db->get('grupos')->row();
    }

    public function getGrupos( $activo = [0,1] ){
        $this->db->where_in('GRUP_ACTIVO', $activo);
        return $this->db->get('grupos')->result();
    }

    public function getGruposByPeriodo( $id_periodo ){
        $sql = "SELECT * FROM grupos
                WHERE GRUP_PERIODO = $id_periodo
                AND GRUP_ACTIVO = 1;";
        return $this->db->query($sql)->result();
    }
    
    public function get( $periodo, $semestre, $materia, $docente, $carrera, $aula ){
        $this->db->where('GRUP_PERIODO', $periodo);
        $this->db->where('GRUP_SEMESTRE', $semestre);
        $this->db->where('GRUP_MATERIA', $materia);
        $this->db->where('GRUP_DOCENTE', $docente);
        $this->db->where('GRUP_CARRERA', $carrera);
        $this->db->where('GRUP_AULA', $aula);
        $this->db->where('GRUP_ACTIVO', 1);
        $result = $this->db->get('grupos');
        return $result->row();
    }

    public function grupos_detalles( $id_grupo ){
        $sql = "SELECT grupos_detalles.* FROM grupos JOIN grupos_detalles ON (GRUP_GRUPO = GDET_GRUPO) WHERE GRUP_GRUPO = '$id_grupo';";
        return $this->db->query($sql)->result();
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

    public function insert( $periodo, $semestre, $materia, $docente, $carrera, $aula ){
        $datos = [
            'GRUP_PERIODO'  => $periodo,
            'GRUP_SEMESTRE' => $semestre,
            'GRUP_MATERIA'  => $materia,
            'GRUP_DOCENTE'  => $docente,
            'GRUP_CARRERA'  => $carrera,
            'GRUP_AULA'     => $aula,
        ];
        return $this->db->insert('grupos', $datos);
    }

    public function delete( $id ){
        $this->db->set('GRUP_ACTIVO', 0);
        $this->db->where('GRUP_GRUPO', $id);
        return $this->db->update('grupos');
    }

}