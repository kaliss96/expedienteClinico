<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class DetalleFactura extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model("DetalleFactura_model");
	    $this->load->model("Paciente_model");
	    $this->load->model("TipoConsulta_model");
	    $this->load->model('PerfilUsuario_model');
	    $this->load->model("ReporteFacturas_model");
	}

	function index(){
		$this->cargarVistaDatos();
	}

	public function registrar_DetalleFactura(){
		
		log_message('debug', '**** DetalleFactura - registro -> '. $this->input->post('DetalleFactura'));	

		$this->form_validation->set_rules('slc_num_exp','Número Expediente','trim|required');
		$this->form_validation->set_rules('slc_tip_cst','Típo Consulta','trim|required');
		$this->form_validation->set_rules('contado','Contado','trim|required');
		$this->form_validation->set_rules('precio_consulta','Precio','trim|required');


		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datosDetalleFactura = array(
				'id_paciente' => $this->input->post('slc_num_exp'),
				'id_tipo_consulta' => $this->input->post('slc_tip_cst'),
				'contado' => $this->input->post('contado'),
				'precio_consulta' => $this->input->post('precio_consulta')

			);

			$resultado = $this->DetalleFactura_model->crearDetalleFactura($datosDetalleFactura);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambios Realizados!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('DetalleFactura');
		}		
	}

	public function actualizar(){
		$this->form_validation->set_rules('txtDetallefacturaId','','trim|required');
		$this->form_validation->set_rules('slc_tip_cst','Típo Consulta','trim|required');
		$this->form_validation->set_rules('contado','Contado','trim|required');
		$this->form_validation->set_rules('precio_consulta','Precio','trim|required');

		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datosDetalleFactura = array(
				'id' => $this->input->post('txtDetallefacturaId'),
				'id_tipo_consulta' => $this->input->post('slc_tip_cst'),
				'contado' => $this->input->post('contado'),
				'precio_consulta' => $this->input->post('precio_consulta')
			);

			$resultado = $this->DetalleFactura_model->actualizar($datosDetalleFactura);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('DetalleFactura');
		}
	}
	/*
	public function CancelarDetalle(){
		$this->form_validation->set_rules('estado_detalle_id','','required|trim');

		log_message('debug', "**** DetalleFactura_model - CancelarDetalle - estado_detalle_id -> ". $this->input->post('estado_detalle_id'));
		
		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		}
		else{
			$resultado = $this->DetalleFactura_model->CancelarDetalle(
				(int) $this->input->post('estado_detalle_id')
			);

			if ($resultado) {
				$this->session->set_flashdata('success', 'Estado Modificado.');
			}
			else {
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('DetalleFactura');
		}
	}*/

	public function otorgarDetalleFactura(){
		$this->form_validation->set_rules('detallefactura_id','','required|trim');
		$this->form_validation->set_rules('autorizar_estado','','required|trim');

		log_message('debug', "**** DetalleFactura_model - otorgarDetalleFactura - detallefactura_id -> ". $this->input->post('detallefactura_id'));
		log_message('debug', "**** DetalleFactura_model - otorgarDetalleFactura - autorizar_estado -> ". $this->input->post('autorizar_estado'));

		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		}
		else{

		$resultado = $this->DetalleFactura_model->otorgarDetalleFactura(
			(int) $this->input->post('detallefactura_id'), 
			(int) $this->input->post('autorizar_estado')
		);
		
		if ($resultado) {
			$this->session->set_flashdata('success', 'Cambio realizado.');
		}
		else {
			$this->session->set_flashdata('error', 'Error!');
		}
		redirect('DetalleFactura');
		}
	}

	private function cargarVistaDatos(){
		$session_data = $this->session->userdata('logged_in');
		$menu_session = $this->session->userdata('arreglo_menu');

		$data_menu = array(
			'menu' => $menu_session
		);

		//****************************
		$perfilOpciones = $this->PerfilUsuario_model->PerfilOpciones($session_data['perfil'],'DetalleFactura');		
		
		log_message('error',"Opciones usuario opc: ".json_encode($perfilOpciones));		
		//****************************
				
		$data = array(
			'lista_detalleFactura' => $this->DetalleFactura_model->DetalleFacturaExistente(),
			'lista_Paciente' => $this->Paciente_model->PacientesActivos(),
			'lista_tiposConsultas' => $this->TipoConsulta_model->TipoConsultaActiva(),
			'lista_reportefactura_Existente' => $this->ReporteFacturas_model->ReporteFacturasExistente(),
			'reporte_html' => $this->load->view('reports/reporte_factura', NULL, TRUE),
			'prfm_lectura' => $perfilOpciones[0]->prfm_lectura,
			'prfm_inserta' => $perfilOpciones[0]->prfm_inserta,
			'prfm_actualiza' => $perfilOpciones[0]->prfm_actualiza,
			'prfm_elimina' => $perfilOpciones[0]->prfm_elimina			
		);
		
		$data_header = array(
			'titulo' => 'Detalle de la Factura',
			'usuario_id' => $session_data['usu_id'],
			'usuario_nombre' => $session_data['usu_username'],
			'menu' =>$this->load->view('menu_aside_view', $data_menu, TRUE)
		);

		$this->load->view('header_view', $data_header);		
		$this->load->view('detalle_factura_view', $data);		
		$this->load->view('footer_view');
	}
}