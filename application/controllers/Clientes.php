<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index()
	{
		
	}

}

/* End of file Clientes.php */
/* Location: ./application/controllers/Clientes.php */