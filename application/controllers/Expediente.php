<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expediente extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model("Expediente_model");
	    $this->load->model("Paciente_model");
	    $this->load->model('PerfilUsuario_model');
	    $this->load->model("ReporteConsulta_model");
	}

	function index(){
		$this->cargarVistaDatos();
	}

	public function registrar_Expediente(){
		
		log_message('debug', '**** Expediente - registro -> '. $this->input->post('Expediente'));	

		$this->form_validation->set_rules('slc_num_exp','Numero ','trim|required');
		$this->form_validation->set_rules('pulso','Pulso','trim|required');
		$this->form_validation->set_rules('tension_arterial','Tensión','trim|required');
		$this->form_validation->set_rules('frecuencia_cardiaca','Frecuencia Cardiaca','trim|required');
		$this->form_validation->set_rules('frecuencia_reumatoide','Frecuencia Reumatoide','trim|required');
		$this->form_validation->set_rules('estatura','Estatura','trim|required');
		$this->form_validation->set_rules('peso','Peso','trim|required');			


		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datosExpediente = array(
				'id_paciente' => $this->input->post('slc_num_exp'),
				'pulso' => $this->input->post('pulso'),
				'tension_arterial' => $this->input->post('tension_arterial'),
				'frecuencia_cardiaca' => $this->input->post('frecuencia_cardiaca'),
				'frecuencia_reumatoide' => $this->input->post('frecuencia_reumatoide'),
				'estatura' => $this->input->post('estatura'),
				'peso' => $this->input->post('peso')

			);

			$resultado = $this->Expediente_model->crearExpediente($datosExpediente);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Expediente');
		}		
	}

	public function actualizar(){
		$this->form_validation->set_rules('txtExpedienteId','','trim|required');
		$this->form_validation->set_rules('pulso','Pulso','trim|required');
		$this->form_validation->set_rules('tension_arterial','Tension','trim|required');
		$this->form_validation->set_rules('frecuencia_cardiaca','Frecuencia Cardiaca','trim|required');
		$this->form_validation->set_rules('frecuencia_reumatoide','Frecuencia Reumatoide','trim|required');
		$this->form_validation->set_rules('estatura','Estatura','trim|required');
		$this->form_validation->set_rules('peso','Peso','trim|required');

		$this->form_validation->set_rules('sintomas','sintomas','trim|required');
		$this->form_validation->set_rules('enfermedad','enfermedad','trim|required');
		$this->form_validation->set_rules('detalle_enfermedad','detalle_enfermedad','trim|required');
		$this->form_validation->set_rules('tratamiento','tratamiento','trim|required');

		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datosExpediente = array(
				'id' => $this->input->post('txtExpedienteId'),
				'pulso' => $this->input->post('pulso'),
				'tension_arterial' => $this->input->post('tension_arterial'),
				'frecuencia_cardiaca' => $this->input->post('frecuencia_cardiaca'),
				'frecuencia_reumatoide' => $this->input->post('frecuencia_reumatoide'),
				'estatura' => $this->input->post('estatura'),
				'peso' => $this->input->post('peso'),
				'sintomas' => $this->input->post('sintomas'),
				'enfermedad' => $this->input->post('enfermedad'),
				'evolucion' => $this->input->post('evolucion'),
				'detalle_enfermedad' => $this->input->post('detalle_enfermedad'),
				'tratamiento' => $this->input->post('tratamiento'),
				'orden_examen' => $this->input->post('orden_examen'),
				'detalle_orden' => $this->input->post('detalle_orden')
			);

			$resultado = $this->Expediente_model->actualizar($datosExpediente);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Expediente');
		}
	}

	public function cambiarEstado(){
		$this->form_validation->set_rules('estado_expediente_id','','required|trim');
		$this->form_validation->set_rules('cambio_estado','','required|trim');

		log_message('debug', "**** Expediente_model - cambiarEstado - estado_expediente_id -> ". $this->input->post('estado_expediente_id'));
		log_message('debug', "**** Expediente_model - cambiarEstado - cambio_estado -> ". $this->input->post('cambio_estado'));

		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		}
		else{
			$resultado = $this->Expediente_model->cambiarEstado(
				(int) $this->input->post('estado_expediente_id'), 
				(int) $this->input->post('cambio_estado')
			);

			if ($resultado) {
				$this->session->set_flashdata('success', 'Cambio realizado.');
			}
			else {
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Expediente');
		}
	}	

	private function cargarVistaDatos(){
		$session_data = $this->session->userdata('logged_in');
		$menu_session = $this->session->userdata('arreglo_menu');

		$data_menu = array(
			'menu' => $menu_session
		);

		//****************************
		$perfilOpciones = $this->PerfilUsuario_model->PerfilOpciones($session_data['perfil'],'Expediente');		
		
		log_message('error',"Opciones usuario opc: ".json_encode($perfilOpciones));		
		//****************************		
		
		$data = array(
			'lista_expediente' => $this->Expediente_model->ExpedienteExistente(),
			'lista_Paciente' => $this->Paciente_model->PacientesActivos(),
			'lista_reporteConsulta_Existente' => $this->ReporteConsulta_model->ReporteConsultaExistente(),
			'reporte_html' => $this->load->view('reports/reporte_consulta', NULL, TRUE),
			'prfm_lectura' => $perfilOpciones[0]->prfm_lectura,
			'prfm_inserta' => $perfilOpciones[0]->prfm_inserta,
			'prfm_actualiza' => $perfilOpciones[0]->prfm_actualiza,
			'prfm_elimina' => $perfilOpciones[0]->prfm_elimina			
		);
		log_message("debug", "**** ReporteConsulta - cargarVistaDatos - ". $data['reporte_html'] );

		$data_header = array(
			'titulo' => 'Consultas',
			'usuario_id' => $session_data['usu_id'],
			'usuario_nombre' => $session_data['usu_username'],
			'menu' =>$this->load->view('menu_aside_view', $data_menu, TRUE)
		);

		$this->load->view('header_view', $data_header);		
		$this->load->view('expediente_view', $data);		
		$this->load->view('footer_view');
	}
}