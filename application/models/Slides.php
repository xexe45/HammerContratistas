<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Slides extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	public function listarPortada(){
		$query = "CALL sp_listar_slides";
		$this->load->database();
		$slides = $this->db->query($query);
		$this->db->close();
		return $slides->result();
	}
	public function registrar($data){
		$query = "CALL sp_registrar_slides(?,?,?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$data);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;
		
	}
	public function editar($data){
		$query = "CALL sp_editar_slides(?,?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$data);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;
	}
	public function delete($data){
		$query = "CALL sp_borrar_slide(?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$data);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;
		
	}
	public function listarSlice($id){
		$query = "CALL sp_get_slide_id(?)";
		$this->load->database();
		$slide = $this->db->query($query,$id);
		$this->db->close();
		return $slide->row();
	}
}
/* End of file Slides.php */
/* Location: ./application/models/Slides.php */