<?php
class Alumnos_model extends CI_Model {
    
        
    public function getUltimoPeriodo( $id_alumno ){
        
        $sql = "SELECT GRUP_PERIODO FROM alumnos
                JOIN grupos_detalles ON ALUM_ALUMNO = GDET_ALUMNO
                JOIN grupos ON GDET_GRUPO = GRUP_GRUPO
                WHERE ALUM_ALUMNO = $id_alumno
                ORDER BY GRUP_PERIODO DESC LIMIT 1;";

        return $this->db->query( $sql )->row();

    }

    public function getMateriasByPeriodo( $periodo ){
        
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
}