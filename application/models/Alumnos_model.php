<?php
class Alumnos_model extends CI_Model {
    
    public function getAlumnos(){
        $this->db->where('ALUM_ACTIVO', 1);
        $result = $this->db->get('alumnos');
        return $result->result();
    }

    public function getById( $id ){
        $this->db->where('ALUM_ALUMNO', $id);
        $result = $this->db->get('alumnos');
        return $result->row();
    }

    public function getByMatricula( $matricula ){
        $this->db->where('ALUM_MATRICULA', $matricula);
        $result = $this->db->get('alumnos');
        return $result->row();
    }

    public function insert( $matricula, $nombre, $apellidos, $semestre, $carrera, $usuario_id ){
        $datos = [
            'ALUM_MATRICULA' => $matricula,
            'ALUM_NOMBRE'    => $nombre,
            'ALUM_APELLIDOS' => $apellidos,
            'ALUM_SEMESTRE'  => $semestre,
            'ALUM_CARRERA'   => $carrera,
            'ALUM_USUARIO'   => $usuario_id
         ];
        return $this->db->insert('alumnos', $datos );
    }

    public function update( $id, $nombre, $apellidos, $semestre, $carrera ){
        $this->db->set('ALUM_NOMBRE', $nombre);
        $this->db->set('ALUM_APELLIDOS', $apellidos);
        $this->db->set('ALUM_SEMESTRE', $semestre);
        $this->db->set('ALUM_CARRERA', $carrera);
        $this->db->where('ALUM_ALUMNO', $id);
        return $this->db->update('alumnos');
    }

    public function semestre( $id_alumno ){
         $sql = "SELECT semestres.*
                FROM alumnos
                JOIN semestres ON (ALUM_SEMESTRE = SEME_SEMESTRE)
                WHERE ALUM_ALUMNO = '$id_alumno'
                LIMIT 1;";
        return $this->db->query($sql)->row();
    }
        
    public function getUltimoPeriodo( $id_alumno ){
        
        $sql = "SELECT GRUP_PERIODO FROM alumnos
                JOIN grupos_detalles ON ALUM_ALUMNO = GDET_ALUMNO
                JOIN grupos ON GDET_GRUPO = GRUP_GRUPO
                WHERE ALUM_ALUMNO = $id_alumno
                AND GDET_ACTIVO = 1
                ORDER BY GRUP_PERIODO DESC LIMIT 1;";

        return $this->db->query( $sql )->row();

    }

    public function getMateriasByPeriodo( $id_alumno, $periodo ){
        $sql = "SELECT * FROM (
                    SELECT GDET_DETALLE, MATE_NOMBRE, UNID_UNIDAD, UNID_NUMERO, UNID_NOMBRE 
                    FROM periodos
                    JOIN grupos ON PERI_PERIODO = GRUP_PERIODO
                    JOIN materias ON GRUP_MATERIA = MATE_MATERIA
                    JOIN unidades ON MATE_MATERIA = UNID_MATERIA
                    JOIN grupos_detalles ON GRUP_GRUPO = GDET_GRUPO
                    WHERE GRUP_PERIODO = $periodo
                    AND GDET_ALUMNO = $id_alumno
                    AND GDET_ACTIVO = 1 
                ) a
                LEFT JOIN
                (
                    SELECT CALI_GRUPO_DETALLE, CALI_UNIDAD, CALI_OBTENCION, CALI_PUNTAJE, OBTE_NOMBRE
                    FROM grupos_detalles
                    JOIN calificaciones ON GDET_DETALLE = CALI_GRUPO_DETALLE
                    JOIN obtenciones ON CALI_OBTENCION = OBTE_OBTENCION
                    WHERE GDET_ALUMNO = $id_alumno
                    AND GDET_ACTIVO = 1
                ) b
                ON (GDET_DETALLE = CALI_GRUPO_DETALLE AND UNID_UNIDAD = CALI_UNIDAD )
                ORDER BY MATE_NOMBRE, UNID_UNIDAD ASC;
                ";
        return $this->db->query($sql)->result();
    }


    public function getCalificacionesByGrupo( $grupo ){
        $sql = "SELECT * FROM (
                    SELECT ALUM_MATRICULA, GDET_DETALLE, MATE_NOMBRE, UNID_UNIDAD, UNID_NUMERO, UNID_NOMBRE, ALUM_NOMBRE, ALUM_APELLIDOS
                    FROM periodos
                    JOIN grupos ON PERI_PERIODO = GRUP_PERIODO
                    JOIN materias ON GRUP_MATERIA = MATE_MATERIA
                    JOIN unidades ON MATE_MATERIA = UNID_MATERIA
                    JOIN grupos_detalles ON GRUP_GRUPO = GDET_GRUPO
                    JOIN alumnos ON GDET_ALUMNO = ALUM_ALUMNO
                    WHERE GRUP_GRUPO = $grupo
                    AND GDET_ACTIVO = 1 
                ) a
                LEFT JOIN
                (
                    SELECT CALI_GRUPO_DETALLE, CALI_UNIDAD, CALI_OBTENCION, CALI_PUNTAJE, OBTE_NOMBRE, OBTE_OBTENCION
                    FROM grupos_detalles
                    JOIN calificaciones ON GDET_DETALLE = CALI_GRUPO_DETALLE
                    JOIN obtenciones ON CALI_OBTENCION = OBTE_OBTENCION
                    WHERE GDET_GRUPO= $grupo
                    AND GDET_ACTIVO = 1
                ) b
                ON (GDET_DETALLE = CALI_GRUPO_DETALLE AND UNID_UNIDAD = CALI_UNIDAD )
                ORDER BY MATE_NOMBRE, UNID_UNIDAD ASC;
                ";
        return $this->db->query($sql)->result();
    }



    public function get(){
        try{
            $result = $this->db->get('alumnos');

            if($result->num_rows() > 0) {
                return ["success"=>true, "response"=>$result->result()];
            }else{
                return ["success"=>false, "response"=>"No se pudo obtener datos"];
            }
        }catch(Exception $e){
                return ["success"=>false, "response"=>$e->getMessage()];
        }
    }
    

    public function get_by_id($id){
        try{
            $this->db->where('id', $id);
            $result = $this->db->get('alumnos');

            if($result->num_rows() > 0) {
                return ["success"=>true, "response"=>$result->row()];
            }else{
                return ["success"=>false, "response"=>"No se pudo obtener datos"];
            }
        }catch(Exception $e){
                return ["success"=>false, "response"=>$e->getMessage()];
        }
    }

    public function delete( $id ){
        $this->db->set('ALUM_ACTIVO', 0);
        $this->db->where('ALUM_ALUMNO', $id);
        return $this->db->update('alumnos');
    }

  public function getByGrupo( $id_grupo ){

    $sql = "SELECT ALUM_MATRICULA, ALUM_ALUMNO, ALUM_NOMBRE, ALUM_APELLIDOS, SEME_NOMBRE
                FROM alumnos
                JOIN grupos_detalles ON ALUM_ALUMNO = GDET_ALUMNO
                JOIN grupos ON GRUP_GRUPO = GDET_GRUPO
                JOIN semestres ON ALUM_SEMESTRE = SEME_SEMESTRE
                WHERE GRUP_GRUPO = $id_grupo
                AND GDET_ACTIVO = 1
                AND GRUP_ACTIVO = 1
                ;
            ";

    $result = $this->db->query( $sql );
    if($result->num_rows() > 0) {
      return $result->result();
    }else{
      return null;
    }

  }
}