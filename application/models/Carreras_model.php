<?php
class Carreras_model extends CI_Model{

	public function getCarreras( $activo = [0,1] ){
		$this->db->where_in('CARR_ACTIVO',$activo);
    	$result = $this->db->get('carreras');
    	return $result->result();
	}
    
    public function getById( $id ){
		$this->db->where('CARR_CARRERA', $id);
    	$result = $this->db->get('carreras');
    	return $result->row();
    }

    public function getByCodigo( $codigo ){
        $this->db->where('CARR_CODIGO', $codigo);
        $result = $this->db->get('carreras');
        return $result->row();
    }

    public function insert($codigo, $nombre){
        return $this->db->insert('carreras',['CARR_CODIGO'=>$codigo, 'CARR_NOMBRE'=>$nombre]);
    }

    public function update( $id, $nombre ){
        $this->db->set('CARR_NOMBRE', $nombre);
        $this->db->where('CARR_CARRERA', $id);
        return $this->db->update('carreras');
    }

    public function delete( $id ){
        $this->db->set('CARR_ACTIVO', 0);
        $this->db->where('CARR_CARRERA', $id);
        return $this->db->update('carreras');
    }

}