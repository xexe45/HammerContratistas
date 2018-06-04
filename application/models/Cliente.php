<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function listar(){
		
		$query = "CALL sp_get_clientes()";
		$this->load->database();
		$clientes = $this->db->query($query);
		$this->db->close();
		return $clientes->result();
		
	}

	public function insert(array $data){

		$query = "CALL sp_registrar_cliente(?,?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$data);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;

	}

	public function buscar($parametro){
		$query = "CALL sp_buscar_cliente(?)";
		$this->load->database();
		$data = $this->db->query($query,$parametro);
		$this->db->close();
		return $data->result();
	}

}

/* End of file Cliente.php */
/* Location: ./application/models/Cliente.php */