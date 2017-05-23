<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docente extends CI_Controller
{

  public function __construct()
  {

    parent::__construct();
  }

  public function index()
  {
    $data = array('page_title' => 'Panel de administración');
    // $data array que recibe la vista
    // Contiene los css de la plantilla
    $this->load->view('layout/head', $data);
    // Es la barra superior de la plantilla
    $this->load->view('layout/header');
    // Este es el contenedor de la plantilla
    // Este archivo es en el que trabajarán
    $this->load->model('materias_model');
    $this->load->model('alumnos_model');

    $data = ["materias" => $this->materias_model->getImparte()];

    $this->load->view('docente/index', $data);
    // Menu lateral
    $this->load->view('layout/menu');
    // Js para que funcione la plantilla correctamente
    $this->load->view('layout/scripts');
  }

  public function getAlumnosByGrupo()
  {

    $this->load->model('alumnos_model');

    $data = ["alumnos" => $this->alumnos_model
      ->getByGrupo($this->input->post('grupo'))
    ];

    //echo json_encode($data);
    $this->load->view('docente/listaAlumnos', $data);
  }

    public function calificar($grupo)
  {
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
