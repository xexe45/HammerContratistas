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
		$this->load->model('Slides');
		$this->load->model('Mlogin');
	}

	public function empresa(){

		$info = $this->Info->info();

		$myEmail = $this->session->userdata('email');
		
		$lastConnection = $this->Mlogin->lastConnection($myEmail);

		$this->load->view('administracion/header', compact('lastConnection'));
		$this->load->view('administracion/empresa', compact('info'));
	
	}

	public function filosofiaEmpresarial(){
		$filosofia = $this->Info->getFilosofia();
		$myEmail = $this->session->userdata('email');
		
		$lastConnection = $this->Mlogin->lastConnection($myEmail);
		$this->load->view('administracion/header', compact('lastConnection'));
		$this->load->view('administracion/filosofia', compact('filosofia'));
	}

	public function update()
	{
		if(!$this->input->is_ajax_request()){ return; }

		if(!$this->input->post()){ return; }

		$respuesta = array();

		if($this->form_validation->run('update_info')){

			$id = $this->security->xss_clean(strip_tags($this->input->post('id')));
			$user_id = $this->session->userdata('id');
			$nombre = $this->security->xss_clean(strip_tags($this->input->post('nombre')));
			$ruc = $this->security->xss_clean(strip_tags($this->input->post('ruc')));
			$direccion = $this->security->xss_clean(strip_tags($this->input->post('direccion')));
			$telefono = $this->security->xss_clean(strip_tags($this->input->post('telefono')));
			$correo = $this->security->xss_clean(strip_tags($this->input->post('correo')));
			$presentacion = $this->security->xss_clean(strip_tags($this->input->post('presentacion')));

			$data = array($id,$user_id,$nombre,$ruc,$direccion,$telefono,$correo,$presentacion);

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
			$user_id = $this->session->userdata('id');
			$file_name = $ima['file_name'];

			$data = array($id, $user_id,$file_name);

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

	public function filosofia(){
		
		if(!$this->input->is_ajax_request()){ return; }
		if(!$this->input->post()){ return; }

		$respuesta = array();
	

		if($this->form_validation->run('edit_filosofia')){

			$id = $this->security->xss_clean(strip_tags($this->input->post('id')));
			$user_id = $this->session->userdata('id');
			$historia = $this->security->xss_clean(strip_tags($this->input->post('historia')));
			$mision = $this->security->xss_clean(strip_tags($this->input->post('mision')));
			$vision = $this->security->xss_clean(strip_tags($this->input->post('vision')));
			$valores = $this->security->xss_clean(strip_tags($this->input->post('valores')));

			$data = array($id, $user_id, $historia, $mision, $vision, $valores);
			
			if($this->Info->update_filosofia($data)){

				$respuesta["valido"] = true;
				$respuesta["mensaje"]  = 'Filoso´fía empresarial editada correctamente';

			}else{

				$respuesta["valido"] = false;
				$respuesta["error"]  = "No se pudo editar la filosofía empresarial, vuelva a intentarlo porfavor";

			}
		}else{

			$respuesta["valido"] = false;
			$respuesta["mensaje"]  = validation_errors();

		}

		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($respuesta);

	}

	public function slides(){

		if(!$this->input->is_ajax_request()){ return; }
		//if(!$this->input->post()){ return; }
		//return array('hola' => 'mundo');

		// Cargamos la libreria Upload
        $this->load->library('upload');
        $user_id = $this->session->userdata('id');
        $filosofia = $this->Info->getFilosofia();
		$respuesta = array();

		$data = array($user_id,$filosofia->v5,$filosofia->v6);
		$error = array();
		$error['error'] = '';

		//imagen 1
		if (!empty($_FILES['file1']['name'])){
			        
			// Configuración para el Archivo 1
			$config['upload_path'] = './assets/imgs/filosofia';
			$config['allowed_types'] = 'gif|jpg|png';
			//$config['max_size'] = '100';
			//$config['max_width']  = '1024';
			//$config['max_height']  = '768';       
			$config['encrypt_name'] = true;

			// Cargamos la configuración del Archivo 1
			$this->upload->initialize($config);

			// Subimos archivo 1
			if ($this->upload->do_upload('file1')){
			    //obtenemos el nombre del archivo
				$ima = $this->upload->data();
				$file_name = $ima['file_name'];
				$data[1] = $file_name;

			}else{
				$error['error'] = $error['error'].$this->upload->display_errors();
			}
		}

		// Revisamos si existe un segundo archivo
		if (!empty($_FILES['file2']['name'])){
			        
			// La configuración del Archivo 2, debe ser diferente del archivo 1
			// si configuras como el Archivo 1 no hará nada
			$config2['upload_path'] = './assets/imgs/filosofia';
			$config2['allowed_types'] = 'gif|jpg|png';
			//$config['max_size'] = '100';
			//$config['max_width']  = '1024';
			//$config['max_height']  = '768';
			$config2['encrypt_name'] = true;

			// Cargamos la nueva configuración
			$this->upload->initialize($config2);

			// Subimos el segundo Archivo
			if ($this->upload->do_upload('file2')){
			            
			    $ima2 = $this->upload->data();
			    $file_name2 = $ima2['file_name'];
			    $data[2] = $file_name2;

			}else{	            
			   $error['error'] = $error['error'].$this->upload->display_errors();
			}
		}

		if(empty($error['error'])){

			if($this->Slides->editar($data)){
	
					$respuesta["valido"] = true;
					$respuesta["mensaje"] = "Slides editados correctamente";
							
				}else{
						
					$respuesta['valido'] = false;
					$respuesta['mensaje'] = 'No se pudo editar slides.';
				}
		}else{
			$respuesta['valido'] = false;
			$respuesta['mensaje'] = $error['error'];
			
		}

		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($respuesta);
	}

}

/* End of file Empresa.php */
/* Location: ./application/controllers/Empresa.php */