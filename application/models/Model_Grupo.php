<?php
class Grupo extends CI_Model{
    // Elaborado por Angel Camara
    public function test(){

        $result = $this->db->query("SELECT * FROM alumnos");
        if($result->num_rows() > 0) {
            return $result->result();
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