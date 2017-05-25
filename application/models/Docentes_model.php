<?php

class Docentes_model extends CI_Model{


    public function getGruposByPeriodo( $id_periodo ){

        $sql = "SELECT GRUP_GRUPO, MATE_CLAVE, MATE_NOMBRE, SEME_NOMBRE, COUNT(*) NUM_ALUMNOS, AULA_NOMBRE, CARR_NOMBRE 
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

    public function delete($id){
        try{

            $this->db->where('id', $id);
            $this->db->delete("alumnos");

            if($this->db->affected_rows() > 0){
                return ["success"=>true, "response"=>"Registro eliminado"];
            }else{
                return ["success"=>false, "response"=>"No se pudo obtener datos"];
            }
        }catch(Exception $e){
                return ["success"=>false, "response"=>$e->getMessage()];
        }
    }
    

    public function get_by_id2($id){

        $result = $this->db->query("SELECT * FROM alumnos WHERE id = '$id'");
        if($result->num_rows() > 0) {
            return $result->row();
        }else{
            return null;
        }
    }

}