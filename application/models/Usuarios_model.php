<?php

class Usuarios_model extends CI_Model{


    public function getAlumno( $id_usuario ){
        $this->db->where('ALUM_USUARIO', $id_usuario);
        return $this->db->get('alumnos')->row();
    }

    public function get(){
        try {
            $result = $this->db->get('usuarios');

            if ($result->num_rows() > 0)
                return ["success" => true, "response" => $result->result()];
            return ["success" => false, "response" => "No se pudo obtener datos"];
            
        } catch (Exception $e) {
            return ["success" => false, "response" => $e->getMessage()];
        }
    }

    public function get_by_matricula($matricula){
        try {
            $this->db->where('USUA_MATRICULA', $matricula);
            $result = $this->db->get('usuarios');

            if ($result->num_rows() > 0)
                return ["success" => true, "response" => $result->row()];
            return ["success" => false, "response" => "No se pudo obtener datos"];

        }catch (Exception $e) {
            return ["success" => false, "response" => $e->getMessage()];
        }
    }


    public function get_by_id($id){
        try {
            $this->db->where('id', $id);
            $result = $this->db->get('usuarios');

            if ($result->num_rows() > 0)
                return ["success" => true, "response" => $result->row()];
            return ["success" => false, "response" => "No se pudo obtener datos"];

        } catch (Exception $e) {
            return ["success" => false, "response" => $e->getMessage()];
        }
    }

    public function delete($id){
        try {
            $this->db->where('id', $id);
            $this->db->delete("usuarios");

            if ($this->db->affected_rows() > 0)
                return ["success" => true, "response" => "Registro eliminado"];
            return ["success" => false, "response" => "No se pudo obtener datos"];
          
        } catch (Exception $e) {
            return ["success" => false, "response" => $e->getMessage()];
        }
    }
}