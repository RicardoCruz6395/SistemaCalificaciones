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
		$title = ['page_title'    => 'SC :: Inicio'];

        $this->load->model('grupos_model');
        $grupos = $this->grupos_model->getGrupos();
        $grupos = count($grupos);

        $this->load->model('alumnos_model');
        $alumnos = $this->alumnos_model->getAlumnos();
        $alumnos = count($alumnos);

        $this->load->model('materias_model');
        $materias = $this->materias_model->getMaterias();
        $materias = count($materias);

        $this->load->model('docentes_model');
        $docentes = $this->docentes_model->getDocentes();
        $docentes = count($docentes);


        $elementos['grupos'] = $grupos;
        $elementos['alumnos'] = $alumnos;
        $elementos['materias'] = $materias;
        $elementos['docentes'] = $docentes;
		
		$this->load->view('layout/head', $title);
        $this->load->view('layout/header');
        $this->load->view('admin/index', $elementos);
        $this->load->view('layout/menu');
        $this->load->view('layout/scripts');
	}

    public function grupos(){

        $title = ['page_title'    => 'SC :: Grupos'];

        $this->load->view('layout/head'   , $title);
        $this->load->view('layout/header');
        $this->load->view('admin/grupos');
        $this->load->view('layout/menu');
        $this->load->view('layout/scripts');
        
    }

    public function postGrupos(){
        $this->load->model('grupos_model');
        $this->load->model('semestres_model');
        $this->load->model('carreras_model');
        $this->load->model('materias_model');
        $this->load->model('docentes_model');
        $this->load->model('grupos_detalles_model');
        $grupos = $this->grupos_model->getGrupos();

        $data['data'] = [];

        foreach ($grupos as $g) {

            $opciones = '
            <button class="btn btn-xs btn-success" data-p="'.$g->GRUP_GRUPO.'"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-xs btn-danger" data-p="'.$g->GRUP_GRUPO.'"><i class="fa fa-trash-o"></i></button>';

            $docente = $this->docentes_model->getById( $g->GRUP_DOCENTE);
            $alumnos = $this->grupos_detalles_model->getByGrupo( $g->GRUP_GRUPO );
            $alumnos = count( $alumnos );

            $data['data'][] = [
                $g->GRUP_GRUPO,
                $this->semestres_model->getById( $g->GRUP_SEMESTRE)->SEME_NOMBRE,
                $this->carreras_model->getById( $g->GRUP_CARRERA)->CARR_NOMBRE,
                $this->materias_model->getById( $g->GRUP_MATERIA)->MATE_NOMBRE,
                $docente->DOCE_NOMBRE . ' ' . $docente->DOCE_APELLIDOS,
                $alumnos,
                $opciones
            ];
        }

        $this->printJSON($data);
    }

	public function alumnos(){
		$data1 = ['page_title'    => 'SC :: Alumnos'];

		$this->load->view('layout/head'   , $data1);
        $this->load->view('layout/header');
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

        $this->printJSON($data);
	}

	public function materias(){
		$data1 = ['page_title'    => 'SC :: Materias'];

		$this->load->view('layout/head'   , $data1);
        $this->load->view('layout/header');
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

        $this->printJSON($data);
	}

    public function docentes(){

        $data1 = ['page_title'    => 'SC :: Docentes'];

        $this->load->view('layout/head'   , $data1);
        $this->load->view('layout/header');
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

        $this->printJSON( $data );        
    }

    public function postDocenteForm(){
        echo '<span class="text-danger">Hola</span>';
    }

    public function postMateriaForm(){
        $this->load->view('admin/materias_form');
    }

    public function addMateria(){
        $clave = strtoupper( $this->input->post('clave') );
        $nombre = strtoupper( $this->input->post('materia') );
        $unidades = $this->input->post('unidades');
        
        $this->load->model('materias_model');
        $existe = $this->materias_model->getByClave( $clave );

        $insert = false;
        if( !$existe ){
            $this->db->trans_start();
            $materia = $this->materias_model->insert( $clave, $nombre );
            $materia_id = $this->db->insert_id();
            $this->db->trans_complete();
            if( $materia ){
                $this->load->model('unidades_model');

                for( $i = 1; $i <= $unidades; $i++ ){
                    $this->unidades_model->insert( $materia_id , $i );
                }

                $insert  = true;
                $message = 'La materia se creó correctamente';
            }else{
                $message = 'No se pudo guardar la materia';
            }
        }else{
            $message = 'Ya existe una materia con la clave <b>' . $clave . '</b>';
        }

        $data = [ 'insert' => $insert, 'message' => $message ];

        $this->printJSON( $data );
    }

    public function postMateriaFormEdit(){
        $id = $this->input->post('id');
        $this->load->model('materias_model');
        $materia = $this->materias_model->getById( $id );
        $unidades = $this->materias_model->unidades( $id );
        $unidades = count($unidades);
        $this->load->view('admin/materias_form_edit', ['materia' => $materia, 'unidades' => $unidades]);
    }

    public function editMateria(){
        $id = $this->input->post('id');
        $nombre = $this->input->post('materia');
        $this->load->model('materias_model');
        $materia = $this->materias_model->update($id, $nombre);

        $edited = false;
        if( $materia ){
            $edited = true;
            $message = 'Los cambios se guardaron correctamente';
        }else{
            $message = 'No se pudieron guardar los cambios';
        }
        
        $data = [ 'edited' => $edited, 'message' => $message ];
        $this->printJSON( $data );

    }

    public function postAlumnoForm(){
        echo '<span class="text-danger">Hola</span>';
    }

    public function postGrupoForm(){
        echo '<span class="text-danger">Hola</span>';
    }

    public function deleteMateria(){
        $id = $this->input->post('id');
        $this->load->model('materias_model');
        $materia = $this->materias_model->delete($id);

        $deleted = false;
        if( $materia ){
            $deleted = true;
            $message = 'Se ha eliminado la materia';
        }else{
            $message = 'No se pudo eliminar la materia';
        }
        
        $data = [ 'deleted' => $deleted, 'message' => $message ];
        $this->printJSON( $data );
    }

    public function deleteGrupo(){
        $id = $this->input->post('id');
        $this->load->model('grupos_model');
        echo $this->grupos_model->delete($id);
        
        $deleted = false;
        if( $materia ){
            $deleted = true;
            $message = 'Se ha eliminado la materia';
        }else{
            $message = 'No se pudo eliminar la materia';
        }
        
        $data = [ 'deleted' => $deleted, 'message' => $message ];
        $this->printJSON( $data );
    }

    public function deleteDocente(){
        $id = $this->input->post('id');
        $this->load->model('docentes_model');
        $docente = $this->docentes_model->delete($id);
        
        $deleted = false;
        if( $docente ){
            $deleted = true;
            $message = 'Se ha eliminado el docente';
        }else{
            $message = 'No se pudo eliminar el docente';
        }
        
        $data = [ 'deleted' => $deleted, 'message' => $message ];
        $this->printJSON( $data );
    }

    public function deleteAlumno(){
        $id = $this->input->post('id');
        $this->load->model('alumnos_model');
        $alumno = $this->alumnos_model->delete($id);
        
        $deleted = false;
        if( $alumno ){
            $deleted = true;
            $message = 'Se ha eliminado el alumno';
        }else{
            $message = 'No se pudo eliminar el alumno';
        }
        
        $data = [ 'deleted' => $deleted, 'message' => $message ];
        $this->printJSON( $data );
    }

    public function printJSON( $data ){
        header('Content-Type: application/json');
        echo json_encode($data);
    }

}
