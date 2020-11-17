<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicamentos extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model("Medicamentos_model");
	    $this->load->model('PerfilUsuario_model');
	}

	function index(){
		$this->cargarVistaDatos();
	}

	public function cambiarEstadoMedicamento(){
			$this->form_validation->set_rules('estado_medicamento_id','','required|trim');
			$this->form_validation->set_rules('cambio_estado','','required|trim');

			log_message('debug', "**** Medicamento_model - cambiarEstadoMedicamento - estado_medicamento_id -> ". $this->input->post('estado_medicamento_id'));
			log_message('debug', "**** Medicamento_model - cambiarEstadoMedicamento - cambio_estado -> ". $this->input->post('cambio_estado'));

			if(! $this->form_validation->run()){
				$this->cargarVistaDatos();
			}
			else{
				$resultado = $this->Medicamentos_model->cambiarEstadoMedicamento(
					(int) $this->input->post('estado_medicamento_id'), 
					(int) $this->input->post('cambio_estado')
				);

				if ($resultado) {
					$this->session->set_flashdata('success', 'Cambio realizado.');
				}
				else {
					$this->session->set_flashdata('error', 'Error!');
				}
				redirect('Medicamento');
			}
		}

	private function cargarVistaDatos(){
		$session_data = $this->session->userdata('logged_in');
		$menu_session = $this->session->userdata('arreglo_menu');

		$data_menu = array(
			'menu' => $menu_session
		);

		//****************************
		$perfilOpciones = $this->PerfilUsuario_model->PerfilOpciones($session_data['perfil'],'Medicamento');		
		
		log_message('error',"Opciones usuario opc: ".json_encode($perfilOpciones));		
		//****************************		
		
		$data = array(
			'lista_Medicamento' => $this->Medicamentos_model->MedicamentoExistente(),
			'lista_medicamentos' => $this->Medicamentos_model->MedicamentosActivos(),
			'prfm_lectura' => $perfilOpciones[0]->prfm_lectura,
			'prfm_inserta' => $perfilOpciones[0]->prfm_inserta,
			'prfm_actualiza' => $perfilOpciones[0]->prfm_actualiza,
			'prfm_elimina' => $perfilOpciones[0]->prfm_elimina	
		);

		$data_header = array(
			'titulo' => 'Medicamentos',
			'usuario_id' => $session_data['usu_id'],
			'usuario_nombre' => $session_data['usu_username'],
			'menu' =>$this->load->view('menu_aside_view', $data_menu, TRUE)
		);

		$this->load->view('header_view', $data_header);		
		$this->load->view('medicamentos_view', $data);		
		$this->load->view('footer_view');
	}
}