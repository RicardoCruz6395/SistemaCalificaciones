<?php
/**
 * Date: 09/05/2017
 * Time: 06:47 PM
 */
class Docentes_model extends CI_Model
{
    // Elaborado por Angel Camara
    public function test(){

        $result = $this->db->query("SELECT * FROM alumnos");
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

    // Elaborado por Angel Camara
    public function password(){

        $result = $this->db->query("SELECT USUA_PASSWORD FROM alumnos JOIN usuarios ON ALUM_MATRICULA = USUA_MATRICULA");
        if($result->num_rows() > 0) {
            return $result->row();

            //return result() => muchos
            //return row() => primero, uno

        }else{
            return null;
        }
    }
}