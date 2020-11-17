<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoConsulta extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model("TipoConsulta_model");
	    $this->load->model("Paciente_model");
	    $this->load->model('PerfilUsuario_model');
	}

	function index(){
		$this->cargarVistaDatos();
	}

	public function registrar_TipoConsulta(){
		
		log_message('debug', '**** TipoConsulta - registro -> '. $this->input->post('TipoConsulta'));	

		$this->form_validation->set_rules('slc_num_exp','Numero Expediente','trim|required');
		$this->form_validation->set_rules('especialidad_consulta','Especialidad Consulta','trim|required');			


		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datosTipoConsulta = array(
				'id_paciente' => $this->input->post('slc_num_exp'),
				'especialidad_consulta' => $this->input->post('especialidad_consulta')
			);

			$resultado = $this->TipoConsulta_model->crearTipoConsulta($datosTipoConsulta);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('TipoConsulta');
		}		
	}

	public function actualizar(){
		$this->form_validation->set_rules('txtTipoConsultaId','','trim|required');
		$this->form_validation->set_rules('especialidad_consulta','Especialidad Consulta','trim|required');	

		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datosTipoConsulta = array(
				'id' => $this->input->post('txtTipoConsultaId'),
				'especialidad_consulta' => $this->input->post('especialidad_consulta')
			);

			$resultado = $this->TipoConsulta_model->actualizar($datosTipoConsulta);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('TipoConsulta');
		}
	}

	public function cambiarEstado(){
		$this->form_validation->set_rules('estado_TipoConsulta_id','','required|trim');
		$this->form_validation->set_rules('cambio_estado','','required|trim');

		log_message('debug', "**** TipoConsulta_model - cambiarEstado - estado_TipoConsulta_id -> ". $this->input->post('estado_TipoConsulta_id'));
		log_message('debug', "**** TipoConsulta_model - cambiarEstado - cambio_estado -> ". $this->input->post('cambio_estado'));

		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		}
		else{
			$resultado = $this->TipoConsulta_model->cambiarEstado(
				(int) $this->input->post('estado_TipoConsulta_id'), 
				(int) $this->input->post('cambio_estado')
			);

			if ($resultado) {
				$this->session->set_flashdata('success', 'Cambios Realizados.');
			}
			else {
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('TipoConsulta');
		}
	}

	private function cargarVistaDatos(){
		$session_data = $this->session->userdata('logged_in');
		$menu_session = $this->session->userdata('arreglo_menu');

		$data_menu = array(
			'menu' => $menu_session
		);

		//****************************
		$perfilOpciones = $this->PerfilUsuario_model->PerfilOpciones($session_data['perfil'],'TipoConsulta');		
		
		log_message('error',"Opciones usuario opc: ".json_encode($perfilOpciones));		
		//****************************
				
		$data = array(
			'lista_tipoConsulta' => $this->TipoConsulta_model->TipoConsultaExistente(),
			'lista_Paciente' => $this->Paciente_model->PacientesActivos(),
			'prfm_lectura' => $perfilOpciones[0]->prfm_lectura,
			'prfm_inserta' => $perfilOpciones[0]->prfm_inserta,
			'prfm_actualiza' => $perfilOpciones[0]->prfm_actualiza,
			'prfm_elimina' => $perfilOpciones[0]->prfm_elimina			
		);
		
		$data_header = array(
			'titulo' => 'Tipo de Consulta de los Pacientes',
			'usuario_id' => $session_data['usu_id'],
			'usuario_nombre' => $session_data['usu_username'],
			'menu' =>$this->load->view('menu_aside_view', $data_menu, TRUE)
		);

		$this->load->view('header_view', $data_header);		
		$this->load->view('tipoConsulta_view', $data);		
		$this->load->view('footer_view');
	}
}