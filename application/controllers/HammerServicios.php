<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HammerServicios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Servicios');
	}

	public function servicios($id)
	{
		$servicio = $this->Servicios->servicio($id);
		if(isset($servicio)){
			$this->load->view('templates/header');
			$this->load->view('servicios', compact('servicio'));
			$this->load->view('templates/footer');
		}else{
			redirect(base_url());
		}
		
	}

}

/* End of file HammerServicios.php */
/* Location: ./application/controllers/HammerServicios.php */