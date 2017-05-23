<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumno extends CI_Controller {
    public function __construct()
    {

        parent::__construct();
    }

	public function index(){


		$semestre = '8° Semestre';

		$this->load->model('model_alumno');



		$data = array('page_title'=>'SC :: Calificaciones ' . $semestre );
        // $data array que recibe la vista
        // Contiene los css de la plantilla
        $this->load->view('layout/head',$data);
        // Es la barra superior de la plantilla
        $this->load->view('layout/header');
        // Este es el contenedor de la plantilla
        // Este archivo es en el que trabajarán
        $this->load->view('alumno/index');
        // Menu lateral
        $this->load->view('layout/menu');
        // Js para que funcione la plantilla correctamente
        $this->load->view('layout/scripts');
	}

        public function semestre( $semestre = null ){
                echo $semestre;
        }
}
