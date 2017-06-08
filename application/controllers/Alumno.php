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
        
        foreach ($materias as $keyM => $m){

            $puntajes = [];
            foreach ($calificaciones[ $keyM ] as $cal){
                $puntajes[] = $cal[0];
            }

            switch (true) {
                case in_array(null, $puntajes) : // No se han cargado todas las calificaciones
                    $promedio = -1;
                    break;
                case min($puntajes) < 70: // El promedio es NA porque hay una calificacion menor a 70
                    $promedio = 0;
                    break;
                default: // Calcular el promedio del alumno
                    $promedio = array_sum( $puntajes )  /  count( $puntajes );
                    $promedio = round($promedio,0);
                    break;
            }
            $materias[ $keyM ][2] = $promedio;
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


    public function postGrupoReporteCalificaciones(){

        $id_grupo_detalle = $this->input->post('id');

        $this->load->model('grupos_detalles_model');
        $grupo = $this->grupos_detalles_model->grupo( $id_grupo_detalle );

        $this->load->model('grupos_model');
        $materia  = $this->grupos_model->materia( $grupo->GRUP_GRUPO );
        $semestre = $this->grupos_model->semestre( $grupo->GRUP_GRUPO );
        $docente  = $this->grupos_model->docente( $grupo->GRUP_GRUPO );
        $periodo  = $this->grupos_model->periodo( $grupo->GRUP_GRUPO );

        if( $semestre )
            $nombre_semestre = $semestre->SEME_NOMBRE;
        else
            $nombre_semestre = 'NO ESPECIFICADO';

        $this->load->model('periodos_model');
        $nombre_periodo = $this->periodos_model->getNombrePeriodoById( $periodo->PERI_PERIODO );

        $this->load->model('calificaciones_model');
        $this->load->model('unidades_model');
        $SQLcalificaciones = $this->calificaciones_model->getByGrupoDetalle( $id_grupo_detalle );
        $SQLunidades       = $this->unidades_model->getByMateria( $materia->MATE_MATERIA );

        $puntajes = [];
        $calificaciones = [];
        foreach ($SQLcalificaciones as $c) {
            $unidad = $this->unidades_model->getById( $c->CALI_UNIDAD );
            $calificaciones[ $unidad->UNID_NUMERO ] = [ $c->CALI_PUNTAJE, $c->CALI_OBTENCION ];
            $puntajes[] = $c->CALI_PUNTAJE;
        }

        $promedio;
        switch (true) {
            case count($puntajes) < count($SQLunidades) : // No se han cargado todas las calificaciones
                $promedio = -1;
                break;
            case min($puntajes) < 70: // El promedio es NA porque hay una calificacion menor a 70
                $promedio = 0;
                break;
            default: // Calcular el promedio del alumno
                $promedio = array_sum( $puntajes )  /  count( $puntajes );
                $promedio = round($promedio,0);
                break;
        }

        $data = [
            'nombre_materia'  => $materia->MATE_NOMBRE,
            'nombre_semestre' => $nombre_semestre,
            'nombre_periodo'  => $nombre_periodo,
            'nombre_docente'  => $docente->DOCE_NOMBRE . ' ' . $docente->DOCE_APELLIDOS,
            'unidades'        => $SQLunidades,
            'calificaciones'  => $calificaciones,
            'promedio'        => $promedio
        ];


        $this->load->view('alumno/modal_calificaciones', $data);
    }


}
