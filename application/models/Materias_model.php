<?php

class Materias_model extends CI_Model{

    public function getById( $id ){
        $this->db->where('MATE_MATERIA', $id);
        $result = $this->db->get('materias');
        return $result->row();
    }

    public function getMaterias(){
        $this->db->where('MATE_ACTIVO', 1);
        $result = $this->db->get('materias');
        return $result->result();
    }

    public function unidades( $id_materia ){
        $sql = "SELECT unidades.*
                FROM materias
                JOIN unidades ON (MATE_MATERIA = UNID_MATERIA)
                WHERE MATE_MATERIA = '$id_materia';";
        return $this->db->query($sql)->result();
    }

    public function getByCodigo( $codigo ){
        $this->db->where('MATE_CODIGO', $codigo);
        $result = $this->db->get('materias');
        return $result->row();
    }

    public function insert($codigi, $nombre){
        return $this->db->insert('materias',['MATE_CODIGO'=>$codigo, 'MATE_NOMBRE'=>$nombre]);
    }

  public function getImparte()
  {

    $result = $this->db->query("
  SELECT *, count(ALUM_ALUMNO) AS NUM_ALUMNOS FROM materias JOIN grupos ON GRUP_MATERIA = MATE_MATERIA
  JOIN docentes ON GRUP_DOCENTE = DOCE_DOCENTE
  JOIN grupos_detalles ON GRUP_GRUPO = GDET_GRUPO
  JOIN alumnos ON ALUM_ALUMNO = GDET_ALUMNO
  JOIN aulas ON AULA_AULA = GRUP_AULA
  JOIN semestres ON SEME_SEMESTRE = GRUP_SEMESTRE
  JOIN carreras ON CARR_CARRERA = GRUP_CARRERA
WHERE DOCE_DOCENTE = 1 AND MATE_ACTIVO = 1
        ");
    if ($result->num_rows() > 0) {
      return $result->result();
    } else {
      return null;
    }
  }

  public function getByCurso($curso)
  {

    $result = $this->db->query("
  SELECT * FROM materias JOIN grupos ON GRUP_MATERIA = MATE_MATERIA
  JOIN grupos_detalles ON GRUP_GRUPO = GDET_GRUPO
  JOIN aulas ON AULA_AULA = GRUP_AULA
  JOIN semestres ON SEME_SEMESTRE = GRUP_SEMESTRE
  JOIN carreras ON CARR_CARRERA = GRUP_CARRERA
  JOIN unidades ON UNID_MATERIA = MATE_MATERIA
WHERE GRUP_GRUPO = '$curso' AND MATE_ACTIVO = 1
        ");
    if ($result->num_rows() > 0) {
      return $result->row();
    } else {
      return null;
    }
  }
  

    public function update( $id, $nombre ){
        $this->db->set('MATE_NOMBRE', $nombre);
        $this->db->where('MATE_MATERIA', $id);
        return $this->db->update('materias');
    }

    public function delete( $id ){
        $this->db->set('MATE_ACTIVO', 0);
        $this->db->where('MATE_MATERIA', $id);
        return $this->db->update('materias');
    }
    

}