<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administracion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Info');
		$this->load->model('Mlogin');
	}

	public function inicio(){

		$myEmail = $this->session->userdata('email');
		
		$lastConnection = $this->Mlogin->lastConnection($myEmail);

		$this->load->view('administracion/header', compact('lastConnection'));
		$this->load->view('administracion/home');
	}



}

/* End of file Administracion.php */
/* Location: ./application/controllers/Administracion.php */