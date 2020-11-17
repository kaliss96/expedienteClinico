<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteConsulta extends CI_Controller {
	public function __construct(){
		parent::__construct();
	    $this->load->model("ReporteConsulta_model");
	}

	function index(){
		$this->cargarVistaDatos();
	}
	
	public function DetalleReporteConsulta(){
		$num_exp = $this->input->post("num_exp");

		$resultado = $this->ReporteConsulta_model->DetalleReporteConsulta($num_exp);
		echo json_encode($resultado);
	}

	private function cargarVistaDatos(){
		$session_data = $this->session->userdata('logged_in');
		$menu_session = $this->session->userdata('arreglo_menu');

		$data_menu = array(
			'menu' => $menu_session
		);
		
		$data = array(
			'lista_reporteConsulta_Existente' => $this->ReporteConsulta_model->ReporteConsultaExistente(),
			'reporte_html' => $this->load->view('reports/reporte_consulta', NULL, TRUE)
		);
		log_message("debug", "**** ReporteConsulta - cargarVistaDatos - ". $data['reporte_html'] );
		
		$data_header = array(
			'titulo' => 'Reporte de Consultas Médicas',
			'usuario_id' => $session_data['usu_id'],
			'usuario_nombre' => $session_data['usu_username'],
			'menu' =>$this->load->view('menu_aside_view', $data_menu, TRUE)
		);

		$this->load->view('header_view', $data_header);		
		$this->load->view('reporte_consulta_view', $data);		
		$this->load->view('footer_view');
	}
}