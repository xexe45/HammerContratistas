<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HammerProyectos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->model('Proyecto');
	}

	public function concluidos()
	{
		//load pagination
		//zona de configuración inicial de la paginación
		if($this->uri->segment(3)){//helper uri
			$pagina = $this->uri->segment(3);
		}else{
			$pagina = 0;
		}
		$porpagina = 6;
		//zona de carga de datos
		$datos = $this->Proyecto->getTodosPaginacion('concluido',$pagina,$porpagina,"limit");
		$cuantos = $this->Proyecto->getTodosPaginacion('concluido',$pagina,$porpagina,"cuantos");
		//zona de configuración de la libreria pagination
		$config['base_url'] = base_url()."HammerProyectos/concluidos";
		$config['total_rows'] = $cuantos;
		$config['per_page'] = $porpagina;
		$config['uri_segment'] = '3';
		$config['num_links'] = '4'; 
		$config['first_link'] = 'Primero';
		$config['next_link'] = 'Siguiente';
		$config['prev_link'] = 'Anterior';
		$config['last_link'] = 'Último';
		$config['full_tag_open'] 	= '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] 	= '</ul></nav></div>';
		$config['num_tag_open'] 	= '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] 	= '</span></li>';
		$config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open'] 	= '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open'] 	= '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close'] 	= '</span></li>';
		$config['first_tag_open'] 	= '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open'] 	= '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close'] 	= '</span></li>';
		$this->pagination->initialize($config);
		//$this->load->view('home/index') --> use this code if you dont have layout library;
		$opc = 3;
		$this->load->view('templates/header');
		$this->load->view('proyectos',compact('datos','cuantos','pagina','opc'));
		$this->load->view('templates/footer');
	}

	public function proceso()
	{
		//load pagination
		//zona de configuración inicial de la paginación
		if($this->uri->segment(3)){//helper uri
			$pagina = $this->uri->segment(3);
		}else{
			$pagina = 0;
		}
		$porpagina = 6;
		//zona de carga de datos
		$datos = $this->Proyecto->getTodosPaginacion('proceso',$pagina,$porpagina,"limit");
		$cuantos = $this->Proyecto->getTodosPaginacion('proceso',$pagina,$porpagina,"cuantos");
		//zona de configuración de la libreria pagination
		$config['base_url'] = base_url()."HammerProyectos/proceso";
		$config['total_rows'] = $cuantos;
		$config['per_page'] = $porpagina;
		$config['uri_segment'] = '3';
		$config['num_links'] = '4'; 
		$config['first_link'] = 'Primero';
		$config['next_link'] = 'Siguiente';
		$config['prev_link'] = 'Anterior';
		$config['last_link'] = 'Último';
		$config['total_rows'] = $cuantos;
		$config['per_page'] = $porpagina;
		$config['uri_segment'] = '3';
		$config['num_links'] = '4'; 
		$config['first_link'] = 'Primero';
		$config['next_link'] = 'Siguiente';
		$config['prev_link'] = 'Anterior';
		$config['last_link'] = 'Último';
		$config['full_tag_open'] 	= '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] 	= '</ul></nav></div>';
		$config['num_tag_open'] 	= '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] 	= '</span></li>';
		$config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open'] 	= '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open'] 	= '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close'] 	= '</span></li>';
		$config['first_tag_open'] 	= '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open'] 	= '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close'] 	= '</span></li>';
		$this->pagination->initialize($config);
		//$this->load->view('home/index') --> use this code if you dont have layout library;
		$opc = 3;
		$this->load->view('templates/header');
		$this->load->view('proyectos',compact('datos','cuantos','pagina','opc'));
		$this->load->view('templates/footer');
	}

}

/* End of file HammerProyectos.php */
/* Location: ./application/controllers/HammerProyectos.php */