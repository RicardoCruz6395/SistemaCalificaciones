<?php

class Configuracion extends CI_Controller {

	private $admin;

	public function __construct(){
		parent::__construct();
        if(!$this->session->login || $this->session->rol != 3)
            redirect('/');
        $this->load->model('usuarios_model');
        $this->admin = $this->usuarios_model->getDatosUsuario(); 

	}

	public function index(){
		redirect('/');
	}

    public function viewGeneral( $title, $view, $data = []){
        $this->load->view('layout/head', $title);
        $this->load->view('layout/header');
        $this->load->view( $view, $data);
        $this->load->view('layout/menu');
        $this->load->view('layout/scripts');
    }

    /***** PERIODOS *****/

	public function periodos(){
		$title = ['page_title'    => 'SCP :: Periodos'];
        $this->viewGeneral( $title, 'configuracion/periodos' );
	}

	public function postPeriodos(){
        $this->load->model('periodos_nombres_model');
        $this->load->model('ciclos_escolares_model');
        $this->load->model('periodos_model');
        $periodos = $this->periodos_model->getPeriodos();

        $data['data'] = [];

        foreach ($periodos as $p) {

        	$opciones = '
        	<button class="btn btn-xs btn-success" data-p="'.$p->PERI_PERIODO.'"><i class="fa fa-pencil"></i></button>
        	<button class="btn btn-xs btn-danger" data-p="'.$p->PERI_PERIODO.'"><i class="fa fa-trash-o"></i></button>';

        	$data['data'][] = [
                $p->PERI_PERIODO,
                $this->periodos_nombres_model->getById( $p->PERI_PERIODO_NOMBRE )->PNOM_NOMBRE,
        		$this->ciclos_escolares_model->getById( $p->PERI_CICLO_ESCOLAR )->CICL_NOMBRE,
        		$this->periodos_model->getNombrePeriodoById( $p->PERI_PERIODO ),
        		$opciones
        	];
        }

        $this->printJSON($data);
	}

    public function postPeriodoForm(){

        $this->load->model('periodos_nombres_model');
        $this->load->model('ciclos_escolares_model');
        $tipos_periodos = $this->periodos_nombres_model->getPeriodosNombres();
        $ciclos_escolares = $this->ciclos_escolares_model->getCiclosEscolares();
        $select_periodos = '';
        foreach ($tipos_periodos as $t) {
            $select_periodos .= '<option value="' . $t->PNOM_PERIODO . '">' . $t->PNOM_NOMBRE . '</option>';
        }

        $select_ciclos = '';
        foreach ($ciclos_escolares as $c) {
            $select_ciclos .= '<option value="' . $c->CICL_CICLO . '">' . $c->CICL_NOMBRE . '</option>';
        }

        $this->load->view('configuracion/periodos_form', ['tipos_periodos' => $select_periodos, 'ciclos_escolares' => $select_ciclos]);
    }

    public function addPeriodo(){
        $tipo = $this->input->post('tipo_periodo');
        $ciclo = $this->input->post('ciclo_escolar');
        
        $this->load->model('periodos_model');
        $existe = $this->periodos_model->get( $tipo, $ciclo );

        $insert = false;
        if( !$existe ){
            $this->db->trans_start();
            $aula = $this->periodos_model->insert( $tipo, $ciclo );
            $aula_id = $this->db->insert_id();
            $this->db->trans_complete();
            if( $aula ){
                $insert  = true;
                $message = 'El periodo se creó correctamente';
            }else{
                $message = 'No se pudo guardar el periodo';
            }
        }else{
            $message = 'Ya existe un periodo con esas opciones';
        }

        $data = [ 'insert' => $insert, 'message' => $message ];

        $this->printJSON( $data );
    }

