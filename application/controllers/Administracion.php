<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administracion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function inicio(){
		$this->load->view('administracion/header');
		$this->load->view('administracion/home');
	}

	public function usuarios(){
		$this->load->view('administracion/header');
		$this->load->view('administracion/usuario');
	}

	public function clientes(){
		$this->load->view('administracion/header');
		$this->load->view('administracion/cliente');
	}

	public function empresa(){
		$this->load->view('administracion/header');
		$this->load->view('administracion/empresa');
	}

	public function filosofia(){
		$this->load->view('administracion/header');
		$this->load->view('administracion/filosofia');
	}

	public function servicios(){
		$this->load->view('administracion/header');
		$this->load->view('administracion/servicios');
	}

	public function proyectos(){
		$this->load->view('administracion/header');
		$this->load->view('administracion/proyectos');
	}

	public function portada(){
		$this->load->view('administracion/header');
		$this->load->view('administracion/portada');
	}


}

/* End of file Administracion.php */
/* Location: ./application/controllers/Administracion.php */