<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Slides');
		$this->load->model('Info');
		$this->load->model('Cliente');
		$this->load->model('Contactos');
	}

	public function index()
	{
		$data['slides'] = $this->Slides->listarPortada();
		$data['contador'] = count($data['slides']);
		$data['info'] = $this->Info->listarInfo();
		$data['clientes'] = $this->Cliente->listar();

		$this->load->view('templates/header');
		$this->load->view('portada',$data);
		$this->load->view('templates/footer');
	}

	public function contacto()
	{
		if(!$this->input->is_ajax_request()){ return; }

		if(!$this->input->post()){ return; }

		$respuesta = array();

		if($this->form_validation->run('contacto')){

			$name = $this->security->xss_clean(strip_tags($this->input->post('name')));
			$phone = $this->security->xss_clean(strip_tags($this->input->post('phone')));
			$correo = $this->security->xss_clean(strip_tags($this->input->post('correo')));
			$mensaje = $this->security->xss_clean(strip_tags($this->input->post('mensaje')));
			

			$data = array($name,$phone,$correo,$mensaje);

			if($this->Contactos->insert($data)){
				$respuesta["valido"] = true;
				$respuesta["mensaje"]  = 'Mensaje enviado correctamente, pronto un asesor se pondrá en contacto con usted.';
			}else{
				$respuesta["valido"] = false;
				$respuesta["error"]  = "No se pudo enviar el mensaje, vuelva a intentarlo porfavor";
			}


		}else{
			$respuesta["valido"] = false;
			$respuesta["mensaje"]  = validation_errors();
		}

		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($respuesta);
		
	}

}
