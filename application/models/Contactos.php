<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactos extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function insert(array $data){

		$query = "CALL sp_contacto(?,?,?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$data);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;

	}

}

/* End of file Contactos.php */
/* Location: ./application/models/Contactos.php */