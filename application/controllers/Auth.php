<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('usuarios_model');
		$this->load->library('encrypt');
		//date_default_timezone_set("America/Cancun");
	}

	public function index(){
		//echo date("d-m-Y H:i:s");
		$this->login();
	}

	public function login(){
		if($this->session->userdata('login')){
			redirect("/");
		}
		
		$this->load->view('auth/login');
		
	}

	public function postLogin(){
		// Recibe los valores de los campos enviados por el método post()		
		$matricula		= $this->input->post('matricula');
		$password	= $this->input->post('password');
		// Llama a la function getUser() del modelo usuarios
		$response = $this->usuarios_model->get_by_matricula($matricula);

		if($response["success"]){ // Comprueba que la fila no este vacia
      $usuario = $response["response"];
			if($usuario->USUA_PASSWORD == $password){
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

	public function register(){
		if($this->session->userdata('login')){
			header("Location: ". base_url()."home");
		}
		
		$this->load->view('auth/register');
		
	}


	public function postRegister()
	{
		$usuario = $this->input->post();
		
		
		$respuesta = $this->usuarios_model->insert_usuario($usuario);

		if ($respuesta == 1) {
			/**
			*/
			echo "¡Exito! - redireccionando al inicio de sesión...";
		}
		elseif($respuesta == 2 ){
			echo "¡Error! - correo electrónico ya registrado";
		}
		else{
			echo "¡Error! - ocurrio un error interno";
		}
	}


	public function password_forgot(){
		if($this->session->userdata('login')){
			header("Location: ". base_url()."home");
		}
		
		$this->load->view('auth/password_forgot');
		
	}

	public function postPassword_forgot(){
		$email = $this->input->post('email');
		$usuario = $this->usuarios_model->getUser($email);
		if($usuario==null){
			echo "Error, no esta registrado el correo";
			return false;
		}
	   // Se genera una cadena para validar el cambio de contraseña
		$cadena = $usuario->id_usuario.$usuario->email.rand(1,9999999).date('Y-m-d');
   		$token = sha1($cadena);

   		$data = array(
   			'id_usuario' => $usuario->id_usuario, 
   			'token' => $token
   			);

	   	// Se inserta el registro en la tabla password_reset
   		$respuesta = $this->usuarios_model->insert_forgot($data);
   		
   		//echo $respuesta;

   		if($respuesta){
   			if($this->enviarEmail($email, $respuesta)){
   				echo "Exito - Se envió un correo con instrucciones para recuperar la contraseña";
   			}
   		}
 
	}


	public function enviarEmail( $email="", $link=""){

		$html = '
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Cambio de contraseña</title>
<style>
*{
  margin: 0;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  box-sizing: border-box;
  font-size: 14px;
}

img {
  max-width: 100%;
}

body {
  -webkit-font-smoothing: antialiased;
  -webkit-text-size-adjust: none;
  width: 100% !important;
  height: 100%;
  line-height: 1.6em;
}

table td {
  vertical-align: top;
}


body {
  background-color: #f6f6f6;
}

.body-wrap {
  background-color: #f6f6f6;
  width: 100%;
}

.container {
  display: block !important;
  max-width: 600px !important;
  margin: 0 auto !important;
  clear: both !important;
}

.content {
  max-width: 600px;
  margin: 0 auto;
  display: block;
  padding: 20px;
}

.main {
  background-color: #fff;
  border: 1px solid #e9e9e9;
  border-radius: 3px;
}

.content-wrap {
  padding: 20px;
}

.content-block {
  padding: 0 0 20px;
}

.header {
  width: 100%;
  margin-bottom: 20px;
}

.footer {
  width: 100%;
  clear: both;
  color: #999;
  padding: 20px;
}
.footer p, .footer a, .footer td {
  color: #999;
  font-size: 12px;
}

h1, h2, h3 {
  font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
  color: #000;
  margin: 40px 0 0;
  line-height: 1.2em;
  font-weight: 400;
}

h1 {
  font-size: 32px;
  font-weight: 500;
}

h2 {
  font-size: 24px;
}

h3 {
  font-size: 18px;
}

h4 {
  font-size: 14px;
  font-weight: 600;
}
p, ul, ol {
  margin-bottom: 10px;
  font-weight: normal;
}
p li, ul li, ol li {
  margin-left: 5px;
  list-style-position: inside;
}
a {
  color: #348eda;
  text-decoration: underline;
}
.btn-primary {
  text-decoration: none;
  color: #FFF;
  background-color: #348eda;
  border: solid #348eda;
  border-width: 10px 20px;
  line-height: 2em;
  font-weight: bold;
  text-align: center;
  cursor: pointer;
  display: inline-block;
  border-radius: 5px;
  text-transform: capitalize;
}

.last {
  margin-bottom: 0;
}

.first {
  margin-top: 0;
}

.aligncenter {
  text-align: center;
}

.alignright {
  text-align: right;
}

.alignleft {
  text-align: left;
}

.clear {
  clear: both;
}

.alerta{
  font-size: 16px;
  color: #fff;
  font-weight: 500;
  padding: 20px;
  text-align: center;
  border-radius: 3px 3px 0 0;
}
.alerta a {
  color: #fff;
  text-decoration: none;
  font-weight: 500;
  font-size: 16px;
}
.alerta-warning {
	font-size: 16px;
  color: #fff;
  font-weight: 500;
  padding: 20px;
  text-align: center;
  border-radius: 3px 3px 0 0;
  background-color: #FF9F00;
}
.alerta > .alerta-bad {
  background-color: #D0021B;
}
.alerta > .alerta-good {
  background-color: #68B90F;
}

.invoice {
  margin: 40px auto;
  text-align: left;
  width: 80%;
}
.invoice td {
  padding: 5px 0;
}
.invoice .invoice-items {
  width: 100%;
}
.invoice .invoice-items td {
  border-top: #eee 1px solid;
}
.invoice .invoice-items .total td {
  border-top: 2px solid #333;
  border-bottom: 2px solid #333;
  font-weight: 700;
}

@media only screen and (max-width: 640px) {
  body {
    padding: 0 !important;
  }

  h1, h2, h3, h4 {
    font-weight: 800 !important;
    margin: 20px 0 5px !important;
  }

  h1 {
    font-size: 22px !important;
  }

  h2 {
    font-size: 18px !important;
  }

  h3 {
    font-size: 16px !important;
  }

  .container {
    padding: 0 !important;
    width: 100% !important;
  }

  .content {
    padding: 0 !important;
  }

  .content-wrap {
    padding: 10px !important;
  }

  .invoice {
    width: 100% !important;
  }
}	
</style>
</head>

<body>

<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" width="600">
			<div class="content">
				<table class="main" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td class="alerta-warning">
							Solicitud de cambio de contraseña.
						</td>
					</tr>
					<tr>
						<td class="content-wrap">
							<table width="100%" cellpadding="0" cellspacing="0">
								<tr>
									<td class="content-block">
										<p>Hemos recibido una petición para restablecer la contraseña de tu cuenta.</p>
	       <p>Si hiciste esta petición, haz clic en el siguiente enlace, si no hiciste esta petición puedes ignorar este correo.</p>
									</td>
								</tr>
								<tr>
									<td class="content-block">
										<p>Fecha de generación: '.date("d-m-Y H:i:s").' .</p>
										<p>Fecha de vencimiento: '.date('d-m-Y H:i:s', strtotime("1 day")).'</p>
									</td>
								</tr>
								<tr>
									<td class="content-block">
										<a href="'.$link.'" class="btn-primary">Recuperar mi contraseña</a>
									</td>
								</tr>
								<tr>
									<td class="content-block">
										Esta solicitud es válida unicamente por 24 horas.
									</td>
								</tr>
								<tr>
									<td class="content-block">
										Enviado desde sistema de inscripciones.
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<div class="footer">
					<table width="100%">
						<tr>
							
						</tr>
					</table>
				</div></div>
		</td>
		<td></td>
	</tr>
</table>
</body>
</html>';
	//echo $html;

	  $config = array(
	  'protocol' => 'smtp',
	  'smtp_host' => 'ssl://smtp.gmail.com',
	  'smtp_port' => 465,
	  'smtp_user' => 'rrdc123@gmail.com', 
	  'smtp_pass' => 'rafaelo07', 
	  'mailtype' => 'html',
	  'charset' => 'utf-8',
	  'wordwrap' => TRUE
	);


	$this->load->library('email', $config);

	$this->email->initialize($config); // Add 
	$this->email->set_newline("\r\n");

	$this->email->from('rrdc123@gmail.com', 'Sistema de inscripciones');
	$this->email->to($email);
	$this->email->subject('Recupera tu contraseña || Sistema de inscripciones');
	$this->email->message($html);

	if($this->email->send()) {
	  //echo 'Email sent.'; 
	  return true;   
	} else {
	  print_r($this->email->print_debugger());  
	  return false;
	}
	}


	public function password_reset(){
		$token = $this->input->get('token');
		
		if($this->session->userdata('login')){
			header("Location: ". base_url()."home");
		}
		$usuario = $this->usuarios_model->get_forgot($token);

		if($usuario!=NULL){
			$data = array('id_usuario' => $usuario->id_usuario,
							'token'=> $token );
			//var_dump($this->usuarios_model->get_forgot($token)!=null);
			$this->load->view('auth/password_reset',$data);
		}else{
			$this->load->view('auth/password_reset_error');
		}
		
	}

	public function postPassword_reset(){
		
		$post = $this->input->post();
		$resultado = $this->usuarios_model->password_reset($post);
		if($resultado){
				echo "Exito, contraseña actualizada. Puedes ingresar ahora con tus nuevos datos";
				return true;
		}
		echo "Error";
		return false;
	}


	public function logout(){
		$this->session->sess_destroy();
		header("Location: " . base_url());

	}
}
