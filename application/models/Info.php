<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function listarInfo(){

		$query = "CALL sp_get_empresa";
		$this->load->database();
		$info = $this->db->query($query);
		$this->db->close();
		return $info->row();
	}

	public function update(array $data){

		$query = "CALL sp_editar_empresa(?,?,?,?,?,?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$data);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;

	}

	public function updateLogo(array $data){
		$query = "CALL sp_editar_logo(?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$data);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;

	}		

	public function info(){
		$query = 'CALL sp_get_info()';
		$this->load->database();
		$info = $this->db->query($query);
		$this->db->close();
		return $info->row();
	}

	public function infoQuery(){
		$this->load->database();
		$query = $this->db->select('logo')->from('empresa')->get();
		$this->db->close();
		return $query->row();
	}

	public function getFilosofia(){
		$query = "CALL sp_get_filosofia";
		$this->load->database();
		$filosofia = $this->db->query($query);
		$this->db->close();
		return $filosofia->row();
	}

	public function update_filosofia(array $data){

		$query = "CALL sp_editar_filosofia(?,?,?,?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$data);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;

	}

}

/* End of file Info.php */
/* Location: ./application/models/Info.php */