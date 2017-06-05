<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->model('usuarios_model');
		$this->load->library('encrypt');
		//date_default_timezone_set("America/Cancun");
	}

	public function index()
	{
		redirect('auth/login');
	}

	public function login(){

		if($this->session->login){
			redirect('/home');
		}else{
			$this->load->view('auth/login');
		}

	}

	public function postLogin(){
		// Recibe los valores de los campos enviados por el método post()		
		$matricula  = $this->input->post('matricula');
		$password	= $this->input->post('password');
		// Llama a la function getUser() del modelo usuarios
		$response = $this->usuarios_model->get_by_matricula($matricula);

		if($response["success"]){ // Comprueba que la fila no este vacia
			$usuario = $response["response"];
			if($usuario->USUA_PASSWORD == $password AND $usuario->USUA_ACTIVO == 1) {
				$data = array(
					'id' 		=> $usuario->USUA_USUARIO,
					'rol'		=> $usuario->USUA_ROL,
					'login'		=> true
					);
				$this->session->set_userdata($data);
				$data = ["success"=>true];
				switch ($this->session->userdata('rol')){
					case 1:
					$data["rol"] = "Docente";
					break;
					case 2:
					$data["rol"] = "Alumno";
					break;
					case 3:
					$data["rol"] = "Admin";
					break;
				}
			}else{
				$data = ["success"=>false, "message"=>"Datos incorrectos"];
			}
		}else{
			$data = ["success"=>false, "message"=>"Datos incorrectos, no se ha registrado"];
		}
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function cambiar_password(){
		if(!$this->session->login){
			redirect('auth/login');
		}else{
			//$this->load->view('');
			$data = array('page_title' => 'SC :: Cambiar contraseña');
			$this->load->view('layout/head', $data);
			$this->load->view('layout/header');
			$this->load->view('auth/password');
			$this->load->view('layout/menu');
			$this->load->view('layout/scripts');
		}
	}

	public function post_cambiar_password(){
		if(!$this->session->login){
			redirect('auth/login');
		}else{
			sleep(1);
			$password	= $this->input->post('password');
			$password_new	= $this->input->post('password_new');

			$response = $this->usuarios_model->get_by_id($this->session->id);

			if($response["success"]){ // Comprueba que la fila no este vacia
				$usuario = $response["response"];
				if($usuario->USUA_PASSWORD == $password) {

					if($this->usuarios_model->set_password($password_new)){
						$data = ["success"=>true, "message"=>"Contraseña cambiada correctamente"];	
					}else{
						$data = ["success"=>false, "message"=>"Ocurrió un error al cambiar de contraseña"];	
						
					}
				}else{
					$data = ["success"=>false, "message"=>"Contraseña incorrecta"];	
				}
			}else{
				$data = ["success"=>false, "message"=>"Datos incorrectos, no se ha registrado"];
			}
		}
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/auth/login');
	}
}
