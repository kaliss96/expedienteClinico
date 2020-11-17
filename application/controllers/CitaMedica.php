<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CitaMedica extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model("Citasmedicas_model");
	    $this->load->model("Paciente_model");
	    $this->load->model('TipoPersonal_model');
	    $this->load->model('PerfilUsuario_model');
	}

	function index(){
		$this->cargarVistaDatos();
	}

	public function registrar_CitaMedica(){
		
		log_message('debug', '**** CitaMedica - registro -> '. $this->input->post('CitaMedica'));	

		$this->form_validation->set_rules('slc_num_exp','Numero Expediente','trim|required');
		$this->form_validation->set_rules('slc_especialista','Especialista','trim|required');
		$this->form_validation->set_rules('fecha_cita_medica','fecha de cita medica','trim|required');
		$this->form_validation->set_rules('hora','Hora','trim|required');
		
		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datosCita = array(
				'id_paciente' => $this->input->post('slc_num_exp'),
				'id_tipo' => $this->input->post('slc_especialista'),
				'fecha_cita_medica' => $this->input->post('fecha_cita_medica'),
				'hora' => $this->input->post('hora'),
				'descripcion' => $this->input->post('descripcion')

			);

			$resultado = $this->Citasmedicas_model->crearCitasMedicas($datosCita);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('CitaMedica');
		}		
	}

	public function actualizar(){
		$this->form_validation->set_rules('txtCitaMedicaId','','trim|required');
		$this->form_validation->set_rules('fecha_cita_medica','fecha de cita medica','trim|required');
		$this->form_validation->set_rules('hora','Hora','trim|required');

		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datosCita = array(
				'id' => $this->input->post('txtCitaMedicaId'),
				'fecha_cita_medica' => $this->input->post('fecha_cita_medica'),
				'id_tipo' => $this->input->post('slc_especialista'),
				'hora' => $this->input->post('hora'),
				'descripcion' => $this->input->post('descripcion')
			);

			$resultado = $this->Citasmedicas_model->actualizar($datosCita);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('CitaMedica');
		}
	}

	public function cambiarEstado(){
			$this->form_validation->set_rules('estado_citamedica_id','','required|trim');
			$this->form_validation->set_rules('cambio_estado','','required|trim');

			log_message('debug', "**** Citasmedicas_model - cambiarEstado - estado_citamedica_id -> ". $this->input->post('estado_citamedica_id'));
			log_message('debug', "**** Citasmedicas_model - cambiarEstado - cambio_estado -> ". $this->input->post('cambio_estado'));

			if(! $this->form_validation->run()){
				$this->cargarVistaDatos();
			}
			else{
				$resultado = $this->Citasmedicas_model->cambiarEstado(
					(int) $this->input->post('estado_citamedica_id'), 
					(int) $this->input->post('cambio_estado')
				);

				if ($resultado) {
					$this->session->set_flashdata('success', 'Cambio realizado.');
				}
				else {
					$this->session->set_flashdata('error', 'Error!');
				}
				redirect('CitaMedica');
			}
		}

	private function cargarVistaDatos(){
		$session_data = $this->session->userdata('logged_in');
		$menu_session = $this->session->userdata('arreglo_menu');

		$data_menu = array(
			'menu' => $menu_session
		);

		//****************************
		$perfilOpciones = $this->PerfilUsuario_model->PerfilOpciones($session_data['perfil'],'CitaMedica');		
		
		log_message('error',"Opciones usuario opc: ".json_encode($perfilOpciones));		
		//****************************

		$data = array(
			'lista_citasMedicas' => $this->Citasmedicas_model->CitasMedicasExistentes(),
			'lista_Paciente' => $this->Paciente_model->PacientesActivos(),
			'lista_TipoPersonal' => $this->TipoPersonal_model->TipoPersonalActivos(),
			'prfm_lectura' => $perfilOpciones[0]->prfm_lectura,
			'prfm_inserta' => $perfilOpciones[0]->prfm_inserta,
			'prfm_actualiza' => $perfilOpciones[0]->prfm_actualiza,
			'prfm_elimina' => $perfilOpciones[0]->prfm_elimina			
		);
		
		$data_header = array(
			'titulo' => 'Citas Medicas',
			'usuario_id' => $session_data['usu_id'],
			'usuario_nombre' => $session_data['usu_username'],
			'menu' =>$this->load->view('menu_aside_view', $data_menu, TRUE)
		);

		$this->load->view('header_view', $data_header);		
		$this->load->view('citasMedicas_view', $data);		
		$this->load->view('footer_view');
	}
}