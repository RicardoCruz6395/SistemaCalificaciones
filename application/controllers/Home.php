<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
    parent::__construct();
    if(!$this->session->userdata('login')){
      redirect('auth/login');
    }
	}

	public function index(){
	  switch ($this->session->rol){
      case 1:
        redirect('docente');
        break;
      case 2:
        redirect('alumno');
        break;
    }
    $data = array('page_title' => 'SC :: HOME ALUMNOS');
    $this->load->view('layout/head', $data);
		$this->load->view('layout/header');
		$data = array('home_active'=>1);
		$this->load->view('layout/menu',$data);
		$this->load->view('layout/scripts');
		
		//$this->load->view('home',$data);
	}

	public function cursos(){	
				
		$this->load->view('layout/head');
		$this->load->view('layout/header');
		$this->load->view('dashboard/dashboard');
		$this->load->view('layout/menu');
		$this->load->view('layout/scripts');
		
		$data = array('app' => 'Sistema Servicio Social');
		
		//$this->load->view('home',$data);
	}

	public function login($value='')
	{
		if($this->session->userdata('login')){
			header("Location: ". base_url()."/profile");
		}
		$data = array('tittle' => 'Inicio', 'mensaje'=>'Bienvenido al Sistema de Servicio Social', 'sistema'=>'Servicio Social | ITCH');
		$this->load->view('guest/head',$data);
		$data = array('app' => 'Sistema Servicio Social');
		$this->load->view('guest/nav',$data);
		$data = array('titulo' => 'INICIANDO SESION');
		//$this->load->view('guest/header',$data);
		
		$this->load->view('guest/login',$data);
		$this->load->view('guest/footer');
		//$this->load->view('home',$data);
	}
	public function registro($value='')
	{

		if($this->session->userdata('login')){
			header("Location: ". base_url()."/profile");
		}
		$data = array('tittle' => 'Inicio', 'mensaje'=>'Bienvenido al Sistema de Servicio Social', 'sistema'=>'Servicio Social | ITCH');
		$this->load->view('guest/head',$data);
		$data = array('app' => 'Sistema Servicio Social');
		$this->load->view('guest/nav',$data);
		$data = array('titulo' => 'Registro');
		//$this->load->view('guest/header',$data);
		
		$this->load->model('alumnos');
		// Cargar Empresas
		$data['empresas'] = $this->alumnos->getEmpresas();
		// Cargar Carreras
		$data['carreras'] = $this->alumnos->getCarreras();
		
		$this->load->view('guest/registro',$data);
		$this->load->view('guest/footer');
	}

	public function nuevoRegistro()
	{
		$alumno = $this->input->post();
		$this->load->model('alumnos');
		// falta file_name
		$bool = $this->alumnos->insertAlumno($alumno);
		if ($bool) {

			//Enviar Email
			//cargamos la libreria email de ci
			$this->load->library("email");

			//configuracion para gmail
			$configGmail = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'rrdc123@gmail.com',
				'smtp_pass' => 'rodolfo123',
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'newline' => "\r\n"
			);    

			//cargamos la configuración para enviar con gmail
			$this->email->initialize($configGmail);

			$this->email->from('Sistema de Control Escolar');
			$this->email->to($alumno['email']);
			$this->email->subject('Bienvenido/a');
			$this->email->message("<h2>Te has registrado con éxito en el Sistema</h2><hr><br><h3>Tu Contraseña es: ".$alumno['password']."</h3>");
			$this->email->send();

			header("Location: " . base_url() . "home/login?success=1");

		}else{
			header("Location: " . base_url() . "home/registro?error=1");
		}
	}

	public function sendMailGmail($email, $password)
	{
		//cargamos la libreria email de ci
		$this->load->library("email");

		//configuracion para gmail
		$configGmail = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'rrdc123@gmail.com',
			'smtp_pass' => 'rodolfo123',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		);    

		//cargamos la configuración para enviar con gmail
		$this->email->initialize($configGmail);

		$this->email->from('Sistema de Control Escolar');
		$this->email->to("$email");
		$this->email->subject('Bienvenido/a');
		$this->email->message('<h2>Email enviado con codeigniter haciendo uso del smtp de gmail</h2><hr><br> Bienvenido al blog<br> Contraseña: $password');
		$this->email->send();
		//con esto podemos ver el resultado
		var_dump($this->email->print_debugger());
	}
}
