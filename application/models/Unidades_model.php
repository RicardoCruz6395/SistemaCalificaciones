<?php

class Unidades_model extends CI_Model{

    public function insert( $materia, $numero){
        return $this->db->insert('unidades', ['UNID_MATERIA' => $materia, 'UNID_NUMERO' => $numero, 'UNID_NOMBRE' => 'UNIDAD ' . $numero ]);
    }
    

}