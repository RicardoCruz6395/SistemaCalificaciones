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
    // Funcion index
    // Sin parámetros
    // Elaborado por Rodolfo
    public function index(){
        // Se escribe el titulo de la pagina y se manda a la vista
        $data = array('page_title'=>'Panel de administración');
        // $data array que recibe la vista
        // Contiene los css de la plantilla
        $this->load->view('layout/head',$data);
        // Es la barra superior de la plantilla
        $this->load->view('layout/header');
        // Este es el contenedor de la plantilla
        // Este archivo es en el que trabajarán
        $this->load->view('prueba/content');
        // Menu lateral
        $this->load->view('layout/menu');
        // Js para que funcione la plantilla correctamente
        $this->load->view('layout/scripts');
    }

    // Funcion maestros
    // Sin parámetros
    // Elaborado por Amaury
    public function maestros(){
       $data = array('page_title'=>'Panel de maestros');
        $this->load->view('layout/head',$data);
        $this->load->view('layout/header');
        $this->load->view('prueba/content');
        $this->load->view('layout/menu');
        $this->load->view('prueba/scripts');
    }

}