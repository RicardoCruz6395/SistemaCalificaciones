<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docente extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('login')){
            redirect('/auth/login');
        }

        switch ($this->session->userdata('rol')){
  			case 2:
      			redirect('/alumno');
        		break;
      		case 3:
      			redirect('/admin');
        		break;
		}

	}

	public function index(){
	    $data = array('page_title' => 'SC :: Grupos');
	    // $data array que recibe la vista
	    // Contiene los css de la plantilla
	    $this->load->view('layout/head', $data);
	    // Es la barra superior de la plantilla
	    $this->load->view('layout/header');
	    // Este es el contenedor de la plantilla
	    // Este archivo es en el que trabajarán
	    $this->load->model('docentes_model');

	    $data = ["grupos" => $this->docentes_model->getGruposByPeriodo( 1 )];

	    $this->load->view('docente/index', $data);
	    // Menu lateral
	    $this->load->view('layout/menu');
	    // Js para que funcione la plantilla correctamente
	    $this->load->view('layout/scripts');
	}

	public function periodo( $periodo = null ){
		
		$data = array('page_title' => 'SC :: Lista de grupos');
	    $this->load->view('layout/head', $data);
	    $this->load->view('layout/header');
	    $this->load->model('docentes_model');

	    $data = ["grupos" => $this->docentes_model->getGruposByPeriodo()];

	    $this->load->view('docente/index', $data);
	    // Menu lateral
	    $this->load->view('layout/menu');
	    // Js para que funcione la plantilla correctamente
	    $this->load->view('layout/scripts');


	}

	public function getAlumnosByGrupo(){

	    $this->load->model('alumnos_model');

	    $data = [
	    	"alumnos" => $this->alumnos_model->getByGrupo($this->input->post('grupo'))
	    ];

	    $this->load->view('docente/listaAlumnos', $data);
	}

    public function calificar($grupo){

	    $data = array('page_title' => 'Panel de Calificar');
	    $this->load->view('layout/head', $data);
	    $this->load->view('layout/header');
	    $this->load->model('materias_model');
	    $this->load->model('alumnos_model');

	    $data = ["alumnos" => $this->alumnos_model->getByGrupo($grupo),
	            "grupo"    => $this->materias_model->getByCurso($grupo),
	      ];

	    $this->load->view('docente/calificar', $data);
	    $this->load->view('layout/menu');
	    $this->load->view('layout/scripts');
	}

	public function test(){
      echo "test";
  }

}
