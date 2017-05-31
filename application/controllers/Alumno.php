<?php

class Alumno extends CI_Controller {
    
    public function __construct(){
        parent::__construct();

        if(!$this->session->userdata('login')){
            redirect('/auth/login');
        }

        switch ($this->session->userdata('rol')){
            case 1:
                redirect('/docente');
                break;
            case 3:
                redirect('/admin');
                break;
        }

    }

	public function index(){
        $this->load->model('usuarios_model');       
        $alumno = $this->usuarios_model->getDatosUsuario();

        $id_alumno = $alumno->ALUM_ALUMNO;
        $this->load->model('alumnos_model');
		$periodo = $this->alumnos_model->getUltimoPeriodo( $id_alumno );
        $periodo = $periodo->GRUP_PERIODO;
        redirect('alumno/periodo/' . $periodo);
	}

    public function periodo( $id_periodo = null ){

        if( $id_periodo ){

            /******* NOMBRE DEL PERIODO ****************/
            $this->load->model('periodos_model');
            $nombre_periodo = $this->periodos_model->getNombrePeriodoById( $id_periodo );
            
            if(!$nombre_periodo){
                $this->index();
            }

            /******** DATOS DEL ALUMNO *****************/
            $this->load->model('usuarios_model');       
            $alumno = $this->usuarios_model->getDatosUsuario();

            /******* LISTA DE LOS PERIODOS ***********/
            $periodos = $this->periodos_model->getListaPeriodosByAlumno( $alumno->ALUM_ALUMNO );

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


            /*********** LISTA DE CALIFICACIONES Y MATERIAS *************/
            $this->load->model('alumnos_model');
            $SQLcalificaciones = $this->alumnos_model->getMateriasByPeriodo( $alumno->ALUM_ALUMNO, $id_periodo );
            
            foreach ($SQLcalificaciones as $key => $c) {
                $materias[ $c->GDET_DETALLE ] = $c->MATE_NOMBRE;
                $unidades[ $c->UNID_NUMERO ] = $c->UNID_NOMBRE;
                $calificaciones[ $c->GDET_DETALLE ][ $c->UNID_NUMERO ] = $c->CALI_PUNTAJE;
            }

            ksort($unidades);

            $data1 = ['page_title'    => 'SC :: Panel de Calificaciones'];
            $data2 = ['nombre_usuario' => $alumno->ALUM_NOMBRE ];
            $data3 = [
                'materias'       => $materias,
                'unidades'       => $unidades,
                'calificaciones' => $calificaciones,
                'periodos'       => $select,
                'nombre_periodo' => $nombre_periodo
            ];

            $this->load->view('layout/head'   , $data1);
            $this->load->view('layout/header' , $data2);
            $this->load->view('alumno/index'  , $data3);
            $this->load->view('layout/menu');
            $this->load->view('layout/scripts');
        }else{
            $this->index();
        }

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
