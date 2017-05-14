<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 09/05/2017
 * Time: 07:06 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Prueba extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index2(){
        $this->load->model('prueba_model');
        echo "<pre>";
        print_r($this->prueba_model->password());
        echo "</pre>";
    }
    public function index(){

        $data = array('page_title'=>'Panel de administración');
        $this->load->view('layout/head',$data);
        $this->load->view('layout/header');
        $this->load->view('prueba/content');
        $this->load->view('layout/menu');
        $this->load->view('layout/scripts');

    }

}