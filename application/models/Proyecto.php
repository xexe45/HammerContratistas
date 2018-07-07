<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyecto extends CI_Model {

	public function __construct()
	{
		parent::__construct();			
	}

	public function listarProyectos(){

		$query = "CALL sp_get_proyectos";
		$this->load->database();
		$proyectos = $this->db->query($query);
		$this->db->close();
		return $proyectos->result();

	}

	public function listarProyectosSlug($slug){

		$query = "CALL sp_get_proyect_slug(?)";
		$this->load->database();
		$proyecto = $this->db->query($query,$slug);
		$this->db->close();
		return $proyecto->row();

	}

	public function listarGaleriaSlug($slug){

		$query = "CALL sp_get_galeria(?)";
		$this->load->database();
		$galeria = $this->db->query($query,$slug);
		$this->db->close();
		return $galeria->result();

	}

	public function insert(array $data){

		$query = "CALL sp_registrar_proyecto(?,?,?,?,?,?,?,?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$data);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;

	}

	public function insertGallery(array $data){

		$query = "CALL sp_registrar_galeria(?,?,?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$data);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;

	}

	public function updateGallery(array $data){

		$query = "CALL sp_update_foto(?,?,@s)";
		$this->load->database();
		$this->db->trans_start();
		$this->db->query($query,$data);
		$res = $this->db->query('select @s as res');
		$this->db->trans_complete();
		$this->db->close();
		return $res->row()->res;

	}

	public function getTodosPaginacion($tipo,$pagina,$porpagina,$quehago){
		$this->load->database();
		switch($quehago){
			case 'limit';
				$query = $this->db
						->select("proyecto.id as v1,proyecto.servicio_id as v2,servicios.servicio as v3,proyecto.nombre as v4,proyecto.img_principal as v5, proyecto.descripcion as v6")
						->from("proyecto")
						->join('servicios', 'servicios.id = proyecto.servicio_id')
						->where('proyecto.tipo',$tipo)
						->limit($porpagina,$pagina)
						->order_by("proyecto.id","DESC")
						->get();

				return $query->result();
			break;

			case 'cuantos';
				$query = $this->db
						->select("proyecto.id as v1,proyecto.servicio_id as v2,servicios.servicio as v3,proyecto.nombre as v4,proyecto.img_principal as v5, proyecto.descripcion as v6")
						->from("proyecto")
						->join('servicios', 'servicios.id = proyecto.servicio_id')
						->where('proyecto.tipo',$tipo)
						->count_all_results();

				return $query;
			break;
		}
	}	

}

/* End of file Proyecto.php */
/* Location: ./application/models/Proyecto.php */