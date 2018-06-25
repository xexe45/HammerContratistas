<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Mreporte');
	}

	public function index()
	{
		$this->load->view('administracion/header');
		$this->load->view('administracion/reportes');
	}

	public function registros(){
		$data = [];

		$registros = $this->Mreporte->registros();
		$ediciones = $this->Mreporte->ediciones();

		$total = $registros->y + $ediciones->y;

		$registros->y = round($registros->y * 100 / $total);
		$ediciones->y = round($ediciones->y * 100 / $total);
		
		array_push($data,$registros);
		array_push($data,$ediciones);
		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($data);

	}

	public function iteracciones(){
		$anio = date('Y');
	
		$iteracciones = $this->Mreporte->iteracciones($anio);

		foreach ($iteracciones as $iteraccion) {
			$iteraccion->label = self::meses(intval($iteraccion->label) - 1);
			$iteraccion->y = intval($iteraccion->y);
		}

		header('Content-Type: application/x-json; charset:utf-8');
		echo json_encode($iteracciones);

	}

	private function meses($mes){
		$meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto',
		'Septiembre','Octubre','Noviembre','Diciembre'];

		return $meses[$mes];
	}

}

/* End of file Reportes.php */
/* Location: ./application/controllers/Reportes.php */