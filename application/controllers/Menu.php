<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model("Menu_model");
	}

	function index(){
		$this->cargarVistaDatos();
	}

	// Pasar como parametro a la vista el arreglo de los menus obtenidos
	public function registrar_menu(){
	
		// Validacion datos menu
		$this->form_validation->set_rules('nombre','Nombre','required|min_length[3]|regex_match[/^[\p{L} ,.]*$/u]|trim');		

		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{
			$datos_menu = array(
				'nombre' => $this->input->post('nombre')
			);

			$resultado = $this->Menu_model->crearMenu($datos_menu);
			if ($resultado) {
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}
			else {
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Menu');
		}
	}

	public function actualizar(){

		$this->form_validation->set_rules('txtMenuId','','required');
		$this->form_validation->set_rules('nombre','Nombre','required|min_length[3]|regex_match[/^[\p{L} ,.]*$/u]|trim');		

		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{
			$datos_menu = array(
				'id' => $this->input->post('txtMenuId'),
				'nombre' => $this->input->post('nombre')
			);

			$resultado = $this->Menu_model->actualizar($datos_menu);
			if ($resultado) {
				$this->session->set_flashdata('success', 'Datos Actualizados!');
			}
			else {
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Menu');
		}
	}

	public function cambiarEstado(){
		$this->form_validation->set_rules('estado_menu_id','','required|trim');
		// cambio_estado -> 0 or 1
		$this->form_validation->set_rules('cambio_estado','','required|trim');

		log_message('debug', "**** Menu_model - cambiarEstado - estado_menu_id -> ". $this->input->post('estado_menu_id'));
		log_message('debug', "**** Menu_model - cambiarEstado - cambio_estado -> ". $this->input->post('cambio_estado'));

		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{
			$resultado = $this->Menu_model->cambiarEstado(
				(int) $this->input->post('estado_menu_id'), 
				(int) $this->input->post('cambio_estado')
			);

			if ($resultado) {
				$this->session->set_flashdata('success', 'Cambio Realizado.');
			}
			else {
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Menu');
		}
	}

	private function cargarVistaDatos(){
		$session_data = $this->session->userdata('logged_in');
		$menu_session = $this->session->userdata('arreglo_menu');

		$data_menu = array(
			'menu' => $menu_session
		);
		
		$data = array(
			'lista_menus' => $this->Menu_model->menusExistentes('menu')			
		);
		
		$data_header = array(
			'titulo' => 'Menú',
			'usuario_id' => $session_data['usu_id'],
			'usuario_nombre' => $session_data['usu_username'],
			'menu' =>$this->load->view('menu_aside_view', $data_menu, TRUE)
		);

		$this->load->view('header_view', $data_header);		
		$this->load->view('menu_view', $data);		
		$this->load->view('footer_view');
	}
}