<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Servicios');
		$this->load->model('Mlogin');
	}

	public function index()
	{
		
		$servicios['data'] = $this->Servicios->listar();
		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($servicios);
		
	}

	public function servicios(){
		$myEmail = $this->session->userdata('email');
		
		$lastConnection = $this->Mlogin->lastConnection($myEmail);
		$this->load->view('administracion/header', compact('lastConnection'));
		$this->load->view('administracion/servicios');
	}

	public function registrar(){

		if(!$this->input->is_ajax_request()){ return; }
		if(!$this->input->post() ){ return; }

		$respuesta = array();

		if($this->form_validation->run('servicios')){
			$user_id = $this->session->userdata('id');
			$servicio = $this->security->xss_clean(strip_tags($this->input->post('servicio')));

			$descripcion = $this->security->xss_clean(strip_tags($this->input->post('descripcion')));

			//subimos el archivo
			$config['upload_path'] = './assets/imgs/servicios'; //ruta donde se copiará
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']     = '2048';
			//$config['max_width'] = '1024';
			//$config['max_height'] = '768';
			$config['encrypt_name'] = true;

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('file')){

				$error = array('error' => $this->upload->display_errors());
				$respuesta['valido'] = false;
				$respuesta['mensaje'] = $error['error'];

			}else{
					
				//obtenemos el nombre del archivo
				$ima = $this->upload->data();

				$file_name = $ima['file_name'];

				$data = array($user_id,$servicio,$file_name,$descripcion);

				if($this->Servicios->registrar($data)){

					$respuesta['valido'] = true;
					$respuesta['mensaje'] = "Servicio registrado correctamente";

				}else{

					$respuesta['valido'] = false;
					$respuesta['mensaje'] = "No se pudo registrar";

				}
	
			}


		}else{
			$respuesta['valido'] = false;
			$respuesta['mensaje'] = validation_errors();
		}

		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($respuesta);

	}

}

/* End of file Servicio.php */
/* Location: ./application/controllers/Servicio.php */