    public function postPeriodoFormEdit(){
        $id = $this->input->post('id');
        $this->load->model('periodos_model');
        $periodo = $this->periodos_model->getById( $id );
        $this->load->model('periodos_nombres_model');
        $this->load->model('ciclos_escolares_model');
        $tipos_periodos = $this->periodos_nombres_model->getPeriodosNombres();
        $ciclos_escolares = $this->ciclos_escolares_model->getCiclosEscolares();
        $select_periodos = '';
        foreach ($tipos_periodos as $t) {
            $selected = ($periodo->PERI_PERIODO_NOMBRE == $t->PNOM_PERIODO ) ? ' selected' : '';
            $select_periodos .= '<option value="' . $t->PNOM_PERIODO . '"' . $selected . '>' . $t->PNOM_NOMBRE . '</option>';
        }

        $select_ciclos = '';
        foreach ($ciclos_escolares as $c) {
            $selected = ($periodo->PERI_CICLO_ESCOLAR == $c->CICL_CICLO ) ? ' selected' : '';
            $select_ciclos .= '<option value="' . $c->CICL_CICLO . '"' . $selected . '>' . $c->CICL_NOMBRE . '</option>';
        }

        $this->load->view('configuracion/periodos_form_edit',
            ['tipos_periodos' => $select_periodos, 'ciclos_escolares' => $select_ciclos, 'periodo' => $periodo]);
    }

    public function editPeriodo(){
        $id = $this->input->post('id');
        $tipo = $this->input->post('tipo_periodo');
        $ciclo = $this->input->post('ciclo_escolar');
        
        $this->load->model('periodos_model');
        $existe = $this->periodos_model->get( $tipo, $ciclo );

        $edited = false;
        if( !$existe ){

            $periodo = $this->periodos_model->update( $id, $tipo, $ciclo );

            if( $periodo ){
                $edited = true;
                $message = 'Los cambios se guardaron correctamente';
            }else{
                $message = 'No se pudieron guardar los cambios';
            }
        }else{
            $message = 'Ya existe un periodo con esas opciones';
        }

        $data = [ 'edited' => $edited, 'message' => $message ];

        $this->printJSON( $data );
    }

    /****** AULAS ******/

    public function aulas(){
        $title = ['page_title'    => 'SCP :: Aulas'];
        $this->viewGeneral( $title, 'configuracion/aulas' );
    }

    public function postAulas(){
        $this->load->model('aulas_model');
        $aulas = $this->aulas_model->getAulas();

        $data['data'] = [];

        foreach ($aulas as $a) {

            $opciones = '
            <button class="btn btn-xs btn-success" data-p="'.$a->AULA_AULA.'"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-xs btn-danger" data-p="'.$a->AULA_AULA.'"><i class="fa fa-trash-o"></i></button>';

            $data['data'][] = [
                $a->AULA_AULA,
                $a->AULA_NOMBRE,
                date('m-d-Y', strtotime($a->AULA_CREATED_AT)),
                $opciones
            ];
        }

        $this->printJSON($data);
    }

    public function postAulaForm(){
        $this->load->view('configuracion/aulas_form');
    }

    public function addAula(){
        $nombre = strtoupper( trim($this->input->post('aula')) );
        
        $this->load->model('aulas_model');
        $existe = $this->aulas_model->getByNombre( $nombre );

        $insert = false;
        if( !$existe ){
            $this->db->trans_start();
            $aula = $this->aulas_model->insert( $nombre );
            $aula_id = $this->db->insert_id();
            $this->db->trans_complete();
            if( $aula ){
                $insert  = true;
                $message = 'El aula se creó correctamente';
            }else{
                $message = 'No se pudo guardar el aula';
            }
        }else{
            $message = 'Ya existe un aula con el nombre <b>' . $nombre . '</b>';
        }

        $data = [ 'insert' => $insert, 'message' => $message ];

        $this->printJSON( $data );
    }

    public function postAulaFormEdit(){
        $id = $this->input->post('id');
        $this->load->model('aulas_model');
        $aula = $this->aulas_model->getById( $id );
        $this->load->view('configuracion/aulas_form_edit', ['aula' => $aula]);
    }

    public function editAula(){
        $id = $this->input->post('id');
        $nombre = strtoupper(trim($this->input->post('aula')));
        $this->load->model('aulas_model');
        $aula = $this->aulas_model->update($id, $nombre);

        $edited = false;
        if( $aula ){
            $edited = true;
            $message = 'Los cambios se guardaron correctamente';
        }else{
            $message = 'No se pudieron guardar los cambios';
        }
        
        $data = [ 'edited' => $edited, 'message' => $message ];
        $this->printJSON( $data );
    }

