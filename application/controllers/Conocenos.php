<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conocenos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('conocenos');
		$this->load->view('templates/footer');
	}

}

/* End of file Conocenos.php */
/* Location: ./application/controllers/Conocenos.php */