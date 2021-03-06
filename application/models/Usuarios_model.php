<?php

class Usuarios_model extends CI_Model{


    public function insert( $matricula, $hash, $rol ){
        $datos = [
            'USUA_MATRICULA' => $matricula,
            'USUA_PASSWORD'  => $hash,
            'USUA_ROL'       => $rol 
        ];
        return $this->db->insert('usuarios', $datos);
    }

    public function changeStatus( $id_usuario, $status = null ){
        $status = ($status == null ) ? '(USUA_ACTIVO * -1 + 1)' : $status;
        $sql = "UPDATE usuarios
                SET USUA_ACTIVO = $status
                WHERE USUA_USUARIO = $id_usuario;";
        return $this->db->query( $sql );
    }

    public function getDatosUsuario(){
        $id_usuario = $this->session->id;
        switch ($this->session->rol){
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
            $this->db->where('USUA_USUARIO', $id);
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

    public function set_password($password){
        $data = array(
               'USUA_PASSWORD' => $password
            );

        $this->db->where('USUA_USUARIO', $this->session->id);
        $this->db->update('usuarios', $data); 

        if ($this->db->affected_rows() > 0){
            return true;
        }
        return false;
    }
}