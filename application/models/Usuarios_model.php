<?php

class Usuarios_model extends CI_Model{


    public function getDatosUsuario(){
        $id_usuario = $this->session->userdata['id'];
        switch ($this->session->userdata('rol')){
            case 1:
                $this->db->where('DOCE_USUARIO', $id_usuario);
                return $this->db->get('docentes')->row();
            break;
            case 2:
                $this->db->where('ALUM_USUARIO', $id_usuario);
                return $this->db->get('alumnos')->row();
                break;
            case 3:
                $this->db->where('ADMI_USUARIO', $id_usuario);
                return $this->db->get('administradores')->row();
                break;
        }
    }

    public function getNombreUsuario(){
        $usuario = $this->getDatosUsuario();
        switch ($this->session->rol){
            case 1:
                return $usuario->DOCE_NOMBRE;
            break;
            case 2:
                return $usuario->ALUM_NOMBRE;
                break;
            case 3:
                return $usuario->ADMI_NOMBRE;
                break;
        }
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