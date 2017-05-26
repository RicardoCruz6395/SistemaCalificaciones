<?php

class Alumno extends CI_Controller {
    
    public function __construct(){
      parent::__construct();
      if(!$this->session->userdata('login') or $this->session->rol != 2)
        redirect('home');
    }

	public function index(){

		$semestre = '8° Semestre';

		$this->load->model('alumnos_model');

		$data = array('page_title'=>'SC :: Calificaciones ' . $semestre );
        $this->load->view('layout/head',$data);
        $this->load->view('layout/header');
        $this->load->view('alumno/index');
        $this->load->view('layout/menu');
        $this->load->view('layout/scripts');
	}

    public function periodo( $periodo = null ){

        if( $periodo ){

            $this->load->model('semestres_model');
            $semestre = $this->semestres_model->getById( 8 );

            $this->load->model('alumnos_model');
            $materias = $this->alumnos_model->getMateriasByPeriodo( $periodo );

            $data = array('page_title'=>'SC :: Calificaciones ' . $semestre->SEME_NOMBRE );
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
