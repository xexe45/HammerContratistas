<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Musuario extends CI_Model {

	public function __construct()
	{	
		parent::__construct();	
	}

	public function listar(){

		$query = "CALL sp_listar_usuarios";
		$this->load->database();
		$info = $this->db->query($query);
		$this->db->close();
		return $info->result();
	}

	public function registrar(array $data){

		$query = "CALL sp_registrar_usuario(?,?,?,?,?,?,?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$data);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;

	}	

}

/* End of file Musuario.php */
/* Location: ./application/models/Musuario.php */