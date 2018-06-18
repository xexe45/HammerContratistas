<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mcontacto');
	}

	public function index()
	{
		$mensajes['data'] = $this->Mcontacto->listar();
		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($mensajes);
	}

	public function vistos(){
		$data = $this->input->post('data');
		$resp = array();
		foreach ($data as $key => $valor) {
			$resp[] = $this->Mcontacto->update($valor['v1']);
		}
		$resp['valido'] = true;
		$resp['mensaje'] = "Mensajes editados como visto";
		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($resp);
	}
}

/* End of file Contacto.php */
/* Location: ./application/controllers/Contacto.php */