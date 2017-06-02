<?php

class Configuracion extends CI_Controller {

	private $admin;

	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('login')){
            redirect('/auth/login');
        }

        switch ($this->session->userdata('rol')){
  			case 1:
      			redirect('/docente');
        		break;
  			case 2:
      			redirect('/alumno');
        		break;
		}

		$this->load->model('usuarios_model');
        $this->admin = $this->usuarios_model->getDatosUsuario(); 

	}

	public function index(){
		$data1 = ['page_title'    => 'SC :: Inicio'];
		$data2 = ['nombre_usuario' => $this->admin->ADMI_NOMBRE ];

		$this->load->view('layout/head'   , $data1);
        $this->load->view('layout/header' , $data2);
        $this->load->view('admin/index', []);
        $this->load->view('layout/menu');
        $this->load->view('layout/scripts');
	}

	public function periodos(){
		$data1 = ['page_title'    => 'SC :: Periodos'];
		$data2 = ['nombre_usuario' => $this->admin->ADMI_NOMBRE ];

		$this->load->view('layout/head'   , $data1);
        $this->load->view('layout/header' , $data2);
        $this->load->view('admin/periodos', []);
        $this->load->view('layout/menu');
        $this->load->view('layout/scripts');
	}

	public function postPeriodos(){
        $this->load->model('periodos_model');
        $periodos = $this->periodos_model->getPeriodos();

        $data['data'] = [];

        foreach ($periodos as $p) {

        	$opciones = '
        	<button class="btn btn-xs btn-success" data-p="'.$p->PERI_PERIODO.'"><i class="fa fa-pencil"></i></button>
        	<button class="btn btn-xs btn-danger" data-p="'.$p->PERI_PERIODO.'"><i class="fa fa-trash-o"></i></button>';

        	$data['data'][] = [
        		$p->PERI_PERIODO,
        		$this->periodos_model->getNombrePeriodoById( $p->PERI_PERIODO ),
        		$opciones
        	];
        }

        header('Content-Type: application/json');
		echo json_encode($data);
	}

    public function aulas(){
        $data1 = ['page_title'    => 'SC :: Periodos'];
        $data2 = ['nombre_usuario' => $this->admin->ADMI_NOMBRE ];

        $this->load->view('layout/head'   , $data1);
        $this->load->view('layout/header' , $data2);
        $this->load->view('admin/periodos', []);
        $this->load->view('layout/menu');
        $this->load->view('layout/scripts');
    }

    public function postAulas(){
        $this->load->model('periodos_model');
        $periodos = $this->periodos_model->getPeriodos();

        $data['data'] = [];

        foreach ($periodos as $p) {

            $opciones = '
            <button class="btn btn-xs btn-success" data-p="'.$p->PERI_PERIODO.'"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-xs btn-danger" data-p="'.$p->PERI_PERIODO.'"><i class="fa fa-trash-o"></i></button>';

            $data['data'][] = [
                $p->PERI_PERIODO,
                $this->periodos_model->getNombrePeriodoById( $p->PERI_PERIODO ),
                $opciones
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function planesEstudio(){
        $data1 = ['page_title'    => 'SC :: Periodos'];
        $data2 = ['nombre_usuario' => $this->admin->ADMI_NOMBRE ];

        $this->load->view('layout/head'   , $data1);
        $this->load->view('layout/header' , $data2);
        $this->load->view('admin/periodos', []);
        $this->load->view('layout/menu');
        $this->load->view('layout/scripts');
    }

    public function postPlanesEstudio(){
        $this->load->model('periodos_model');
        $periodos = $this->periodos_model->getPeriodos();

        $data['data'] = [];

        foreach ($periodos as $p) {

            $opciones = '
            <button class="btn btn-xs btn-success" data-p="'.$p->PERI_PERIODO.'"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-xs btn-danger" data-p="'.$p->PERI_PERIODO.'"><i class="fa fa-trash-o"></i></button>';

            $data['data'][] = [
                $p->PERI_PERIODO,
                $this->periodos_model->getNombrePeriodoById( $p->PERI_PERIODO ),
                $opciones
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }
	

}
