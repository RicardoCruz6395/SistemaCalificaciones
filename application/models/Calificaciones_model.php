<?php
/**
 * Date: 09/05/2017
 * Time: 06:47 PM
 */
class Calificaciones_model extends CI_Model{
  public function getByGrupo($grupo){
    $sql = "
    SELECT ALUM_MATRICULA, CALI_CALIFICACION, CALI_UNIDAD ,CALI_PUNTAJE, OBTE_NOMBRE FROM calificaciones
    JOIN obtenciones ON CALI_OBTENCION = OBTE_OBTENCION
    JOIN grupos_detalles ON GDET_DETALLE = CALI_GRUPO_DETALLE
    JOIN alumnos ON ALUM_ALUMNO = GDET_ALUMNO
    JOIN grupos ON GRUP_GRUPO = GDET_GRUPO
    WHERE GRUP_GRUPO = $grupo;
    ";

    $result = $this->db->query( $sql );
    if($result->num_rows() > 0) {
      return $result->result();
    }else{
      return null;
    }
  }

  public function getByAlumno($alumnos, $grupo){
    foreach($alumnos as $alum){
      $sql = "
        SELECT ALUM_MATRICULA, CALI_CALIFICACION, CALI_UNIDAD ,CALI_PUNTAJE, OBTE_NOMBRE FROM calificaciones
          JOIN obtenciones ON CALI_OBTENCION = OBTE_OBTENCION
          JOIN grupos_detalles ON GDET_DETALLE = CALI_GRUPO_DETALLE
          JOIN alumnos ON ALUM_ALUMNO = GDET_ALUMNO
          JOIN grupos ON GRUP_GRUPO = GDET_GRUPO
        WHERE ALUM_ALUMNO = $alum->ALUM_ALUMNO AND  
        GRUP_GRUPO = $grupo;  
        ";
      $alum->CALIFICACIONES = $this->db->query($sql)->result();
    }
    return $alumnos;
  }

}