<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function listar(){
		
		$query = "CALL sp_get_servicios()";
		$this->load->database();
		$servicios = $this->db->query($query);
		$this->db->close();
		return $servicios->result();
	}

	public function registrar($data){

		$query = "CALL sp_registrar_servicio(?,?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$data);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;
		
	}
	

}

/* End of file Servicios.php */
/* Location: ./application/models/Servicios.php */