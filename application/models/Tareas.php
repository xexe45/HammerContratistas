<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tareas extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function listar(){
		
		$query = "CALL sp_listar_tareas()";
		$this->load->database();
		$tareas = $this->db->query($query);
		$this->db->close();
		return $tareas->result();
	}

	public function registrar($data){

		$query = "CALL sp_registrar_tarea(?,?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$data);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;
		
	}
	

}