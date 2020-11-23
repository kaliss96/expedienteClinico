<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteFactura extends CI_Controller {
	public function __construct(){
		parent::__construct();
	    $this->load->model('ReporteFacturas_model');
	}

	function index(){
		$this->cargarVistaDatos();
	}
	
	public function DetalleReporteFactura(){
		$num_fac = $this->input->post("num_fac");

		$resultado = $this->ReporteFacturas_model->DetalleReporteFactura($num_fac);
		echo json_encode($resultado);
	}

	private function cargarVistaDatos(){
		$session_data = $this->session->userdata('logged_in');
		$menu_session = $this->session->userdata('arreglo_menu');

		$data_menu = array(
			'menu' => $menu_session
		);

		$data = array(
			'lista_reportefactura_Existente' => $this->ReporteFacturas_model->ReporteFacturasExistente(),
			'reporte_html' => $this->load->view('reports/reporte_factura', NULL, TRUE)
		);
		log_message("debug", "**** ReporteConsulta - cargarVistaDatos - ". $data['reporte_html'] );
		
		$data_header = array(
			'titulo' => 'Reporte de Facturas',
			'usuario_id' => $session_data['usu_id'],
			'usuario_nombre' => $session_data['usu_username'],
			'menu' =>$this->load->view('menu_aside_view', $data_menu, TRUE)
		);

		$this->load->view('header_view', $data_header);		
		$this->load->view('reporte_reporteFactura_view', $data);		
		$this->load->view('footer_view');
	}
}