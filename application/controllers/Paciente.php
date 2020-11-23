<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Paciente extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model("Paciente_model");
	    $this->load->model('PerfilUsuario_model');
	}

	function index(){
		$this->cargarVistaDatos();
	}

	public function registrar_Paciente(){
		
		log_message('debug', '**** Paciente - registro -> '. $this->input->post('paciente'));	

		$this->form_validation->set_rules('num_expediente','Numero de ','trim|required');
		// Validacion Paciente
		$this->form_validation->set_rules('nombre_paciente','Nombres','required|min_length[3]|regex_match[/^[\p{L} ,.]*$/u]|trim');
		$this->form_validation->set_rules('apellido_paciente','Apellidos','required|min_length[3]|regex_match[/^[\p{L} ,.]*$/u]|trim');
		$this->form_validation->set_rules('fecha_nacimiento','Fecha Naciemiento','trim|required');
		$this->form_validation->set_rules('cedula','Cedula','trim|required');
		$this->form_validation->set_rules('celular','Celular','trim|required');
		$this->form_validation->set_rules('telefono','Telefono','trim|required|numeric');
		$this->form_validation->set_rules('correo','Correo','required|min_length[3]|valid_email|trim');
		$this->form_validation->set_rules('direccion','Direccion','trim|required');
		$this->form_validation->set_rules('estado_civil','Estado Civil','trim|required');
		$this->form_validation->set_rules('sexo','Sexo','trim|required');
		$this->form_validation->set_rules('tipo_sangre','Tipo de Sangre','trim|required');
		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datosPaciente = array(
				'num_expediente' => $this->input->post('num_expediente'),
				'nombre_paciente' => $this->input->post('nombre_paciente'),
				'apellido_paciente' => $this->input->post('apellido_paciente'),
				'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
				'cedula' => $this->input->post('cedula'),
				'celular' => $this->input->post('celular'),
				'correo' => $this->input->post('correo'),
				'telefono' => $this->input->post('telefono'),
				'direccion' => $this->input->post('direccion'),
				'estado_civil' => $this->input->post('estado_civil'),
				'sexo' => $this->input->post('sexo'),
				'tipo_sangre' => $this->input->post('tipo_sangre')
			);

			$resultado = $this->Paciente_model->crearPaciente($datosPaciente);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Paciente');
		}		
	}

	public function actualizar(){
		log_message('debug', '**** Paciente - actualizar -> '. $this->input->post('Paciente'));	

		// Validacion datos empleado
		$this->form_validation->set_rules('txtPacienteId','','trim|required');	
		// Validacion Paciente
		$this->form_validation->set_rules('nombre_paciente','Nombres','required|min_length[3]|regex_match[/^[\p{L} ,.]*$/u]|trim');
		$this->form_validation->set_rules('apellido_paciente','Apellidos','required|min_length[3]|regex_match[/^[\p{L} ,.]*$/u]|trim');
		$this->form_validation->set_rules('fecha_nacimiento','Fecha Naciemiento','trim|required');
		$this->form_validation->set_rules('cedula','Cedula','trim|required');
		$this->form_validation->set_rules('celular','Celular','trim|required');
		$this->form_validation->set_rules('telefono','Telefono','trim|required|numeric');
		$this->form_validation->set_rules('direccion','Direccion','trim|required');
		$this->form_validation->set_rules('estado_civil','Estado Civil','trim|required');
		$this->form_validation->set_rules('tipo_sangre','Tipo de Sangre','trim|required');
		$this->form_validation->set_rules('sexo','Sexo','trim|required');

		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datos_Paciente = array(
				'id' => $this->input->post('txtPacienteId'),
				'nombre_paciente' => $this->input->post('nombre_paciente'),
				'apellido_paciente' => $this->input->post('apellido_paciente'),
				'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
				'cedula' => $this->input->post('cedula'),
				'celular' => $this->input->post('celular'),
				'telefono' => $this->input->post('telefono'),
				'correo' => $this->input->post('correo'),
				'direccion' => $this->input->post('direccion'),
				'estado_civil' => $this->input->post('estado_civil'),
				'tipo_sangre' => $this->input->post('tipo_sangre'),
				'sexo' => $this->input->post('sexo')
			);

			$resultado = $this->Paciente_model->actualizar($datos_Paciente);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Paciente');
		}
	}	

	public function cambiarEstado(){
		$this->form_validation->set_rules('estado_paciente_id','','required|trim');
		$this->form_validation->set_rules('cambio_estado','','required|trim');

		log_message('debug', "**** Paciente_model - cambiarEstado - estado_paciente_id -> ". $this->input->post('estado_paciente_id'));
		log_message('debug', "**** Paciente_model - cambiarEstado - cambio_estado -> ". $this->input->post('cambio_estado'));

		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		}
		else{
			$resultado = $this->Paciente_model->cambiarEstado(
				(int) $this->input->post('estado_paciente_id'), 
				(int) $this->input->post('cambio_estado')
			);

			if ($resultado) {
				$this->session->set_flashdata('success', 'Cambio Realizado.');
			}
			else {
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Paciente');
		}
	}

	private function cargarVistaDatos(){
		$session_data = $this->session->userdata('logged_in');
		$menu_session = $this->session->userdata('arreglo_menu');

		$data_menu = array(
			'menu' => $menu_session
		);

		//****************************
		$perfilOpciones = $this->PerfilUsuario_model->PerfilOpciones($session_data['perfil'],'Paciente');		
		
		log_message('error',"Opciones usuario opc: ".json_encode($perfilOpciones));		
		//****************************
				
		$data = array(
			'lista_paciente' => $this->Paciente_model->PacientesExistentes(),
			'prfm_lectura' => $perfilOpciones[0]->prfm_lectura,
			'prfm_inserta' => $perfilOpciones[0]->prfm_inserta,
			'prfm_actualiza' => $perfilOpciones[0]->prfm_actualiza,
			'prfm_elimina' => $perfilOpciones[0]->prfm_elimina		
		);
		
		$data_header = array(
			'titulo' => 'paciente',
			'usuario_id' => $session_data['usu_id'],
			'usuario_nombre' => $session_data['usu_username'],
			'menu' =>$this->load->view('menu_aside_view', $data_menu, TRUE)
		);

		$this->load->view('header_view', $data_header);		
		$this->load->view('paciente_view', $data);		
		$this->load->view('footer_view');
	}
}