<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docente extends CI_Controller{

	public function __construct(){
		parent::__construct();
		if(!$this->session->login || $this->session->rol != 1)
            redirect('/');
    	$this->load->model('usuarios_model');
        $this->docente = $this->usuarios_model->getDatosUsuario();
	}

	public function index(){

        $data2 = ['nombre_usuario' => $this->docente->DOCE_NOMBRE ];
		
	    $data = array('page_title' => 'SC :: Grupos');
	    $this->load->view('layout/head', $data);
	    $this->load->view('layout/header', $data2);
	    $this->load->model('docentes_model');

	    $data = ["grupos" => $this->docentes_model->getGruposByPeriodo( 1 )];

	    $this->load->view('docente/index', $data);
	    $this->load->view('layout/menu');
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

	    $data = array('page_title' => 'SC :: Calificar');
        $data2 = ['nombre_usuario' => $this->docente->DOCE_NOMBRE ];

	    $this->load->view('layout/head'   , $data);
	    $this->load->view('layout/header' , $data2);
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
