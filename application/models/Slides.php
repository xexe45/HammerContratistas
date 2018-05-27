<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slides extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function registrar($data){

		$query = "CALL sp_registrar_slides(?,?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$data);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;
		
	}

}

/* End of file Slides.php */
/* Location: ./application/models/Slides.php */