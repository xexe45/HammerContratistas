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

	public function usuarios(){
		$this->load->view('administracion/header');
		$this->load->view('administracion/usuario');
	}

	public function doreg(){
		$respuesta = array();
        $respuesta['error'] = "";
        $usuario_id = $this->session->userdata('id');
        $this->form_validation->set_rules('nombre','Nombre','required|is_string|trim|max_length[50]');

        $this->form_validation->set_rules('apellidos','Apellidos','required|is_string|trim|max_length[100]');

        $this->form_validation->set_rules('dni','DNI','required|numeric|trim|max_length[8]|min_length[8]');

        $this->form_validation->set_rules('telefono','Telefono','required|numeric|trim|max_length[12]');

        $this->form_validation->set_rules('direccion','Direccion','required|is_string|trim|max_length[255]');

        $this->form_validation->set_rules('correo','Correo Electrónico','required|is_string|trim|valid_email');

        $this->form_validation->set_rules('password','Password','required|is_string|trim|max_length[200]');

        $this->form_validation->set_rules('rol','Rol de usuario','required|is_string|in_list[user,admin]');

	 if ($this->form_validation->run() == FALSE)
                {
                  	$respuesta["valido"] = false;
					$respuesta["mensaje"]  = validation_errors();
    
                }
                else
                {
                    $d= array($usuario_id,$this->input->post('nombre'),$this->input->post('apellidos'),$this->input->post('dni'),$this->input->post('telefono'),$this->input->post('direccion'),$this->input->post('correo'),$this->bcrypt->hash_password($this->input->post('password'))
						,$this->input->post('rol'));

                     if ($this->Musuario->registrar($d)){

                        $respuesta["valido"] = true;
						$respuesta["mensaje"]  = 'Usuario registrado correctamente';

                     }

                     else{

                        $respuesta["valido"] = false;
						$respuesta["mensaje"]  = "No se pudo registrar usuario";

                     }
                }
               
   header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($respuesta));                          

	}

	public function registrar()
	{
		if(!$this->input->is_ajax_request()){ return; }

		if(!$this->input->post()){ return; }

		$respuesta = array();

		if($this->form_validation->run('add_usuario')){
			$user_id = $this->session->userdata('id');
			$nombre = $this->security->xss_clean(strip_tags($this->input->post('nombre')));
			$apellidos = $this->security->xss_clean(strip_tags($this->input->post('apellidos')));
			$dni = $this->security->xss_clean(strip_tags($this->input->post('dni')));
			$telefono = $this->security->xss_clean(strip_tags($this->input->post('telefono')));
			$direccion = $this->security->xss_clean(strip_tags($this->input->post('direccion')));
			$correo = $this->security->xss_clean(strip_tags($this->input->post('correo')));
			$password = $this->security->xss_clean(strip_tags($this->input->post('password')));
			$rol = $this->security->xss_clean(strip_tags($this->input->post('rol')));

			$data = array($user_id,$nombre,$apellidos,$dni,$telefono,$direccion,$correo,$this->bcrypt->hash_password($password),$rol);

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