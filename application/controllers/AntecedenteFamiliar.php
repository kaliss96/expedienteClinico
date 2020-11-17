<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AntecedenteFamiliar extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model("AntecedenteFamiliar_model");
	    $this->load->model("Paciente_model");
	    $this->load->model('PerfilUsuario_model');
	}

	function index(){
		$this->cargarVistaDatos();
	}

	public function registrar_AntecedenteFamiliar(){
		
		log_message('debug', '**** AntecedenteFamiliar - registro -> '. $this->input->post('AntecedenteFamiliar'));	

		$this->form_validation->set_rules('slc_num_exp','Numero Expediente','trim|required');
		$this->form_validation->set_rules('familiar','Familiar','trim|required|alpha');
		$this->form_validation->set_rules('padecimiento','Padecimiento','trim|required');
		
		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datosAntecedente = array(
				'id_paciente' => $this->input->post('slc_num_exp'),
				'familiar' => $this->input->post('familiar'),
				'padecimiento' => $this->input->post('padecimiento')

			);

			$resultado = $this->AntecedenteFamiliar_model->crearAntecedenteFamiliar($datosAntecedente);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('AntecedenteFamiliar');
		}		
	}

	public function actualizar(){
	$this->form_validation->set_rules('txtAntecedenteFamiliarId','','trim|required');
	$this->form_validation->set_rules('familiar','Familiar','trim|required|alpha');
	$this->form_validation->set_rules('padecimiento','Padecimiento','trim|required');

	if(! $this->form_validation->run()){
		$this->cargarVistaDatos();
	} 
	else{			
		$datosAntecedente = array(
			'id' => $this->input->post('txtAntecedenteFamiliarId'),
			'familiar' => $this->input->post('familiar'),
			'padecimiento' => $this->input->post('padecimiento')
		);

		$resultado = $this->AntecedenteFamiliar_model->actualizar($datosAntecedente);
		if ($resultado) {				
			$this->session->set_flashdata('success', 'Cambio Realizado!');
		}				
		else {								
			$this->session->set_flashdata('error', 'Error!');
		}
		redirect('AntecedenteFamiliar');
	}
}

	public function cambiarEstado(){
			$this->form_validation->set_rules('estado_antecedenteFamiliar_id','','required|trim');
			$this->form_validation->set_rules('cambio_estado','','required|trim');

			log_message('debug', "**** AntecedenteFamiliar_model - cambiarEstado - estado_antecedenteFamiliar_id -> ". $this->input->post('estado_antecedenteFamiliar_id'));
			log_message('debug', "**** AntecedenteFamiliar_model - cambiarEstado - cambio_estado -> ". $this->input->post('cambio_estado'));

			if(! $this->form_validation->run()){
				$this->cargarVistaDatos();
			}
			else{
				$resultado = $this->AntecedenteFamiliar_model->cambiarEstado(
					(int) $this->input->post('estado_antecedenteFamiliar_id'), 
					(int) $this->input->post('cambio_estado')
				);

				if ($resultado) {
					$this->session->set_flashdata('success', 'Cambio realizado.');
				}
				else {
					$this->session->set_flashdata('error', 'Error!');
				}
				redirect('AntecedenteFamiliar');
			}
		}

	private function cargarVistaDatos(){
		$session_data = $this->session->userdata('logged_in');
		$menu_session = $this->session->userdata('arreglo_menu');

		$data_menu = array(
			'menu' => $menu_session
		);

		//****************************
		$perfilOpciones = $this->PerfilUsuario_model->PerfilOpciones($session_data['perfil'],'AntecedenteFamiliar');		
		
		log_message('error',"Opciones usuario opc: ".json_encode($perfilOpciones));		
		//****************************
		
		$data = array(
			'lista_antecedenteFamiliar' => $this->AntecedenteFamiliar_model->AntecedenteFamiliarExistente(),
			'lista_Paciente' => $this->Paciente_model->PacientesActivos(),
			'prfm_lectura' => $perfilOpciones[0]->prfm_lectura,
			'prfm_inserta' => $perfilOpciones[0]->prfm_inserta,
			'prfm_actualiza' => $perfilOpciones[0]->prfm_actualiza,
			'prfm_elimina' => $perfilOpciones[0]->prfm_elimina			
		);
		
		$data_header = array(
			'titulo' => 'Antecedentes Familiares',
			'usuario_id' => $session_data['usu_id'],
			'usuario_nombre' => $session_data['usu_username'],
			'menu' =>$this->load->view('menu_aside_view', $data_menu, TRUE)
		);

		$this->load->view('header_view', $data_header);		
		$this->load->view('antecedenteFamiliar_view', $data);		
		$this->load->view('footer_view');
	}
}