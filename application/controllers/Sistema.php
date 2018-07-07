<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Msistema');
	}

	public function index()
	{
        $this->load->view('administracion/header');
		$this->load->view('administracion/sistema');
    }
    
    public function registros(){

        $registros['data'] = $this->Msistema->registros();
        header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($registros);

    }

	

}

/* End of file Sistema.php */
/* Location: ./application/controllers/Sistema.php */