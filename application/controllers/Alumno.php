<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumno extends CI_Controller {

	public function index(){
		$this->load->view('alumno/index');
	}
}
