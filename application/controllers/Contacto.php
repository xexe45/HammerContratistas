<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mcontacto');
	}

	public function mensajes(){
		$this->load->view('administracion/header');
		$this->load->view('administracion/mensajes');
	}

	public function index()
	{
		$mensajes['data'] = $this->Mcontacto->listar();
		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($mensajes);
	}

	public function vistos(){
		$data = $this->input->post('data');
		$user_id = $this->session->userdata('id');
		$resp = array();
		foreach ($data as $key => $valor) {
			$editar = array($valor['v1'],$user_id,'Mensaje de '.$valor['v2'].' puesto en visto');
			$resp[] = $this->Mcontacto->update($editar);
		}
		$resp['valido'] = true;
		$resp['mensaje'] = "Mensajes editados como vistos";
		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($resp);
	}
}

/* End of file Contacto.php */
/* Location: ./application/controllers/Contacto.php */