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
		$title = ['page_title'    => 'SCP :: Inicio'];

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

        $elementos = [
            'grupos'   => $grupos,
            'alumnos'  => $alumnos,
            'materias' => $materias,
            'docentes' => $docentes
        ];
		
        $this->viewGeneral( $title, 'admin/index', $elementos );

	}

    public function viewGeneral( $title, $view, $data = []){
        $this->load->view('layout/head', $title);
        $this->load->view('layout/header');
        $this->load->view( $view, $data);
        $this->load->view('layout/menu');
        $this->load->view('layout/scripts');
    }

    /***** GRUPOS ******/

    public function grupos(){
        $title = ['page_title'    => 'SCP :: Grupos'];
        $this->viewGeneral( $title, 'admin/grupos' );        
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

            $docente = $this->docentes_model->getById( $g->GRUP_DOCENTE);
            $alumnos = $this->grupos_detalles_model->getByGrupo( $g->GRUP_GRUPO );
            $alumnos = count( $alumnos );

            $alumnos =
            '<button class="btn btn-xs btn-info" data-p="'.$g->GRUP_GRUPO.'"><i class="fa fa-graduation-cap"></i> '.$alumnos.' </button>';
            
            
            $opciones = '
            <button class="btn btn-xs btn-success" data-p="'.$g->GRUP_GRUPO.'"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-xs btn-danger" data-p="'.$g->GRUP_GRUPO.'"><i class="fa fa-trash-o"></i></button>';

            if( $g->GRUP_SEMESTRE )
                $semestre = $this->semestres_model->getById( $g->GRUP_SEMESTRE)->SEME_NOMBRE_CORTO;
            else
                $semestre = '- - -';

            $data['data'][] = [
                $g->GRUP_GRUPO,
                $semestre,
                $this->carreras_model->getById( $g->GRUP_CARRERA)->CARR_NOMBRE,
                $this->materias_model->getById( $g->GRUP_MATERIA)->MATE_NOMBRE,
                $docente->DOCE_NOMBRE . ' ' . $docente->DOCE_APELLIDOS,
                $alumnos,
                $opciones
            ];
        }

        $this->printJSON($data);
    }

    public function postGrupoForm(){

        $this->load->model('periodos_model');
        $this->load->model('semestres_model');
        $this->load->model('materias_model');
        $this->load->model('docentes_model');
        $this->load->model('carreras_model');
        $this->load->model('aulas_model');


        $datos = [
            'periodos'  => $periodos,
            'semestres' => $semestres,
            'materias'  => $materias,
            'docentes'  => $docentes,
            'carreras'  => $carreras,
            'aulas'     => $aulas
        ];

        $this->load->view('admin/grupos_form', $datos );
    }


    /***** ALUMNOS *****/

	public function alumnos(){
		$title = ['page_title'    => 'SCP :: Alumnos'];
        $this->viewGeneral( $title, 'admin/alumnos' );
	}

	public function postAlumnos(){
        $this->load->model('alumnos_model');
		$this->load->model('carreras_model');
        $alumnos = $this->alumnos_model->getAlumnos();

        $data['data'] = [];

        foreach ($alumnos as $a) {

        	$opciones = '
        	<button class="btn btn-xs btn-success" data-p="'.$a->ALUM_ALUMNO.'"><i class="fa fa-pencil"></i></button>
        	<button class="btn btn-xs btn-danger" data-p="'.$a->ALUM_ALUMNO.'"><i class="fa fa-trash-o"></i></button>';

        	$data['data'][] = [
        		$a->ALUM_MATRICULA,
                $this->carreras_model->getById( $a->ALUM_CARRERA )->CARR_NOMBRE,
        		$a->ALUM_NOMBRE . ' ' . $a->ALUM_APELLIDOS,
        		$this->alumnos_model->semestre($a->ALUM_ALUMNO)->SEME_NOMBRE,
        		$opciones
        	];
        }

        $this->printJSON($data);
	}

    public function postAlumnoForm(){
        $this->load->model('semestres_model');
        $this->load->model('carreras_model');
        $semestres = $this->semestres_model->getSemestres();
        $carreras = $this->carreras_model->getCarreras();

        $select_semestres = '';
        foreach ($semestres as $s) {
            $select_semestres .= '<option value="' . $s->SEME_SEMESTRE . '">' . $s->SEME_NOMBRE . '</option>';
        }

        $select_carreras = '';
        foreach ($carreras as $c) {
            $select_carreras .= '<option value="' . $c->CARR_CARRERA . '">' . $c->CARR_NOMBRE . '</option>';
        }

        $this->load->view('admin/alumnos_form', ['semestres' => $select_semestres, 'carreras' => $select_carreras]);
    }

    public function addAlumno(){
        $matricula =  $this->input->post('matricula');
        $nombre    = strtoupper( trim($this->input->post('nombre')) );
        $apellidos = strtoupper( trim($this->input->post('apellidos')) );
        $semestre  = $this->input->post('semestre');
        $carrera   = $this->input->post('carrera');
        $hash      =  $this->input->post('matricula_hash');

        
        $this->load->model('alumnos_model');
        $existe = $this->alumnos_model->getByMatricula( $matricula );

        $insert = false;
        if( !$existe ){
            
            $usuario_id = null;
            $this->db->trans_start();
            $this->usuarios_model->insert( $matricula, $hash, 2);
            $usuario_id = $this->db->insert_id();
            $alumno = $this->alumnos_model->insert( $matricula, $nombre, $apellidos, $semestre, $carrera, $usuario_id );
            $this->db->trans_complete();

            if( $alumno ){
                $insert  = true;
                $message = 'El alumno se creó correctamente';
            }else{
                $message = 'No se pudo guardar el alumno';
            }
        }else{
            $message = 'Ya existe un alumno con la matrícula <b>' . $matricula . '</b>';
        }

        $data = [ 'insert' => $insert, 'message' => $message ];

        $this->printJSON( $data );
    }

    public function postAlumnoFormEdit(){
        $id = $this->input->post('id');
        $this->load->model('alumnos_model');
        $alumno = $this->alumnos_model->getById( $id );
        $this->load->model('semestres_model');
        $this->load->model('carreras_model');
        $semestres = $this->semestres_model->getSemestres();
        $carreras = $this->carreras_model->getCarreras( [1] );

        $select_semestres = '';
        foreach ($semestres as $s) {
            $selected = ($alumno->ALUM_SEMESTRE == $s->SEME_SEMESTRE ) ? ' selected' : '';
            $select_semestres .= '<option value="' . $s->SEME_SEMESTRE . '"' . $selected . '>' . $s->SEME_NOMBRE . '</option>';
        }

        $select_carreras = '';
        foreach ($carreras as $c) {
            $selected = ($alumno->ALUM_CARRERA == $c->CARR_CARRERA ) ? ' selected' : '';
            $select_carreras .= '<option value="' . $c->CARR_CARRERA . '"' . $selected . '>' . $c->CARR_NOMBRE . '</option>';
        }

        $this->load->view('admin/alumnos_form_edit',
            ['semestres' => $select_semestres, 'carreras' => $select_carreras, 'alumno' => $alumno]);
    }

    public function editAlumno(){
        $id = $this->input->post('id');
        $nombre    = strtoupper( trim($this->input->post('nombre')) );
        $apellidos = strtoupper( trim($this->input->post('apellidos')) );
        $semestre  = $this->input->post('semestre');
        $carrera   = $this->input->post('carrera');

        $this->load->model('alumnos_model');
        $alumno = $this->alumnos_model->update( $id, $nombre, $apellidos, $semestre, $carrera );

        $edited = false;
        if( $alumno ){
            $edited = true;
            $message = 'Los cambios se guardaron correctamente';
        }else{
            $message = 'No se pudieron guardar los cambios';
        }
        
        $data = [ 'edited' => $edited, 'message' => $message ];
        $this->printJSON( $data );
    }

    /****** MATERIAS ******/
    public function materias(){
        $title = ['page_title'    => 'SCP :: Materias'];
        $this->viewGeneral( $title, 'admin/materias' );
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
                $m->MATE_CODIGO,
                $m->MATE_NOMBRE,
                $num_unidades,
                $opciones
            ];
        }

        $this->printJSON($data);
    }

    public function postMateriaForm(){
        $this->load->view('admin/materias_form');
    }

    public function addMateria(){
        $codigo = strtoupper( $this->input->post('codigo') );
        $nombre = strtoupper( $this->input->post('materia') );
        $unidades = $this->input->post('unidades');
        
        $this->load->model('materias_model');
        $existe = $this->materias_model->getByCodigo( $codigo );

        $insert = false;
        if( !$existe ){
            $this->db->trans_start();
            $materia = $this->materias_model->insert( $codigo, $nombre );
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
            $message = 'Ya existe una materia con el código <b>' . $codigo . '</b>';
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

    /****** DOCENTES ******/
    public function docentes(){
        $title = ['page_title'    => 'SCP :: Docentes'];
        $this->viewGeneral( $title, 'admin/docentes' );
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
            $usuario_status = '<button class="btn btn-xs btn-warning change" data-p="'.$d->DOCE_DOCENTE.'"><i class="fa fa-user"></i> ACTIVO</button>';
            if(!$usuario->USUA_ACTIVO)
                $usuario_status = '<button class="btn btn-xs btn-default change" data-p="'.$d->DOCE_DOCENTE.'"><i class="fa fa-user"></i> DESACTIVADO</button>';

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
        $this->load->view('admin/docentes_form');
    }

    public function addDocente(){
        $matricula = trim($this->input->post('matricula'));
        $nombre    = strtoupper( trim($this->input->post('nombre')) );
        $apellidos = strtoupper( trim($this->input->post('apellidos')) );
        $hash      = $this->input->post('matricula_hash');

        $this->load->model('docentes_model');
        $existe = $this->docentes_model->getByMatricula( $matricula );

        $insert = false;
        if( !$existe ){
            
            $usuario_id = null;
            $this->db->trans_start();
            $this->usuarios_model->insert( $matricula, $hash, 1);
            $usuario_id = $this->db->insert_id();
            $docente = $this->docentes_model->insert( $matricula, $nombre, $apellidos, $usuario_id );
            $this->db->trans_complete();

            if( $docente ){
                $insert  = true;
                $message = 'El docente se creó correctamente';
            }else{
                $message = 'No se pudo guardar el docente';
            }
        }else{
            $message = 'Ya existe un docente con la matrícula <b>' . $matricula . '</b>';
        }

        $data = [ 'insert' => $insert, 'message' => $message ];

        $this->printJSON( $data );
    }

    public function postDocenteFormEdit(){
        $id = $this->input->post('id');
        $this->load->model('docentes_model');
        $docente = $this->docentes_model->getById( $id );
        $this->load->view('admin/docentes_form_edit', ['docente' => $docente]);
    }

    public function editDocente(){
        $id = $this->input->post('id');
        $nombre    = strtoupper( trim($this->input->post('nombre')) );
        $apellidos = strtoupper( trim($this->input->post('apellidos')) );

        $this->load->model('docentes_model');
        $docente = $this->docentes_model->update($id, $nombre, $apellidos );

        $edited = false;
        if( $docente ){
            $edited = true;
            $message = 'Los cambios se guardaron correctamente';
        }else{
            $message = 'No se pudieron guardar los cambios';
        }
        
        $data = [ 'edited' => $edited, 'message' => $message ];
        $this->printJSON( $data );
    }

    public function changeStatusDocente(){
        $id = $this->input->post('id');
        $this->load->model('docentes_model');
        $docente = $this->docentes_model->getById( $id );
        $usuario = $this->usuarios_model->changeStatus( $docente->DOCE_USUARIO );

        $change = false;
        if( $usuario ){
            $change = true;
            $message = 'Se ha cambiado el status';
        }else{
            $message = 'No se pudo cambiar el status';
        }

        $data = [ 'change' => $change, 'message' => $message ];

        $this->printJSON( $data );
    }

    /***** DELETES *****/

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
            $docente = $this->docentes_model->getById( $id ); 
            $this->usuarios_model->changeStatus( $docente->DOCE_USUARIO, 0 );
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
