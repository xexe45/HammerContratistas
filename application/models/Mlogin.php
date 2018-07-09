<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model {

	public function __construct()
	{
		parent::__construct();
			
	}

	public function validarusuario($data)
	{
		$this->load->database();  
 		$qry = "CALL sp_login(?,?)";
 		$r = $this->db->query($qry,$data);
		$this->db->close();	
 		return $r->row();		
	}

	public function loginAdmin(string $correo,string $hash){

		$this->load->database();

		$query = $this->db->select('*')
							->from('usuario')
							->where(['correo' => $correo])
							->get();
		$this->db->close();
		if($query->num_rows() == 1){

			$user = $query->row();
			$pass = $user->password;

			
			if($this->bcrypt->check_password($hash, $pass)){
 				return $query->row();
 			}
 			
		}
	}

	
	public function logueo($data){

		$query = "CALL sp_accesos(?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$data);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;

	}

	public function lastConnection($user){

		$this->load->database();  
 		$qry = "CALL sp_get_last_connection(?)";
 		$r = $this->db->query($qry,$user);
		$this->db->close();	
 		return $r->row();	

	}



}

/* End of file Mlogin.php */
/* Location: ./application/models/Mlogin.php */