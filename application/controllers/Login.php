<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
        $this->load->library('Bcrypt');
        $this->load->model('Mlogin');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function login(){

        if(!$this->input->is_ajax_request()){return;}

        if(!$this->input->post()){return;}

        $responder = array();



        if($this->form_validation->run('login')){

            $email = $this->security->xss_clean(strip_tags($this->input->post('correo')));
            $password = $this->security->xss_clean(strip_tags($this->input->post('pass')));

            $user = $this->Mlogin->loginAdmin($email,$password);

                if(isset($user)){
                        
                    $login = array(
                        'id' => $user->id,
                        'user' => $user->nombre." ".$user->apellidos,
                        'rol' => $user->rol
                    );
                        
                    $this->session->set_userdata( $login );

                    $responder["valido"] = true;
                        
                }else{
                    $responder["valido"] = false;
                    $responder["mensaje"] = "Usuario y/o clave incorrecto";
                }

        }else{
            $responder["valido"] = false;
            $responder["mensaje"] = validation_errors();
        }

        header('Content-Type: application/x-json; charset:utf-8');
        echo json_encode($responder);

        
    }  

     public function salir(){
        $this->session->sess_destroy();
        redirect(base_url());
     } 

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */