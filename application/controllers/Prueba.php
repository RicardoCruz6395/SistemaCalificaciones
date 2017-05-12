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
    public function index(){
        $this->load->model('prueba_model');
        echo "<pre>";
        print_r($this->prueba_model->test());
        echo "</pre>";
    }

}