    /***** CARRERAS ***/

    public function carreras(){
        $title = ['page_title'    => 'SCP :: Carreras'];
        $this->viewGeneral( $title, 'configuracion/carreras' );
    }

    public function postCarreras(){
        $this->load->model('carreras_model');
        $carreras = $this->carreras_model->getCarreras( [1] );

        $data['data'] = [];

        foreach ($carreras as $c) {

            $opciones = '
            <button class="btn btn-xs btn-success" data-p="'.$c->CARR_CARRERA.'"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-xs btn-danger" data-p="'.$c->CARR_CARRERA.'"><i class="fa fa-trash-o"></i></button>';

            $data['data'][] = [
                $c->CARR_CODIGO,
                $c->CARR_NOMBRE,
                $opciones
            ];
        }

        $this->printJSON($data);
    }

    public function postCarreraForm(){
        $this->load->view('configuracion/carreras_form');
    }

    public function addCarrera(){
        $codigo = strtoupper( trim($this->input->post('codigo')) );
        $nombre = strtoupper( trim($this->input->post('carrera')) );
        
        $this->load->model('carreras_model');
        $existe = $this->carreras_model->getByCodigo( $codigo );

        $insert = false;
        if( !$existe ){
            $this->db->trans_start();
            $carrera = $this->carreras_model->insert( $codigo, $nombre );
            $carrera_id = $this->db->insert_id();
            $this->db->trans_complete();
            if( $carrera ){
                $insert  = true;
                $message = 'La carrera se creó correctamente';
            }else{
                $message = 'No se pudo guardar la carrera';
            }
        }else{
            $message = 'Ya existe una carrera con el código <b>' . $codigo . '</b>';
        }

        $data = [ 'insert' => $insert, 'message' => $message ];

        $this->printJSON( $data );
    }

    public function postCarreraFormEdit(){
        $id = $this->input->post('id');
        $this->load->model('carreras_model');
        $carrera = $this->carreras_model->getById( $id );
        $this->load->view('configuracion/carreras_form_edit', ['carrera' => $carrera]);
    }

    public function editCarrera(){
        $id = $this->input->post('id');
        $nombre = strtoupper(trim($this->input->post('carrera')));
        $this->load->model('carreras_model');
        $carrera = $this->carreras_model->update($id, $nombre);

        $edited = false;
        if( $carrera ){
            $edited = true;
            $message = 'Los cambios se guardaron correctamente';
        }else{
            $message = 'No se pudieron guardar los cambios';
        }
        
        $data = [ 'edited' => $edited, 'message' => $message ];
        $this->printJSON( $data );
    }

    /*** ELIMINACIONES *****/

    public function deletePeriodo(){
        $id = $this->input->post('id');
        $this->load->model('periodos_model');
        $periodo = $this->periodos_model->delete($id);
        
        $deleted = false;
        if( $periodo ){
            $deleted = true;
            $message = 'Se ha eliminado el periodo';
        }else{
            $message = 'No se pudo eliminar el periodo';
        }
        
        $data = [ 'deleted' => $deleted, 'message' => $message ];
        $this->printJSON( $data );
    }

    public function deleteAula(){
        $id = $this->input->post('id');
        $this->load->model('aulas_model');
        $aula = $this->aulas_model->delete($id);
        
        $deleted = false;
        if( $aula ){
            $deleted = true;
            $message = 'Se ha eliminado el aula';
        }else{
            $message = 'No se pudo eliminar el aula';
        }
        
        $data = [ 'deleted' => $deleted, 'message' => $message ];
        $this->printJSON( $data );
    }

    public function deleteCarrera(){
        $id = $this->input->post('id');
        $this->load->model('carreras_model');
        $carrera = $this->carreras_model->delete($id);
        
        $deleted = false;
        if( $carrera ){
            $deleted = true;
            $message = 'Se ha eliminado la carrera';
        }else{
            $message = 'No se pudo eliminar la carrera';
        }
        
        $data = [ 'deleted' => $deleted, 'message' => $message ];
        $this->printJSON( $data );
    }

    public function printJSON( $data ){
        header('Content-Type: application/json');
        echo json_encode($data);
    }
	

}
