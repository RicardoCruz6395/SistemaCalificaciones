<?php
/**
 * Date: 09/05/2017
 * Time: 06:47 PM
 */
class Alumnos_model extends CI_Model
{
    
    public function get(){
        try{
            $result = $this->db->get('alumnos');

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

    public function delete($id){
        try{

            $this->db->where('id', $id);
            $this->db->delete("alumnos");

            if($this->db->affected_rows() > 0){
                return ["success"=>true, "response"=>"Registro eliminado"];
            }else{
                return ["success"=>false, "response"=>"No se pudo obtener datos"];
            }
        }catch(Exception $e){
                return ["success"=>false, "response"=>$e->getMessage()];
        }
    }

  public function getByGrupo( $id_grupo ){

    $sql = "SELECT ALUM_MATRICULA, ALUM_ALUMNO, ALUM_NOMBRE, ALUM_APELLIDOS, SEME_NOMBRE
                FROM alumnos
                JOIN grupos_detalles ON ALUM_ALUMNO = GDET_ALUMNO
                JOIN grupos ON GRUP_GRUPO = GDET_GRUPO
                JOIN semestres ON ALUM_SEMESTRE = SEME_SEMESTRE
                WHERE GRUP_GRUPO = $id_grupo
                AND GDET_ACTIVO = 1
                AND GRUP_ACTIVO = 1
                ;
            ";

    $result = $this->db->query( $sql );
    if($result->num_rows() > 0) {
      return $result->result();
    }else{
      return null;
    }

  }

  public function getByUsuario($usuario){

    $this->db->where('ALUM_USUARIO', $usuario);
    $result = $this->db->get('alumnos');

    if($result->num_rows() > 0) {
      return $result->row();
    }else{
      return null;
    }

  }
}