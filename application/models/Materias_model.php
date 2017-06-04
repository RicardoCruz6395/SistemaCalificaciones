<?php

class Materias_model extends CI_Model{

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

  public function get()
  {
    try {
      $result = $this->db->get('docentes');

      if ($result->num_rows() > 0) {
        return ["success" => true, "response" => $result->result()];
      } else {
        return ["success" => false, "response" => "No se pudo obtener datos"];
      }
    } catch (Exception $e) {
      return ["success" => false, "response" => $e->getMessage()];
    }
  }


  public function get_by_id($id)
  {
    try {
      $this->db->where('id', $id);
      $result = $this->db->get('alumnos');

      if ($result->num_rows() > 0) {
        return ["success" => true, "response" => $result->row()];
      } else {
        return ["success" => false, "response" => "No se pudo obtener datos"];
      }
    } catch (Exception $e) {
      return ["success" => false, "response" => $e->getMessage()];
    }
  }

    public function delete( $id ){
        $this->db->set('MATE_ACTIVO', 0);
        $this->db->where('MATE_MATERIA', $id);
        return $this->db->update('materias');
    }
    

  public function get_by_id2($id)
  {

    $result = $this->db->query("SELECT * FROM alumnos WHERE id = '$id'");
    if ($result->num_rows() > 0) {
      return $result->row();
    } else {
      return null;
    }
  }

  // Elaborado por Angel Camara
  public function password()
  {

    $result = $this->db->query("SELECT USUA_PASSWORD FROM alumnos JOIN usuarios ON ALUM_MATRICULA = USUA_MATRICULA");
    if ($result->num_rows() > 0) {
      return $result->row();

      //return result() => muchos
      //return row() => primero, uno

    } else {
      return null;
    }
  }
}