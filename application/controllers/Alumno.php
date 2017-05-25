<?php

class Alumno extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }

	public function index(){


		$semestre = '8° Semestre';

		$this->load->model('alumnos_model');



		$data = array('page_title'=>'SC :: Calificaciones ' . $semestre );
        // $data array que recibe la vista
        // Contiene los css de la plantilla
        $this->load->view('layout/head',$data);
        // Es la barra superior de la plantilla
        $this->load->view('layout/header');
        // Este es el contenedor de la plantilla
        // Este archivo es en el que trabajarán
        $this->load->view('alumno/index', $materias);
        // Menu lateral
        $this->load->view('layout/menu');
        // Js para que funcione la plantilla correctamente
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
