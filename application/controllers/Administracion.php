<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administracion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Info');
	}

	public function inicio(){
		$this->load->view('administracion/header');
		$this->load->view('administracion/home');
	}



}

/* End of file Administracion.php */
/* Location: ./application/controllers/Administracion.php */