<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mreporte extends CI_Model {

	public function __construct()
	{
		parent::__construct();
			
	}

	public function registros(){
		$query = "CALL sp_count_registro";
		$this->load->database();
		$registros = $this->db->query($query);
		$this->db->close();
		return $registros->row();

	}
	public function ediciones(){
		$query = "CALL sp_count_edicion";
		$this->load->database();
		$registros = $this->db->query($query);
		$this->db->close();
		return $registros->row();
	}
	public function iteracciones($anio){
		$query = "CALL sp_reporte_iteracciones(?)";
		$this->load->database();
		$iteracciones = $this->db->query($query,$anio);
		$this->db->close();
		return $iteracciones->result();
	}		

}

/* End of file Mreporte.php */
/* Location: ./application/models/Mreporte.php */