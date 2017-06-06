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
        $this->load->model('docentes_model');
		$periodo = $this->docentes_model->getUltimoPeriodo( $this->docente->DOCE_DOCENTE );
        $periodo = $periodo->GRUP_PERIODO;
        redirect('docente/periodo/' . $periodo);
	}

	public function index2(){

	    $data = array('page_title' => 'SC :: Grupos');
	    $this->load->view('layout/head', $data);
	    $this->load->view('layout/header');
	    $this->load->model('docentes_model');

	    $data = ["grupos" => $this->docentes_model->getGruposByPeriodo( 1 )];

	    $this->load->view('docente/index', $data);
	    $this->load->view('layout/menu');
	    $this->load->view('layout/scripts');
	}

	public function periodo_old( $periodo = null ){
		
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

	    $SQLcalificaciones = $this->alumnos_model->getCalificacionesByGrupo( $grupo );
            
            foreach ($SQLcalificaciones as $key => $c) {
                $alumnos[ $c->GDET_DETALLE ]["matricula"] = $c->ALUM_MATRICULA;
                $alumnos[ $c->GDET_DETALLE ]["nombre"] = $c->ALUM_NOMBRE." ".$c->ALUM_APELLIDOS;
                $unidades[ $c->UNID_NUMERO ] = $c->UNID_NOMBRE;
                $calificaciones[ $c->GDET_DETALLE ][ $c->UNID_NUMERO ][0] = $c->CALI_PUNTAJE;
                $calificaciones[ $c->GDET_DETALLE ][ $c->UNID_NUMERO ][1] = $c->OBTE_NOMBRE;
            }

            ksort($unidades);

	    $data = ["alumnos2" => $this->alumnos_model->getByGrupo($grupo),
	            "grupo"    => $this->materias_model->getByCurso($grupo),
	            'alumnos'       => $alumnos,
	            'unidades'       => $unidades,
	            "calificaciones"    => $calificaciones,
	      ];

	    $this->load->view('docente/calificar', $data);
	    $this->load->view('layout/menu');
	    $this->load->view('layout/scripts');
	}

	public function periodo( $id_periodo = null ){

        if( $id_periodo ){

            /******* NOMBRE DEL PERIODO ****************/
            $this->load->model('periodos_model');
            $nombre_periodo = $this->periodos_model->getNombrePeriodoById( $id_periodo );
            
            if(!$nombre_periodo){
                $this->index();
            }

            /******** DATOS DEL DOCENTE ? *****************/
            $this->load->model('usuarios_model');       
            $docente = $this->usuarios_model->getDatosUsuario();

            /******* LISTA DE LOS PERIODOS ***********/
            $periodos = $this->periodos_model->getListaPeriodosByDocente( $docente->DOCE_DOCENTE );


            $existe = false;
            foreach ($periodos as $periodo) {
                if($periodo->PERI_PERIODO == $id_periodo){
                    $existe = true;
                    break;
                }
            }

            if(!$existe){
                $this->index();
            }

            $select = '<select id="periodos" class="form-control">';
            foreach($periodos as $periodo) {
                $selected = $periodo->PERI_PERIODO == $id_periodo ? ' selected' : '' ;
                $nombre = $this->periodos_model->getNombrePeriodoById( $periodo->PERI_PERIODO );
                $select .= '<option value="'. $periodo->PERI_PERIODO . '"'. $selected . '>' . $nombre . '</option>';
            }
            $select .= '</select>';


            /*********** LISTA DE grupos *************/
            $this->load->model('docentes_model');
            $data1 = ['page_title'    => 'SC :: Panel de Calificaciones'];
            $data2 = ['nombre_usuario' => $docente->DOCE_DOCENTE ];
            $data3 = [
            	"grupos" => $this->docentes_model->getGruposByPeriodo( $id_periodo ),
            	'periodos'       => $select,
                'nombre_periodo' => $nombre_periodo
        	];


            $this->load->view('layout/head'   , $data1);
            $this->load->view('layout/header' , $data2);
            $this->load->view('docente/index' , $data3);
            $this->load->view('layout/menu');
            $this->load->view('layout/scripts');
        }else{
            $this->index();
        }

    }

    public function test(){
        $json = file_get_contents('php://input');
        $obj = json_decode($json);
        print_r($obj);
  }

}
