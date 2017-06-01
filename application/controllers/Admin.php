<?php

class Admin extends CI_Controller {

	private $admin;

	public function __construct(){
		parent::__construct();
        if(!$this->session->login || $this->session->rol != 3)
            redirect('/');

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

	public function alumnos(){
		$data1 = ['page_title'    => 'SC :: Alumnos'];
		$data2 = ['nombre_usuario' => $this->admin->ADMI_NOMBRE ];

		$this->load->view('layout/head'   , $data1);
        $this->load->view('layout/header' , $data2);
        $this->load->view('admin/alumnos', []);
        $this->load->view('layout/menu');
        $this->load->view('layout/scripts');
	}

	public function postAlumnos(){
		$this->load->model('alumnos_model');
        $alumnos = $this->alumnos_model->getAlumnos();

        $data['data'] = [];

        foreach ($alumnos as $a) {

        	$opciones = '
        	<button class="btn btn-xs btn-success" data-p="'.$a->ALUM_ALUMNO.'"><i class="fa fa-pencil"></i></button>
        	<button class="btn btn-xs btn-danger" data-p="'.$a->ALUM_ALUMNO.'"><i class="fa fa-trash-o"></i></button>';

        	$data['data'][] = [
        		$a->ALUM_MATRICULA,
        		$a->ALUM_NOMBRE . ' ' . $a->ALUM_APELLIDOS,
        		$this->alumnos_model->semestre($a->ALUM_ALUMNO)->SEME_NOMBRE,
        		$opciones
        	];
        }

        header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function materias(){
		$data1 = ['page_title'    => 'SC :: Materias'];
		$data2 = ['nombre_usuario' => $this->admin->ADMI_NOMBRE ];

		$this->load->view('layout/head'   , $data1);
        $this->load->view('layout/header' , $data2);
        $this->load->view('admin/materias');
        $this->load->view('layout/menu');
        $this->load->view('layout/scripts');
	}

	public function postMaterias(){
		$this->load->model('materias_model');
        $materias = $this->materias_model->getMaterias();

        $data['data'] = [];

        foreach ($materias as $m) {

        	$unidades = $this->materias_model->unidades( $m->MATE_MATERIA );
        	$num_unidades = count( $unidades );

        	$opciones = '
        	<button class="btn btn-xs btn-success" data-p="'.$m->MATE_MATERIA.'"><i class="fa fa-pencil"></i></button>
        	<button class="btn btn-xs btn-danger" data-p="'.$m->MATE_MATERIA.'"><i class="fa fa-trash-o"></i></button>';

        	$data['data'][] = [
        		$m->MATE_CLAVE,
        		$m->MATE_NOMBRE,
        		$num_unidades,
        		$opciones
        	];
        }

        header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function grupos(){

		$data1 = ['page_title'    => 'SC :: Grupos'];
		$data2 = ['nombre_usuario' => $this->admin->ADMI_NOMBRE ];


		$this->load->view('layout/head'   , $data1);
        $this->load->view('layout/header' , $data2);
        $this->load->view('admin/grupos'  , []);
        $this->load->view('layout/menu');
        $this->load->view('layout/scripts');
		
	}

    public function postGrupos(){

        $data1 = ['page_title'    => 'SC :: Grupos'];
        $data2 = ['nombre_usuario' => $this->admin->ADMI_NOMBRE ];


        $this->load->view('layout/head'   , $data1);
        $this->load->view('layout/header' , $data2);
        $this->load->view('admin/grupos'  , []);
        $this->load->view('layout/menu');
        $this->load->view('layout/scripts');
        
    }

    public function docentes(){

        $data1 = ['page_title'    => 'SC :: Docentes'];
        $data2 = ['nombre_usuario' => $this->admin->ADMI_NOMBRE ];


        $this->load->view('layout/head'   , $data1);
        $this->load->view('layout/header' , $data2);
        $this->load->view('admin/docentes'  , []);
        $this->load->view('layout/menu');
        $this->load->view('layout/scripts');
        
    }

    public function postDocentes(){

        $this->load->model('docentes_model');
        $docentes = $this->docentes_model->getDocentes();

        $data['data'] = [];

        foreach ($docentes as $d) {

            $opciones = '
            <button class="btn btn-xs btn-success" data-p="'.$d->DOCE_DOCENTE.'"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-xs btn-danger" data-p="'.$d->DOCE_DOCENTE.'"><i class="fa fa-trash-o"></i></button>';

            $usuario_status = '<span class="text-default">NO CREADO</span>';

            $usuario = $this->docentes_model->usuario( $d->DOCE_DOCENTE );
            if( $usuario ){
                $usuario_status = '<span class="text-success">ACTIVO</span>';
                if(!$usuario->USUA_ACTIVO)
                    $usuario_status = '<span class="text-danger">DESACTIVADO</span>'; 
            }

            $fecha = date('d-m-Y', strtotime($d->DOCE_CREATED_AT));

            $data['data'][] = [
                $d->DOCE_MATRICULA,
                $d->DOCE_NOMBRE . ' ' . $d->DOCE_APELLIDOS,
                $fecha,
                $usuario_status,
                $opciones
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($data);
        
    }

}
