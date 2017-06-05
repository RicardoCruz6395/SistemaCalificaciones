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

    public function getById( $id ){
		$this->db->where('PERI_PERIODO', $id);
    	$result = $this->db->get('periodos');
    	return $result->row();
    }

    public function get( $tipo, $ciclo ){
		$this->db->where('PERI_PERIODO_NOMBRE', $tipo);
		$this->db->where('PERI_CICLO_ESCOLAR', $ciclo);
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
				case 2:
					return $result->PNOM_NOMBRE . ' ' . $partes[1];
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

    public function getListaPeriodosByDocente( $id_docente ){
    	$sql = "SELECT PERI_PERIODO 
				FROM periodos
				JOIN grupos ON PERI_PERIODO = GRUP_PERIODO
				WHERE GRUP_DOCENTE = '$id_docente'
				AND GRUP_ACTIVO = 1
				GROUP BY PERI_PERIODO;
			";

		return $this->db->query($sql)->result();
    }

    public function insert( $tipo, $ciclo ){
    	return $this->db->insert('periodos', ['PERI_PERIODO_NOMBRE' => $tipo, 'PERI_CICLO_ESCOLAR' => $ciclo]);
    }
    
    public function update( $id, $periodo_nombre, $ciclo_escolar ){
        $this->db->set('PERI_PERIODO_NOMBRE', $periodo_nombre);
        $this->db->set('PERI_CICLO_ESCOLAR', $ciclo_escolar);
        $this->db->where('PERI_PERIODO', $id);
        return $this->db->update('periodos');
    }

    public function delete( $id ){
        $this->db->set('PERI_ACTIVO', 0);
        $this->db->where('PERI_PERIODO', $id);
        return $this->db->update('periodos');
    }

    


}