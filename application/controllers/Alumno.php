<?php

class Alumno extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }

	public function index(){
        $id_usuario = $this->session->userdata['id'];
        $this->load->model('usuarios_model');       
        $alumno = $this->usuarios_model->getAlumno( $id_usuario );

        $id_alumno = $alumno->ALUM_ALUMNO;
        $this->load->model('alumnos_model');
		$periodo = $this->alumnos_model->getUltimoPeriodo( $id_alumno );
        $periodo = $periodo->GRUP_PERIODO;
        redirect('alumno/periodo/' . $periodo);
	}

    public function periodo( $periodo = null ){

        if( $periodo ){

            $id_usuario = $this->session->userdata['id'];
            $this->load->model('usuarios_model');       
            $alumno = $this->usuarios_model->getAlumno( $id_usuario );

            $this->load->model('alumnos_model');
            $SQLcalificaciones = $this->alumnos_model->getMateriasByPeriodo( $periodo );
            $materias = [];
            $unidades[ 0 ] = 'MATERIA' ;
            $calificaciones = [];
            foreach ($SQLcalificaciones as $key => $c) {
                $unidades[ $c->UNID_NUMERO ] = $c->UNID_NOMBRE;
                $calificaciones[ $c->GDET_DETALLE ][ 0 ] = $c->MATE_NOMBRE;
                $calificaciones[ $c->GDET_DETALLE ][ $c->UNID_NUMERO ] = $c->CALI_PUNTAJE;
            }

            $data1 = ['page_title'    => 'SC :: Panel de Calificaciones'];
            $data2 = ['nombre_usuario' => $alumno->ALUM_NOMBRE ];
            $data3 = [
                'unidades'   => $unidades,
                'calificaciones'   => $calificaciones
            ];

            $this->load->view('layout/head'   , $data1);
            $this->load->view('layout/header' , $data2);
            $this->load->view('alumno/index'  , $data3);
            $this->load->view('layout/menu');
            $this->load->view('layout/scripts');
        }else{
            redirect('alumno');
        }

    }
}
