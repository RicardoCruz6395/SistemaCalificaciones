<?php

class Docentes_model extends CI_Model{

    public function getById( $id ){
        $this->db->where('DOCE_DOCENTE', $id);
        $result = $this->db->get('docentes');
        return $result->row();
    }

    public function getByMatricula( $matricula ){
        $this->db->where('DOCE_MATRICULA', $matricula);
        $result = $this->db->get('docentes');
        return $result->row();
    }    

    public function getDocentes( $activo = [0,1] ){
        $this->db->where_in('DOCE_ACTIVO', $activo);
        $result = $this->db->get('docentes');
        return $result->result();
    }

    public function usuario( $id_docente ){
        $sql = "SELECT usuarios.*
                FROM docentes
                JOIN usuarios ON (DOCE_USUARIO = USUA_USUARIO)
                WHERE DOCE_DOCENTE = '$id_docente'
                LIMIT 1;";
        return $this->db->query($sql)->row();
    }

    public function insert( $matricula, $nombre, $apellidos, $usuario_id ){
        $datos = [
            'DOCE_MATRICULA' => $matricula,
            'DOCE_NOMBRE'    => $nombre,
            'DOCE_APELLIDOS' => $apellidos,
            'DOCE_USUARIO'   => $usuario_id
         ];
        return $this->db->insert('docentes', $datos );
    }

    public function update( $id, $nombre, $apellidos ){
        $this->db->set('DOCE_NOMBRE'    , $nombre);
        $this->db->set('DOCE_APELLIDOS' , $apellidos);
        $this->db->where('DOCE_DOCENTE', $id);
        return $this->db->update('docentes');
    }

    public function getGruposByPeriodo( $id_periodo ){

        $sql = "SELECT GRUP_GRUPO, MATE_CODIGO, MATE_NOMBRE, SEME_NOMBRE, COUNT(*) NUM_ALUMNOS, AULA_NOMBRE, CARR_NOMBRE 
                FROM grupos
                JOIN grupos_detalles ON GRUP_GRUPO = GDET_GRUPO
                JOIN aulas ON GRUP_AULA = AULA_AULA
                JOIN carreras ON GRUP_CARRERA = CARR_CARRERA
                JOIN materias ON GRUP_MATERIA = MATE_MATERIA
                JOIN semestres ON GRUP_SEMESTRE = SEME_SEMESTRE
                WHERE GRUP_DOCENTE = 1
                AND GDET_ACTIVO = 1
                AND GRUP_ACTIVO = 1
                AND GRUP_PERIODO = $id_periodo
                GROUP BY GRUP_GRUPO
                ;
            ";

        $result = $this->db->query( $sql );
        if($result->num_rows() > 0) {
            return $result->result();
        }else{
            return null;
        }

    }

    public function get(){
        try{
            $result = $this->db->get('docentes');

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
        $this->db->set('DOCE_ACTIVO', 0);
        $this->db->where('DOCE_DOCENTE', $id);
        return $this->db->update('docentes');
    }
    

    public function get_by_id2($id){

        $result = $this->db->query("SELECT * FROM alumnos WHERE id = '$id'");
        if($result->num_rows() > 0) {
            return $result->row();
        }else{
            return null;
        }
    }

    public function getUltimoPeriodo( $id_docente ){
        
        $sql = "SELECT GRUP_PERIODO FROM docentes
                JOIN grupos ON GRUP_DOCENTE = DOCE_DOCENTE
                WHERE DOCE_DOCENTE = $id_docente
                ORDER BY GRUP_PERIODO DESC LIMIT 1;";

        return $this->db->query( $sql )->row();

    }



}