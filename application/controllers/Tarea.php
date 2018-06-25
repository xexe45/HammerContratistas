<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarea extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Tareas');
	}

	public function index()
	{
		
		$tarea['data'] = $this->Tareas->listar();
		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($tarea);
		
	}

	public function tareas(){
		$this->load->view('administracion/header');
		$this->load->view('administracion/tareas');
	}

	public function registrar(){

		if(!$this->input->is_ajax_request()){ return; }
		if(!$this->input->post()){ return; }

		$respuesta = array();
	

		if($this->form_validation->run('tareas')){

			$servicio_id = $this->security->xss_clean(strip_tags($this->input->post('servicio_id')));
			$user_id = $this->session->userdata('id');
			$tarea = $this->security->xss_clean(strip_tags($this->input->post('tarea')));
			

			$data = array($servicio_id, $user_id, $tarea);
			
			if($this->Tareas->registrar($data)){

				$respuesta["valido"] = true;
				$respuesta["mensaje"]  = 'Tarea registrada correctamente';

			}else{

				$respuesta["valido"] = false;
				$respuesta["error"]  = "No se pudo registrar la tarea, vuelva a intentarlo porfavor";

			}
		}else{

			$respuesta["valido"] = false;
			$respuesta["mensaje"]  = validation_errors();

		}

		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($respuesta);

	}

}