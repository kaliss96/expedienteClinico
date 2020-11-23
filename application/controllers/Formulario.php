<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formulario extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model("Formulario_model");
	    $this->load->model("Menu_model");
	    $this->load->model('PerfilUsuario_model');
	}

	function index(){
		$this->cargarVistaDatos();
	}

	public function registrar_formulario(){
	
		// Validacion datos formulario
		$this->form_validation->set_rules('nombre','Nombre','required|min_length[3]|regex_match[/^[\p{L} ,.]*$/u]|trim');
		$this->form_validation->set_rules('descripcion','Descripcion');
		$this->form_validation->set_rules('controlador','Controlador','trim|required');
		$this->form_validation->set_rules('slc_menu','menu','trim|required');

		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datos_formulario = array(
				'nombre' => $this->input->post('nombre'),
				'descripcion' => $this->input->post('descripcion'),
				'controlador' => $this->input->post('controlador'),
				'id_menu' => $this->input->post('slc_menu')
			);

			$resultado = $this->Formulario_model->crearformulario($datos_formulario);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Formulario');
		}
	}

	public function actualizar(){
		$this->form_validation->set_rules('txtFormularioId','','required');
		$this->form_validation->set_rules('nombre','Nombre','required|min_length[3]|regex_match[/^[\p{L} ,.]*$/u]|trim');
		$this->form_validation->set_rules('descripcion','Descripcion','trim|required');
		$this->form_validation->set_rules('controlador','Controlador','required');
		$this->form_validation->set_rules('slc_menu','menu','required');	

		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{
			$datos_formulario = array(
				'id' => $this->input->post('txtFormularioId'),
				'nombre' => $this->input->post('nombre'),
				'descripcion' => $this->input->post('descripcion'),
				'controlador' => $this->input->post('controlador'),
				'id_menu' => $this->input->post('slc_menu')
			);

			$resultado = $this->Formulario_model->actualizar($datos_formulario);
			if ($resultado) {
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}
			else {
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Formulario');
		}
	}

	public function cambiarEstado(){
		$this->form_validation->set_rules('estado_formulario_id','','required|trim');
		$this->form_validation->set_rules('cambio_estado','','required|trim');

		log_message('debug', "**** Formulario_model - cambiarEstado - estado_formulario_id -> ". $this->input->post('estado_formulario_id'));
		log_message('debug', "**** Formulario_model - cambiarEstado - cambio_estado -> ". $this->input->post('cambio_estado'));

		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{
			$resultado = $this->Formulario_model->cambiarEstado(
				(int) $this->input->post('estado_formulario_id'), 
				(int) $this->input->post('cambio_estado')
			);

			if ($resultado) {
				$this->session->set_flashdata('success', 'Cambio realizado.');
			}
			else {
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Formulario');
		}
	}

	private function cargarVistaDatos(){
		$session_data = $this->session->userdata('logged_in');
		$menu_session = $this->session->userdata('arreglo_menu');

		$data_menu = array(
			'menu' => $menu_session
		);

		//****************************
		$perfilOpciones = $this->PerfilUsuario_model->PerfilOpciones($session_data['perfil'],'Formulario');		
		
		log_message('error',"Opciones usuario opc: ".json_encode($perfilOpciones));		
		//****************************
				
		$data = array(
			'lista_formularios' => $this->Formulario_model->formulariosExistentes(),
			'lista_menus' => $this->Menu_model->menusActivos(),
			'prfm_lectura' => $perfilOpciones[0]->prfm_lectura,
			'prfm_inserta' => $perfilOpciones[0]->prfm_inserta,
			'prfm_actualiza' => $perfilOpciones[0]->prfm_actualiza,
			'prfm_elimina' => $perfilOpciones[0]->prfm_elimina			
		);
		
		$data_header = array(
			'titulo' => 'Formulario',
			'usuario_id' => $session_data['usu_id'],
			'usuario_nombre' => $session_data['usu_username'],
			'menu' =>$this->load->view('menu_aside_view', $data_menu, TRUE)
		);

		$this->load->view('header_view', $data_header);		
		$this->load->view('formulario_view', $data);		
		$this->load->view('footer_view');
	}
}