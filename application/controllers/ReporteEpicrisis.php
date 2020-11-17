<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteEpicrisis extends CI_Controller {
	public function __construct(){
		parent::__construct();
	    $this->load->model("ReporteEpicrisis_model");
	}

	function index(){
		$this->cargarVistaDatos();
	}
	
	public function DetalleEpicrisis(){
		$num_exp = $this->input->post("num_exp");

		$resultado = $this->ReporteEpicrisis_model->DetalleEpicrisis($num_exp);
		echo json_encode($resultado);
	}

	private function cargarVistaDatos(){
		$session_data = $this->session->userdata('logged_in');
		$menu_session = $this->session->userdata('arreglo_menu');

		$data_menu = array(
			'menu' => $menu_session
		);
		
		$data = array(
			'lista_reporteEpicrisisExistente' => $this->ReporteEpicrisis_model->EpicrisisExistente(),
			'reporte_html' => $this->load->view('reports/reporte_epicrisis', NULL, TRUE)
		);
		log_message("debug", "**** ReporteEpicrisis - cargarVistaDatos - ". $data['reporte_html'] );
		
		$data_header = array(
			'titulo' => 'Reporte de Epicrisis',
			'usuario_id' => $session_data['usu_id'],
			'usuario_nombre' => $session_data['usu_username'],
			'menu' =>$this->load->view('menu_aside_view', $data_menu, TRUE)
		);

		$this->load->view('header_view', $data_header);		
		$this->load->view('reporteEpicrisis_view', $data);		
		$this->load->view('footer_view');
	}
}