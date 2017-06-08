<?php

class Docentes_model extends CI_Model{

    public function getById( $id ){
        $this->db->where('DOCE_DOCENTE', $id);
        $result = $this->db->get('docentes');
        return $result->row();
    }

    public function getByMatricula( $matricula ){
        $this->db->where('DOCE_MATRICULA', $matricula);
        $result = $this->db->get('docentes');
        return $result->row();
    }    

    public function getDocentes( $activo = [0,1] ){
        $this->db->where_in('DOCE_ACTIVO', $activo);
        $result = $this->db->get('docentes');
        return $result->result();
    }

    public function usuario( $id_docente ){
        $sql = "SELECT usuarios.*
                FROM docentes
                JOIN usuarios ON (DOCE_USUARIO = USUA_USUARIO)
                WHERE DOCE_DOCENTE = '$id_docente'
                LIMIT 1;";
        return $this->db->query($sql)->row();
    }

    public function insert( $matricula, $nombre, $apellidos, $usuario_id ){
        $datos = [
            'DOCE_MATRICULA' => $matricula,
            'DOCE_NOMBRE'    => $nombre,
            'DOCE_APELLIDOS' => $apellidos,
            'DOCE_USUARIO'   => $usuario_id
         ];
        return $this->db->insert('docentes', $datos );
    }

    public function update( $id, $nombre, $apellidos ){
        $this->db->set('DOCE_NOMBRE'    , $nombre);
        $this->db->set('DOCE_APELLIDOS' , $apellidos);
        $this->db->where('DOCE_DOCENTE', $id);
        return $this->db->update('docentes');
    }

    public function getGruposByPeriodo( $id_periodo, $docente ){

        $sql = "SELECT GRUP_GRUPO, MATE_CODIGO, MATE_NOMBRE, SEME_NOMBRE, COUNT(*) NUM_ALUMNOS, AULA_NOMBRE, CARR_NOMBRE 
                FROM grupos
                JOIN grupos_detalles ON GRUP_GRUPO = GDET_GRUPO
                JOIN aulas ON GRUP_AULA = AULA_AULA
                JOIN carreras ON GRUP_CARRERA = CARR_CARRERA
                JOIN materias ON GRUP_MATERIA = MATE_MATERIA
                JOIN semestres ON GRUP_SEMESTRE = SEME_SEMESTRE
                WHERE GRUP_DOCENTE = '".$docente."'
                AND GDET_ACTIVO = 1
                AND GRUP_ACTIVO = 1
                AND GRUP_PERIODO = $id_periodo
                GROUP BY GRUP_GRUPO
                ;
            ";

        $result = $this->db->query( $sql );
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

    public function delete( $id ){
        $this->db->set('DOCE_ACTIVO', 0);
        $this->db->where('DOCE_DOCENTE', $id);
        return $this->db->update('docentes');
    }
    

    public function get_by_id2($id){

        $result = $this->db->query("SELECT * FROM alumnos WHERE id = '$id'");
        if($result->num_rows() > 0) {
            return $result->row();
        }else{
            return null;
        }
    }

    public function getUltimoPeriodo( $id_docente ){
        
        $sql = "SELECT GRUP_PERIODO FROM docentes
                JOIN grupos ON GRUP_DOCENTE = DOCE_DOCENTE
                WHERE DOCE_DOCENTE = $id_docente
                ORDER BY GRUP_PERIODO DESC LIMIT 1;";

        return $this->db->query( $sql )->row();

    }

    public function grabarCalificaciones($data){

        $existe = $this->existe_calificacion($data);
        
        if($existe != NULL){
            return $this->actualizar_calificacion($data);
        }else{
            return $this->insertar_calificacion($data);
        }
        
    }

    public function existe_calificacion($data){

        $unidad = $this->get_unidad($data->unidad, $data->materia);

        $sql = "SELECT * FROM calificaciones 
                JOIN grupos_detalles ON CALI_GRUPO_DETALLE = GDET_DETALLE 
                WHERE 
                GDET_DETALLE = ".$data->id. " 
                AND CALI_UNIDAD = ".$unidad. " 
                ";

        $result = $this->db->query($sql);

        if($result->num_rows() > 0) {
            return $result->row();
        }else{
            return null;
        }
    }

    public function insertar_calificacion($data){
        try {

            $unidad = $this->get_unidad($data->unidad, $data->materia);

            $datos = [
                'CALI_GRUPO_DETALLE'=> $data->id,
                'CALI_UNIDAD'       => $unidad,
                'CALI_OBTENCION'    => 1,
                'CALI_PUNTAJE'      => $data->calificacion
             ];

             $this->db->insert('calificaciones', $datos );

             return ["success"=>true, "message"=>"Calificación insertada"];
            
        } catch (Exception $e) {

            return ["success"=>false, "message"=>$e->getMessage()];
            
        }
        
        return false;
    }

    public function actualizar_calificacion($data){
        try {

            $unidad = $this->get_unidad($data->unidad, $data->materia);

            $this->db->set('CALI_OBTENCION', 2);
            $this->db->set('CALI_PUNTAJE', $data->calificacion);
            $this->db->where('CALI_GRUPO_DETALLE', $data->id);
            $this->db->where('CALI_UNIDAD', $unidad);
            
            $this->db->update('calificaciones');
            return ["success"=>true, "message"=>"Calificación actualizada"];
            
        } catch (Exception $e) {

            return ["success"=>false, "message"=>$e->getMessage()];
            
        }
        return false;
        
        
    }

    public function get_unidad($unidad='', $materia=''){

        $sql = "SELECT UNID_UNIDAD FROM unidades WHERE UNID_MATERIA = '$materia' 
                AND UNID_NUMERO = '$unidad' "; 
        $result = $this->db->query($sql)->row()->UNID_UNIDAD;
        return $result;
    }



}