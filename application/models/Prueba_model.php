<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 09/05/2017
 * Time: 06:47 PM
 */
class Prueba_model extends CI_Model
{
    public function test(){

        $result = $this->db->query("SELECT * FROM alumnos");
        if($result->num_rows() > 0) {
            return $result->result();
        }else{
            return null;
        }
    }
}