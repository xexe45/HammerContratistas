<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('bcrypt');
		$this->load->model('Musuario');
		
	}

	public function index()
	{
		$usuarios['data'] = $this->Musuario->listar();
		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($usuarios);
	}

	public function registrar()
	{
		if(!$this->input->is_ajax_request()){ return; }

		if(!$this->input->post()){ return; }

		$respuesta = array();

		if($this->form_validation->run('add_usuario')){

			$nombre = $this->security->xss_clean(strip_tags($this->input->post('nombre')));
			$apellidos = $this->security->xss_clean(strip_tags($this->input->post('apellidos')));
			$dni = $this->security->xss_clean(strip_tags($this->input->post('dni')));
			$telefono = $this->security->xss_clean(strip_tags($this->input->post('telefono')));
			$direccion = $this->security->xss_clean(strip_tags($this->input->post('direccion')));
			$correo = $this->security->xss_clean(strip_tags($this->input->post('correo')));
			$password = $this->security->xss_clean(strip_tags($this->input->post('password')));
			$rol = $this->security->xss_clean(strip_tags($this->input->post('rol')));

			$data = array($nombre,$apellidos,$dni,$telefono,$direccion,$correo,$this->bcrypt->hash_password($password),$rol);

			if($this->Musuario->registrar($data)){
				$respuesta["valido"] = true;
				$respuesta["mensaje"]  = 'Usuario registrado correctamente';
			}else{
				$respuesta["valido"] = false;
				$respuesta["mensaje"]  = "No se pudo registrar usuario";
			}

		}else{
			$respuesta["valido"] = false;
			$respuesta["mensaje"]  = validation_errors();
		}

		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($respuesta);
		
	}

}

/* End of file Usuario.php */
/* Location: ./application/controllers/Usuario.php */