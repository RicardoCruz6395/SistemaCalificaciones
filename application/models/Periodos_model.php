<?php
class Periodos_model extends CI_Model{

	public function getPeriodos(){
		$this->db->where('PERI_ACTIVO', 1);
    	$result = $this->db->get('periodos');
    	return $result->result();
	}
    
    public function getPeriodoById( $id ){
		$this->db->where('PERI_PERIODO', $id);
    	$result = $this->db->get('periodos');
    	return $result->row();
    }

    public function getNombrePeriodoById( $id_periodo ){
		
    	$sql = "SELECT PNOM_PERIODO, PNOM_NOMBRE, CICL_NOMBRE
				FROM periodos
				JOIN periodos_nombres ON (PERI_PERIODO_NOMBRE = PNOM_PERIODO)
				JOIN ciclos_escolares ON (PERI_CICLO_ESCOLAR = CICL_CICLO)
				WHERE PERI_PERIODO = '$id_periodo'";

		$result = $this->db->query($sql)->row();

		if($result){
			$partes = explode('-',$result->CICL_NOMBRE);
			switch ($result->PNOM_PERIODO) {
				case 1:
					return $result->PNOM_NOMBRE . ' ' . $partes[1];
					break;
				case 2:
					return $result->PNOM_NOMBRE . ' ' . $result->CICL_NOMBRE;
					break;
				case 3:
					return $result->PNOM_NOMBRE . ' ' . $partes[0];
					break;
			}
		}

		return $result;

    }

    public function getListaPeriodosByAlumno( $id_alumno ){
    	$sql = "SELECT PERI_PERIODO 
				FROM periodos
				JOIN grupos ON PERI_PERIODO = GRUP_PERIODO
				JOIN grupos_detalles ON GRUP_GRUPO = GDET_GRUPO
				WHERE GDET_ALUMNO = '$id_alumno'
				AND GDET_ACTIVO = 1
				GROUP BY PERI_PERIODO;
			";

		return $this->db->query($sql)->result();
    }


}