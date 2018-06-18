<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcontacto extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function listar(){
		
		$query = "CALL sp_listar_mensajes()";
		$this->load->database();
		$mensajes = $this->db->query($query);
		$this->db->close();
		return $mensajes->result();
		
	}
	
	public function update($data){

		$query = "CALL sp_editar_mensaje(?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$data);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;

	}

}

/* End of file Mcontacto.php */
/* Location: ./application/models/Mcontacto.php */