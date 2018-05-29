<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Cliente');
	}

	public function index()
	{
		$clientes['data'] = $this->Cliente->listar();
		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($clientes);
	}

	public function store(){
		
		if( !$this->input->is_ajax_request() ){ return; }
		if( !$this->input->post() ){ return; }

		$respuesta = array();

		if($this->form_validation->run('store_customer')){

			$cliente = $this->security->xss_clean(strip_tags($this->input->post('cliente')));
			$web = $this->security->xss_clean(strip_tags($this->input->post('web')));

			if (!empty($_FILES['logo']['name'])){

				//subimos el archivo
				$config['upload_path'] = './assets/imgs/customers'; //ruta donde se copiará
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				//$config['max_size']     = '100';
				//$config['max_width'] = '1024';
				//$config['max_height'] = '768';
				$config['encrypt_name'] = true;

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload('logo')){

					$error = array('error' => $this->upload->display_errors());
					$respuesta['valido'] = false;
					$respuesta['mensaje'] = $error['error'];

				}else{
					
					//obtenemos el nombre del archivo
					$ima = $this->upload->data();

					$file_name = $ima['file_name'];

					$data = array($cliente, $file_name ,$web);	

					if($this->Cliente->insert($data)){
		
						$respuesta["valido"] = true;
						$respuesta["mensaje"] = "Cliente agregado correctamente";

							
					}else{
						
						$respuesta['valido'] = false;
						$respuesta['mensaje'] = 'No se pudo registrar el Cliente, vuelva a intentarlos porfavor.';
					}
					
				}
			}else{

				$data = array($cliente, null ,$web);	

				if($this->Cliente->insert($data)){
	
					$respuesta["valido"] = true;
					$respuesta["mensaje"] = "Cliente agregado correctamente";

							
				}else{
						
					$respuesta['valido'] = false;
					$respuesta['mensaje'] = 'No se pudo registrar el Cliente, vuelva a intentarlos porfavor.';
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

/* End of file Clientes.php */
/* Location: ./application/controllers/Clientes.php */