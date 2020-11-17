<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteCitaMedica extends CI_Controller {
	public function __construct(){
		parent::__construct();
	    $this->load->model("ReporteCitaMedica_model");
	}

	function index(){
		$this->cargarVistaDatos();
	}
	
	public function DetalleReporteCitaMedica(){
		$num_exp = $this->input->post("num_exp");

		$resultado = $this->ReporteCitaMedica_model->DetalleReporteCitaMedica($num_exp);
		echo json_encode($resultado);
	}

	private function cargarVistaDatos(){
		$session_data = $this->session->userdata('logged_in');
		$menu_session = $this->session->userdata('arreglo_menu');

		$data_menu = array(
			'menu' => $menu_session
		);
		
		$data = array(
			'lista_reporteCitaMedica_Existente' => $this->ReporteCitaMedica_model->ReporteCitaMedicaExistente(),
			'reporte_html' => $this->load->view('reports/reporte_citaMedica', NULL, TRUE)
		);
		log_message("debug", "**** ReporteCitaMedica - cargarVistaDatos - ". $data['reporte_html'] );
		
		$data_header = array(
			'titulo' => 'Reporte de Control de Citas Médicas',
			'usuario_id' => $session_data['usu_id'],
			'usuario_nombre' => $session_data['usu_username'],
			'menu' =>$this->load->view('menu_aside_view', $data_menu, TRUE)
		);

		$this->load->view('header_view', $data_header);		
		$this->load->view('reporte_CitaMedica_view', $data);		
		$this->load->view('footer_view');
	}
}