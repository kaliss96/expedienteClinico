<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonalDispensario extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PersonalDispensario_model');
		$this->load->model('TipoPersonal_model');
		$this->load->model('PerfilUsuario_model');
	}
	public function index()
	{
		$this->cargarVistaDatos();
	}

	public function registrarPersonalDispensario(){

		$this->form_validation->set_rules('slc_especialista','Especialista','trim|required');
		$this->form_validation->set_rules('nombres','Nombres','required|min_length[3]|regex_match[/^[\p{L} ,.]*$/u]|trim');
		$this->form_validation->set_rules('apellidos','Apellidos','required|min_length[3]|regex_match[/^[\p{L} ,.]*$/u]|trim');
		$this->form_validation->set_rules('sexo','Sexo','required');
		$this->form_validation->set_rules('fecha_nacimiento','Fecha Nacimiento','required');
		$this->form_validation->set_rules('estado_civil','Estado Civil','required');
		$this->form_validation->set_rules('nacionalidad','Nacionalidad','required');
		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datos_personalDispensario = array(
				'id_tipo' => $this->input->post('slc_especialista'),
				'cod_minsa' => $this->input->post('cod_minsa'),
				'nombres' => $this->input->post('nombres'),
				'apellidos' => $this->input->post('apellidos'),
				'sexo' => $this->input->post('sexo'),
				'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
				'cedula' => $this->input->post('cedula'),
				'estado_civil' => $this->input->post('estado_civil'),
				'email' => $this->input->post('email'),
				'celular' => $this->input->post('celular'),
				'telefono' => $this->input->post('telefono'),
				'nacionalidad' => $this->input->post('nacionalidad')
			);

			$resultado = $this->PersonalDispensario_model->registro($datos_personalDispensario);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}				
			redirect('PersonalDispensario');
		}
	}

	public function actualizar(){

		$this->form_validation->set_rules('txtPersonalDispensarioId','','required');
		$this->form_validation->set_rules('nombres','Nombres','required|min_length[3]|regex_match[/^[\p{L} ,.]*$/u]|trim');
		$this->form_validation->set_rules('apellidos','Apellidos','required|min_length[3]|regex_match[/^[\p{L} ,.]*$/u]|trim');
		$this->form_validation->set_rules('sexo','Sexo','required');
		$this->form_validation->set_rules('fecha_nacimiento','Fecha Nacimiento','required');
		$this->form_validation->set_rules('nacionalidad','Nacionalidad','required');
		
		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datos_PersonalDispensario = array(
				'id' => $this->input->post('txtPersonalDispensarioId'),
				'id_tipo' => $this->input->post('slc_especialista'),
				'cod_minsa' => $this->input->post('cod_minsa'),
				'nombres' => $this->input->post('nombres'),
				'apellidos' => $this->input->post('apellidos'),
				'sexo' => $this->input->post('sexo'),
				'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
				'cedula' => $this->input->post('cedula'),
				'estado_civil' => $this->input->post('estado_civil'),
				'email' => $this->input->post('email'),
				'celular' => $this->input->post('celular'),
				'telefono' => $this->input->post('telefono'),
				'nacionalidad' => $this->input->post('nacionalidad')
			);

			$resultado = $this->PersonalDispensario_model->actualizar($datos_PersonalDispensario);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}				
			redirect('PersonalDispensario');
		}
	}

	public function cambiarEstado(){
		$this->form_validation->set_rules('estado_personalDispensario_id','','required|trim');
		$this->form_validation->set_rules('cambio_estado','','required|trim');

		log_message('debug', "**** PersonalDispensario_model - cambiarEstado - estado_personalDispensario_id -> ". $this->input->post('estado_personalDispensario_id'));
		log_message('debug', "**** PersonalDispensario_model - cambiarEstado - cambio_estado -> ". $this->input->post('cambio_estado'));

		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		}
		else{
			$resultado = $this->PersonalDispensario_model->cambiarEstado(
				(int) $this->input->post('estado_personalDispensario_id'), 
				(int) $this->input->post('cambio_estado')
			);

			if ($resultado) {
				$this->session->set_flashdata('success', 'Cambio Realizado.');
			}
			else {
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('PersonalDispensario');
		}
	}
	
	private function cargarVistaDatos(){
		$session_data = $this->session->userdata('logged_in');
		$menu_session = $this->session->userdata('arreglo_menu');

		$data_menu = array(
			'menu' => $menu_session
		);

		//****************************
		$perfilOpciones = $this->PerfilUsuario_model->PerfilOpciones($session_data['perfil'],'PersonalDispensario');		
		
		log_message('error',"Opciones usuario opc: ".json_encode($perfilOpciones));		
		//****************************
				
		$data = array(
			'lista_PersonalDispensario' => $this->PersonalDispensario_model->PersonalDispensarioExistente(),
			'lista_TipoPersonal' => $this->TipoPersonal_model->TipoPersonalActivos(),
			'prfm_lectura' => $perfilOpciones[0]->prfm_lectura,
			'prfm_inserta' => $perfilOpciones[0]->prfm_inserta,
			'prfm_actualiza' => $perfilOpciones[0]->prfm_actualiza,
			'prfm_elimina' => $perfilOpciones[0]->prfm_elimina				
		);
		
		$data_header = array(
			'titulo' => 'Personal del Dispensario',
			'usuario_id' => $session_data['usu_id'],
			'usuario_nombre' => $session_data['usu_username'],
			'menu' =>$this->load->view('menu_aside_view', $data_menu, TRUE)
		);

		$this->load->view('header_view', $data_header);		
		$this->load->view('personalDispensario_view', $data);		
		$this->load->view('footer_view');
	}

}
