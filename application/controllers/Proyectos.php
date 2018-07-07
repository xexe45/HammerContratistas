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
		$this->load->model('Servicios');
	}

	public function index()
	{
		
		$proyectos['data'] = $this->Proyecto->listarProyectos();
		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($proyectos);
	}

	public function servicios()
	{
		
		$servicios['data'] = $this->Servicios->listar();
		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($servicios);
		
	}

	public function miGaleria($slug)
	{
		
		$proyectos['data'] = $this->Proyecto->listarGaleriaSlug($slug);
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

					$data = array($servicio_id,$user_id, $nombre, $slug, $tipo,$cliente_id, $fecha ,$file_name ,$descripcion);	
					
					if($this->Proyecto->insert($data)){
		
						$respuesta["valido"] = true;
						$respuesta["mensaje"] = "Proyecto agregado correctamente";

							
					}else{
						
						$respuesta['valido'] = false;
						$respuesta['mensaje'] = 'No se pudo registrar el Proyecto, vuelva a intentarlos porfavor.';
					}
					
				}
			}else{

				$data = array($servicio_id,$user_id, $nombre,$slug, $tipo,$cliente_id, $fecha,null ,$descripcion);	
		
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

	public function galeria($slug){
		$this->load->view('administracion/header');
		$uri = $this->uri->segment(3);
		$this->load->view('administracion/galeria',compact('uri'));
	}

	public function fotos($slug=null)
    {
		
        if(!$slug){return;}
		$proyecto=$this->Proyecto->listarProyectosSlug($slug);
		
		$user_id = $this->session->userdata('id');

		if(!isset($proyecto)){return;}
			if(!empty($_FILES['file']['name'][0])){
				
				$total=sizeof($_FILES['file']['name']);
				$contador=0;
				$respuesta = array();
				for($i=0;$i<$total;$i++)
				{
				   switch($_FILES['file']['type'][$i])
				   {
					   case 'image/jpeg':
						   //insertamos el registro con la foto vacía
						   $data = array($proyecto->v1,$user_id,$proyecto->v2,'');
						   
						   $valor=$this->Proyecto->insertGallery($data);
						   //subimos la foto
						   $picture='foto_'.$proyecto->v1.'_'.$valor.'.jpg';
						   copy($_FILES['file']['tmp_name'][$i],"assets/imgs/galeria/".$picture);
						   //actualizamos el registro con el nombre de la foto
						   $data1=array($valor,$picture);
						   $v = $this->Proyecto->updateGallery($data1);
						   $respuesta[]  = "Imagen ".$contador." agregada";
						   
					   break;
					   case 'image/png':
						   //insertamos el registro con la foto vacía
						   $data = array($proyecto->v1,$user_id,$proyecto->v2,'');
						   $valor=$this->Proyecto->insertGallery($data);
						   //subimos la foto
						   $picture='foto_'.$proyecto->v1.'_'.$valor.'.png';
						   copy($_FILES['file']['tmp_name'][$i],"assets/imgs/galeria/".$picture);
						   //actualizamos el registro con el nombre de la foto
						   $data1=array($valor,$picture);
						   $v = $this->Proyecto->updateGallery($data1);
						   $respuesta[]  = "Imagen ".$contador." agregada";
					   break;
					   default:
					   	$respuesta[]  = "Archivo ".$contador." no es imagen";
					   break;
				   }
				$contador++;
				}
			   
			   header('Content-Type: application/x-json; charset:utf-8');
			   echo json_encode($respuesta);
			}
            
             
        
        
    }

}

/* End of file Proyectos.php */
/* Location: ./application/controllers/Proyectos.php */