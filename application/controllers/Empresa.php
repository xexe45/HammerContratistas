<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Info');
	}

	public function update()
	{
		if(!$this->input->is_ajax_request()){ return; }

		if(!$this->input->post()){ return; }

		$respuesta = array();

		if($this->form_validation->run('update_info')){

			$id = $this->security->xss_clean(strip_tags($this->input->post('id')));
			$nombre = $this->security->xss_clean(strip_tags($this->input->post('nombre')));
			$ruc = $this->security->xss_clean(strip_tags($this->input->post('ruc')));
			$direccion = $this->security->xss_clean(strip_tags($this->input->post('direccion')));
			$telefono = $this->security->xss_clean(strip_tags($this->input->post('telefono')));
			$correo = $this->security->xss_clean(strip_tags($this->input->post('correo')));
			$presentacion = $this->security->xss_clean(strip_tags($this->input->post('presentacion')));

			$data = array($id,$nombre,$ruc,$direccion,$telefono,$correo,$presentacion);

			if($this->Info->update($data)){
				$respuesta["valido"] = true;
				$respuesta["mensaje"]  = 'Información editada correctamente';
			}else{
				$respuesta["valido"] = false;
				$respuesta["error"]  = "No se pudo editar la información, vuelva a intentarlo porfavor";
			}


		}else{
			$respuesta["valido"] = false;
			$respuesta["mensaje"]  = validation_errors();
		}

		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($respuesta);
		
	}

	public function update_logo(){

		if(!$this->input->is_ajax_request()){ return; }
		if(!$this->input->post()){ return; }

		$respuesta = array();
		$fotoActual = $this->Info->infoQuery();

		//subimos el archivo
		$config['upload_path'] = './assets/imgs'; //ruta donde se copiará
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

			$id = $this->security->xss_clean(strip_tags($this->input->post('id')));
			$file_name = $ima['file_name'];

			$data = array($id, $file_name);

			if($this->Info->updateLogo($data)){
				$file = "./assets/imgs/".$fotoActual->logo;
				$do = unlink($file);
				if(!$do){
					$respuesta["valido"] = true;
					$respuesta["mensaje"] = "Logo Cambiado Correctamente pero no se pudo eliminar la foto anterior";
					$respuesta["path"] = $file_name;
				}else{
					$respuesta["valido"] = true;
					$respuesta["mensaje"] = "Logo Cambiado Correctamente";
					$respuesta["path"] = $file_name;
				}
			}else{
				$respuesta['valido'] = false;
				$respuesta['mensaje'] = 'No se pudo cambiar el logo, vuelva a intentarlo porfavor';
			}
			
		}


		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($respuesta);

	}

}

/* End of file Empresa.php */
/* Location: ./application/controllers/Empresa.php */