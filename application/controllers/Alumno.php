<?php

class Alumno extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }

	public function index(){
        $id_usuario = $this->session->userdata['id'];
        $this->load->model('usuarios_model');       
        $alumno = $this->usuarios_model->getAlumno( $id_usuario );

        $id_alumno = $alumno->ALUM_ALUMNO;
        $this->load->model('alumnos_model');
		$periodo = $this->alumnos_model->getUltimoPeriodo( $id_alumno );
        $periodo = $periodo->GRUP_PERIODO;
        redirect('alumno/periodo/' . $periodo);
	}

    public function periodo( $periodo = null ){

        if( $periodo ){

            $this->load->model('alumnos_model');
            $materias = $this->alumnos_model->getMateriasByPeriodo( $periodo );

            $data = [
                'page_title'    =>  'SC :: Panel de Calificaciones',
                'materias'      =>  $materias
            ];
            $this->load->view('layout/head',$data);
            $this->load->view('layout/header');
            $this->load->view('alumno/index');
            $this->load->view('layout/menu');
            $this->load->view('layout/scripts');
        }else{
            redirect('alumno');
        }

    }
}
