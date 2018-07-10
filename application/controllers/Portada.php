<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portada extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Slides');
		$this->load->model('Mlogin');
	}

	public function index()
	{
		$slides['data'] = $this->Slides->listarPortada();
		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($slides);
	}

	public function portada(){
		$myEmail = $this->session->userdata('email');
		
		$lastConnection = $this->Mlogin->lastConnection($myEmail);
		$this->load->view('administracion/header', compact('lastConnection'));
		$this->load->view('administracion/portada');
	}

	public function registrar(){
		if(!$this->input->is_ajax_request()){ return; }
		if(!$this->input->post() ){ return; }
		$respuesta = array();
		if($this->form_validation->run('slides')){
			$user_id = $this->session->userdata('id');
			$titulo = $this->security->xss_clean(strip_tags($this->input->post('titulo')));
			$subtitulo = $this->security->xss_clean(strip_tags($this->input->post('subtitulo')));
			//subimos el archivo
			$config['upload_path'] = './assets/imgs/portada'; //ruta donde se copiará
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']     = '2048';
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
				$data = array($user_id,$file_name, $titulo, $subtitulo);
				if($this->Slides->registrar($data)){
					$respuesta['valido'] = true;
					$respuesta['mensaje'] = "Registro de slide correctamente";
				}else{
					$respuesta['valido'] = false;
					$respuesta['mensaje'] = "No se pudo registrar";
				}
	
			}
		}else{
			$respuesta['valido'] = false;
			$respuesta['mensaje'] = validation_errors();
		}
		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($respuesta);
	}
	
	public function delete(){
		if(!$this->input->is_ajax_request()){ return; }
		if(!$this->input->post('id')){ return; }
		$respuesta = array();
		$id = $this->input->post('id');
		$user_id = $this->session->userdata('id');
		$fotoActual = $this->Slides->listarSlice($id);
		$data = array($id,$user_id);
		$file = "./assets/imgs/portada/".$fotoActual->v2;
		$do = unlink($file);
			
		if(!$do){
			if($this->Slides->delete($data)){
				$respuesta["valido"] = true;
				$respuesta["mensaje"] = "Slide eliminado correctamente pero no se pudo eliminar el archivo anterior";
			}else{
				$respuesta["valido"] = false;
				$respuesta["mensaje"] = "No se pudo eliminar el registro";
			}
			
		}else{
	
			if($this->Slides->delete($data)){
				$respuesta["valido"] = true;
				$respuesta["mensaje"] = "Slide eliminado correctamente";
			}else{
				$respuesta["valido"] = false;
				$respuesta["mensaje"] = "No se pudo eliminar el registro";
			}
				
		}
		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($respuesta);
	}
}
/* End of file Portada.php */
/* Location: ./application/controllers/Portada.php */