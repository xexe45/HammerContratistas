<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HammerServicios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Servicios');
		$this->load->model('Tareas');
	}



	public function servicios($id)
	{
		$servicio = $this->Servicios->servicio($id);
		if(isset($servicio)){
			$tareas = $this->Tareas->listarServicio($id);
			$this->load->view('templates/header');
			$this->load->view('servicios', compact('servicio','tareas'));
			$this->load->view('templates/footer');
		}else{
			redirect(base_url());
		}
		
	}

	public function listar()
	{
		
		$servicios['data'] = $this->Servicios->listar();
		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($servicios);
		
	}

}

/* End of file HammerServicios.php */
/* Location: ./application/controllers/HammerServicios.php */