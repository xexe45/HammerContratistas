<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msistema extends CI_Model {

	public function __construct()
	{
		parent::__construct();
			
	}

	public function registros(){
		$query = "CALL sp_get_historial";
		$this->load->database();
		$registros = $this->db->query($query);
		$this->db->close();
		return $registros->result();

	}
			

}

/* End of file Msistema.php */
/* Location: ./application/models/Msistema.php */