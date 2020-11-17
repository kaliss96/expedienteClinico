<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteEmbarazo extends CI_Controller {
	public function __construct(){
		parent::__construct();
	    $this->load->model("ReporteEmbarazo_model");
	}

	function index(){
		$this->cargarVistaDatos();
	}
	
	public function DetalleEmbarazo(){
		$num_exp = $this->input->post("num_exp");

		$resultado = $this->ReporteEmbarazo_model->DetalleEmbarazo($num_exp);
		echo json_encode($resultado);
	}

	private function cargarVistaDatos(){
		$session_data = $this->session->userdata('logged_in');
		$menu_session = $this->session->userdata('arreglo_menu');

		$data_menu = array(
			'menu' => $menu_session
		);
		
		$data = array(
			'lista_reporteEmbarazoExistente' => $this->ReporteEmbarazo_model->EmbarazoExistente(),
			'reporte_html' => $this->load->view('reports/reporte_embarazo', NULL, TRUE)
		);
		log_message("debug", "**** ReporteEmbarazo - cargarVistaDatos - ". $data['reporte_html'] );
		
		$data_header = array(
			'titulo' => 'Reporte de Embarazo',
			'usuario_id' => $session_data['usu_id'],
			'usuario_nombre' => $session_data['usu_username'],
			'menu' =>$this->load->view('menu_aside_view', $data_menu, TRUE)
		);

		$this->load->view('header_view', $data_header);		
		$this->load->view('reporte_embarazo_view', $data);		
		$this->load->view('footer_view');
	}
}