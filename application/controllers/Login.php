<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function login(){

		$respuesta = array();
        $respuesta['error'] = "";
 
		$this->form_validation->set_rules('correo','Correo Electronico','required|valid_email|max_length[200]|min_length[12]');

		$this->form_validation->set_rules('password','Contraseña','max_length[200]|min_length[6]');

	 	if ($this->form_validation->run() == FALSE)
       	{
               $respuesta['error'] = validation_errors();
    
        }
        else
        {
            //acierto 
            $respuesta['ok'] = "Validacion correcta";
   
        }

   		header('Content-Type: application/x-json; charset=utf-8');
        echo json_encode($respuesta);                    
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */