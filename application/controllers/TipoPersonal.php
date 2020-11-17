<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoPersonal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Especialidad_model');
		$this->load->model('TipoPersonal_model');
		$this->load->model('PerfilUsuario_model');
	}
	public function index()
	{
		$this->cargarVistaDatos();
	}

	public function registrarTipoPersonal(){

		$this->form_validation->set_rules('tipo_personal','Tipo Personal','required|min_length[3]|regex_match[/^[\p{L} ,.]*$/u]|trim');
		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datos_tipoPersonal = array(
				'tipo_personal' => $this->input->post('tipo_personal'),
				'especialidad' => $this->input->post('especialidad')
			);

			$resultado = $this->TipoPersonal_model->registro($datos_tipoPersonal);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambios Realizados!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}				
			redirect('TipoPersonal');
		}
	}

	public function actualizar(){

		//$this->form_validation->set_rules('txtTipoPersonalId','','required');
		$this->form_validation->set_rules('tipo_personal','tipo_personal','required|min_length[3]|regex_match[/^[\p{L} ,.]*$/u]|trim');
		
		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datos_TipoPersonal = array(
				'id' => $this->input->post('txtTipoPersonalId'),
				'tipo_personal' => $this->input->post('tipo_personal'),
				'especialidad' => $this->input->post('especialidad')
			);

			$resultado = $this->TipoPersonal_model->actualizar($datos_TipoPersonal);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambios Realizados!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}				
			redirect('TipoPersonal');
		}
	}

	public function cambiarEstado(){
		$this->form_validation->set_rules('estado_TipoPersonal_id','','required|trim');
		$this->form_validation->set_rules('cambio_estado','','required|trim');

		log_message('debug', "**** TipoPersonal_model - cambiarEstado - estado_TipoPersonal_id -> ". $this->input->post('estado_TipoPersonal_id'));
		log_message('debug', "**** TipoPersonal_model - cambiarEstado - cambio_estado -> ". $this->input->post('cambio_estado'));

		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		}
		else{
			$resultado = $this->TipoPersonal_model->cambiarEstado(
				(int) $this->input->post('estado_TipoPersonal_id'), 
				(int) $this->input->post('cambio_estado')
			);

			if ($resultado) {
				$this->session->set_flashdata('success', 'Cambios Realizados.');
			}
			else {
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('TipoPersonal');
		}
	}
	
	private function cargarVistaDatos(){
		$session_data = $this->session->userdata('logged_in');
		$menu_session = $this->session->userdata('arreglo_menu');

		$data_menu = array(
			'menu' => $menu_session
		);

		//****************************
		$perfilOpciones = $this->PerfilUsuario_model->PerfilOpciones($session_data['perfil'],'TipoPersonal');		
		
		log_message('error',"Opciones usuario opc: ".json_encode($perfilOpciones));		
		//****************************
		
		$data = array(
			'lista_TipoPersonal' => $this->TipoPersonal_model->TipoPersonalExistentes(),
			'lista_especialidad' => $this->Especialidad_model->EspecialidadesExistentes(),
			'prfm_lectura' => $perfilOpciones[0]->prfm_lectura,
			'prfm_inserta' => $perfilOpciones[0]->prfm_inserta,
			'prfm_actualiza' => $perfilOpciones[0]->prfm_actualiza,
			'prfm_elimina' => $perfilOpciones[0]->prfm_elimina			
		);
		
		$data_header = array(
			'titulo' => 'Tipo de Personal',
			'usuario_id' => $session_data['usu_id'],
			'usuario_nombre' => $session_data['usu_username'],
			'menu' =>$this->load->view('menu_aside_view', $data_menu, TRUE)
		);

		$this->load->view('header_view', $data_header);		
		$this->load->view('tipoPersonal_view', $data);		
		$this->load->view('footer_view');
	}

}
