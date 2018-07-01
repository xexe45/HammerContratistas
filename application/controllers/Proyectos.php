<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Proyecto');
	}

	public function index()
	{
		
		$proyectos['data'] = $this->Proyecto->listarProyectos();
		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($proyectos);
	}

	
	public function proyectos(){
		$this->load->view('administracion/header');
		$this->load->view('administracion/proyectos');
	}

	public function store(){
		
		if( !$this->input->is_ajax_request() ){ return; }
		if( !$this->input->post() ){ return; }

		$respuesta = array();

		if($this->form_validation->run('store_proyect')){

			$servicio_id = $this->security->xss_clean(strip_tags($this->input->post('servicio_id')));
			$user_id = $this->session->userdata('id');
			$nombre = $this->security->xss_clean(strip_tags($this->input->post('nombre')));
			$slug = $this->security->xss_clean(strip_tags($this->input->post('slug')));
			$tipo = $this->security->xss_clean(strip_tags($this->input->post('tipo')));
			$cliente_id = $this->security->xss_clean(strip_tags($this->input->post('cliente_id')));
			$fecha = $this->security->xss_clean(strip_tags($this->input->post('fecha')));
			$descripcion = $this->security->xss_clean(strip_tags($this->input->post('descripcion')));

			if (!empty($_FILES['file']['name'])){

				//subimos el archivo
				$config['upload_path'] = './assets/imgs/proyectos'; //ruta donde se copiará
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				//$config['max_size']     = '100';
				//$config['max_width'] = '1024';
				//$config['max_height'] = '768';
				$config['encrypt_name'] = true;

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload('file')){

					$error = array('error' => $this->upload->display_errors());
					$respuesta['valido'] = false;
					$respuesta['mensaje'] = $error['error'];

				}else{
					
					//obtenemos el nombre del archivo
					$ima = $this->upload->data();

					$file_name = $ima['file_name'];

					$data = array($servicio_id,$user_id, $nombre,$tipo,$cliente_id, $fecha ,$file_name ,$descripcion, $slug);	

					if($this->Proyecto->insert($data)){
		
						$respuesta["valido"] = true;
						$respuesta["mensaje"] = "Proyecto agregado correctamente";

							
					}else{
						
						$respuesta['valido'] = false;
						$respuesta['mensaje'] = 'No se pudo registrar el Proyecto, vuelva a intentarlos porfavor.';
					}
					
				}
			}else{

				$data = array($servicio_id,$user_id, $nombre,$tipo,$cliente_id, $fecha,null ,$descripcion, $slug);	

				if($this->Proyecto->insert($data)){
	
					$respuesta["valido"] = true;
					$respuesta["mensaje"] = "Proyecto agregado correctamente";

							
				}else{
						
					$respuesta['valido'] = false;
					$respuesta['mensaje'] = 'No se pudo registrar el Proyecto, vuelva a intentarlos porfavor.';
				}
			}
		

		}else{
			
			$respuesta["valido"] = false;
			$respuesta["mensaje"]  = validation_errors();
		}

			header('Content-Type: application/x-json; charset:utf-8');
			echo json_encode($respuesta);
		
	}

}

/* End of file Proyectos.php */
/* Location: ./application/controllers/Proyectos.php */