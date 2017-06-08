<?php

class Alumno extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        if(!$this->session->login || $this->session->rol != 2)
            redirect('/');
        $this->load->model('usuarios_model');
        $this->alumno = $this->usuarios_model->getDatosUsuario();
    }

	public function index(){
        $this->load->model('alumnos_model');
		$periodo = $this->alumnos_model->getUltimoPeriodo( $this->alumno->ALUM_ALUMNO );
        if( $periodo ){
            $periodo = $periodo->GRUP_PERIODO;
            redirect('alumno/periodo/' . $periodo);
        }else{
            $title = ['page_title'    => 'SCP :: Panel de Calificaciones'];
            $this->viewGeneral( $title, 'alumno/index');
        }
	}

    public function viewGeneral( $title, $view, $data = []){
        $this->load->view('layout/head', $title);
        $this->load->view('layout/header');
        $this->load->view( $view, $data);
        $this->load->view('layout/menu');
        $this->load->view('layout/scripts');
    }

    public function periodo( $id_periodo = null ){

        if( !$id_periodo ) redirect('alumno/');

        /******* NOMBRE DEL PERIODO ****************/
        $this->load->model('periodos_model');
        $nombre_periodo = $this->periodos_model->getNombrePeriodoById( $id_periodo );
        
        if(!$nombre_periodo) redirect('alumno/');

        /******* LISTA DE LOS PERIODOS ***********/
        $periodos = $this->periodos_model->getListaPeriodosByAlumno( $this->alumno->ALUM_ALUMNO );
        
        $existe = false;
        foreach ($periodos as $periodo) {
            if($periodo->PERI_PERIODO == $id_periodo){
                $existe = true;
                break;
            }
        }

        if(!$existe) redirect('alumno/');

        $select = '';
        foreach($periodos as $periodo) {
            $selected = $periodo->PERI_PERIODO == $id_periodo ? ' selected' : '' ;
            $nombre = $this->periodos_model->getNombrePeriodoById( $periodo->PERI_PERIODO );
            $select .= '<option value="'. $periodo->PERI_PERIODO . '"'. $selected . '>' . $nombre . '</option>';
        }

        /*********** LISTA DE CALIFICACIONES Y MATERIAS *************/
        $this->load->model('alumnos_model');
        $SQLcalificaciones = $this->alumnos_model->getMateriasByPeriodo( $this->alumno->ALUM_ALUMNO, $id_periodo );
            
        $this->load->model('materias_model');
        foreach ($SQLcalificaciones as $key => $c) {
            $materias[ $c->GDET_DETALLE ] = [
                $c->MATE_NOMBRE,
                count($this->materias_model->unidades( $c->MATE_MATERIA ))
            ];
            $unidades[ $c->UNID_NUMERO ] = $c->UNID_NOMBRE;
            $calificaciones[ $c->GDET_DETALLE ][ $c->UNID_NUMERO ] = [
                $c->CALI_PUNTAJE,
                $c->CALI_OBTENCION
            ];
        }

        ksort($unidades);

        $title = ['page_title'    => 'SCP :: Panel de Calificaciones'];
        $datos = [
            'materias'       => $materias,
            'unidades'       => $unidades,
            'calificaciones' => $calificaciones,
            'periodos'       => $select,
            'nombre_periodo' => $nombre_periodo
        ];

        $this->viewGeneral( $title, 'alumno/panel_calificaciones', $datos);

    }


    public function getCalificacionesGrupo(){

        $id_grupo_detalle = $this->input->post('grupo');

        $this->load->model('grupos_detalles_model');
        $grupo = $this->grupos_detalles_model->grupo( $id_grupo_detalle );

        $this->load->model('grupos_model');
        $materia = $this->grupos_model->materia( $grupo->GRUP_GRUPO );
        $docente = $this->grupos_model->docente( $grupo->GRUP_GRUPO );
        $periodo = $this->grupos_model->periodo( $grupo->GRUP_GRUPO );

        $this->load->model('periodos_model');
        $nombre_periodo = $this->periodos_model->getNombrePeriodoById( $periodo->PERI_PERIODO );

        $data = [
            'nombre_materia' => $materia->MATE_NOMBRE,
            'nombre_periodo' => $nombre_periodo,
            'nombre_docente' => $docente->DOCE_NOMBRE . ' ' . $docente->DOCE_APELLIDOS ,
            'calificaciones' => '' 
        ];

        $this->load->view('alumno/modal_calificaciones', $data);
    }


}
