<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vacuna extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model("Vacuna_model");
	    $this->load->model("Paciente_model");
	    $this->load->model('PerfilUsuario_model');
	}

	function index(){
		$this->cargarVistaDatos();
	}

	public function registrar_Vacuna(){
		
		log_message('debug', '**** Vacuna - registro -> '. $this->input->post('Vacuna'));	

		$this->form_validation->set_rules('slc_num_exp','Numero Expediente','trim|required');
		$this->form_validation->set_rules('fecha_vacuna','Fecha de 	Vacuna','trim|required');
		$this->form_validation->set_rules('nombre_vacuna','Nombre de la Vacuna','trim|required');
		$this->form_validation->set_rules('notas','Notas','trim|required');
		
		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datosVacuna = array(
				'id_paciente' => $this->input->post('slc_num_exp'),
				'fecha_vacuna' => $this->input->post('fecha_vacuna'),
				'nombre_vacuna' => $this->input->post('nombre_vacuna'),
				'notas' => $this->input->post('notas')
			);

			$resultado = $this->Vacuna_model->crearVacunas($datosVacuna);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambios Realizados!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Vacuna');
		}		
	}

	public function actualizar(){
	$this->form_validation->set_rules('txtVacunaId','','trim|required');
	$this->form_validation->set_rules('fecha_vacuna','Fecha de 	Vacuna','trim|required');
	$this->form_validation->set_rules('nombre_vacuna','Nombre de la Vacuna','trim|required');
	$this->form_validation->set_rules('notas','Notas','trim|required');

	if(! $this->form_validation->run()){
		$this->cargarVistaDatos();
	} 
	else{			
		$datosVacuna = array(
			'id' => $this->input->post('txtVacunaId'),
			'fecha_vacuna' => $this->input->post('fecha_vacuna'),
			'nombre_vacuna' => $this->input->post('nombre_vacuna'),
			'notas' => $this->input->post('notas')
		);

		$resultado = $this->Vacuna_model->actualizar($datosVacuna);
		if ($resultado) {				
			$this->session->set_flashdata('success', 'Cambios Realizados!');
		}				
		else {								
			$this->session->set_flashdata('error', 'Error!');
		}
		redirect('Vacuna');
	}
}

	public function cambiarEstado(){
			$this->form_validation->set_rules('estado_vacuna_id','','required|trim');
			$this->form_validation->set_rules('cambio_estado','','required|trim');

			log_message('debug', "**** Vacuna_model - cambiarEstado - estado_vacuna_id -> ". $this->input->post('estado_vacuna_id'));
			log_message('debug', "**** Vacuna_model - cambiarEstado - cambio_estado -> ". $this->input->post('cambio_estado'));

			if(! $this->form_validation->run()){
				$this->cargarVistaDatos();
			}
			else{
				$resultado = $this->Vacuna_model->cambiarEstado(
					(int) $this->input->post('estado_vacuna_id'), 
					(int) $this->input->post('cambio_estado')
				);

				if ($resultado) {
					$this->session->set_flashdata('success', 'Cambios Realizados.');
				}
				else {
					$this->session->set_flashdata('error', 'Error!');
				}
				redirect('Vacuna');
			}
		}

	private function cargarVistaDatos(){
		$session_data = $this->session->userdata('logged_in');
		$menu_session = $this->session->userdata('arreglo_menu');

		$data_menu = array(
			'menu' => $menu_session
		);

		//****************************
		$perfilOpciones = $this->PerfilUsuario_model->PerfilOpciones($session_data['perfil'],'Vacuna');		
		
		log_message('error',"Opciones usuario opc: ".json_encode($perfilOpciones));		
		//****************************		
		
		$data = array(
			'lista_vacunas' => $this->Vacuna_model->VacunasExistentes(),
			'lista_Paciente' => $this->Paciente_model->PacientesActivos(),
			'prfm_lectura' => $perfilOpciones[0]->prfm_lectura,
			'prfm_inserta' => $perfilOpciones[0]->prfm_inserta,
			'prfm_actualiza' => $perfilOpciones[0]->prfm_actualiza,
			'prfm_elimina' => $perfilOpciones[0]->prfm_elimina		
		);
		
		$data_header = array(
			'titulo' => 'Vacunas',
			'usuario_id' => $session_data['usu_id'],
			'usuario_nombre' => $session_data['usu_username'],
			'menu' =>$this->load->view('menu_aside_view', $data_menu, TRUE)
		);

		$this->load->view('header_view', $data_header);		
		$this->load->view('vacunas_view', $data);		
		$this->load->view('footer_view');
	}
}