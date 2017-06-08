<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {
	public function custom404(){

		$title = 'SCP :: Página no encontrada';

		$this->load->view('errors/custom404', ['title' => $title]);
	}
}