<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Perfil_model');
		$this->load->model('Formulario_model');
		$this->load->model('Menu_model');
	}
	public function index()
	{
		$this->cargarVistaDatos();		
	}

	public function registrar_perfil(){
		
		log_message('debug', '**** Perfil - registro -> '. $this->input->post('perfil'));		
		// Validacion datos perfil
		$this->form_validation->set_rules('nombre','Nombre','required|min_length[3]|regex_match[/^[\p{L} ,.]*$/u]|trim');
		
		/*Formularios seleccionados*/
		$pxfId = $this->input->post('pxfId');
		log_message('error','Datos Id perfil x formulario '. json_encode($pxfId));
		
		if (is_null($pxfId) || $pxfId == '' || $pxfId == 0 || count($pxfId) == 0) {
			log_message('error','No ha seleccionado ninguna opcion de formulario');
			$this->session->set_flashdata('error', 'No ha seleccionado ninguna opcion de formulario');
		}

		if(!$this->form_validation->run() || count($pxfId)==0){
			$this->cargarVistaDatos();
		} 
		else 
		{
			$datos_perfil = array(
				'nombre' => $this->input->post('nombre'),
				'descripcion' => $this->input->post('descripcion')
			);

			$perfil_id = $this->Perfil_model->crearPerfil($datos_perfil);
			log_message('debug','Id Insert perfil '.$perfil_id);

			if (!$perfil_id) {
				$this->session->set_flashdata('error', 'Error!');
				redirect('Perfil');
			}

			$contador_exitos = 0;
			
			foreach($pxfId as $frm_id){
				
				$pxf_l = $this->input->post('pxf_l'.$frm_id);
				$pxf_e = $this->input->post('pxf_e'.$frm_id);
				$pxf_a = $this->input->post('pxf_a'.$frm_id);
				$pxf_b = $this->input->post('pxf_b'.$frm_id);
				
				log_message('debug','Datos Lec perfil x formulario '.$pxf_l);
				log_message('debug','Datos Esc perfil x formulario '.$pxf_e);
				log_message('debug','Datos Act perfil x formulario '.$pxf_a);
				log_message('debug','Datos Eli perfil x formulario '.$pxf_b);

				log_message('debug','Id Insert perfil x formulario '.$perfil_id);
				
				$data = array(
					'perfil_id' => $perfil_id,
					'form_id' => $frm_id,
					'lectura' => isset($pxf_l) ? '1' : '0',
					'escritura' => isset($pxf_e) ? '1' : '0',
					'actualiza' => isset($pxf_a) ? '1' : '0',
					'elimina' => isset($pxf_b) ? '1' : '0'
				);
				
				$perfilxform = $this->Perfil_model->crearPerfilxFormulario($data);
				$contador_exitos += ($perfilxform ? 1 : 0);
			}
			
			//$contador_exitos == count($pxfId)
			if ($contador_exitos == count($pxfId)){
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}
			else if ($contador_exitos < count($pxfId)) {
				$this->session->set_flashdata('error', 'Advertencia! El perfil se creó, pero no se le asignaron todos los formularios');
			}
			redirect('Perfil');
		}		
		
	}

	public function actualizar(){
		$this->form_validation->set_rules('txtPerfilId','','trim|required');
		$this->form_validation->set_rules('nombre','Nombre','trim|required|alpha|min_length[3]');

		//Formularios seleccionados
		$pxfId = $this->input->post('pxfId');
		log_message('error','Datos Id perfil x formulario '. json_encode($pxfId));

		if(! $this->form_validation->run() || count($pxfId)==0){
			$this->cargarVistaDatos();
		} 
		else{	

			$perfil_id = $this->input->post('txtPerfilId');		
			$datos_perfil = array(
				'id' => $perfil_id,
				'nombre' => $this->input->post('nombre'),
				'descripcion' => $this->input->post('descripcion')
			);

			$resultado = $this->Perfil_model->actualizar($datos_perfil);

			foreach($pxfId as $frm_id){
				
				$pxf_l = $this->input->post('pxf_l'.$frm_id);
				$pxf_e = $this->input->post('pxf_e'.$frm_id);
				$pxf_a = $this->input->post('pxf_a'.$frm_id);
				$pxf_b = $this->input->post('pxf_b'.$frm_id);
				
				log_message('error','Datos Lec perfil x formulario '.$pxf_l);
				log_message('error','Datos Esc perfil x formulario '.$pxf_e);
				log_message('error','Datos Act perfil x formulario '.$pxf_a);
				log_message('error','Datos Eli perfil x formulario '.$pxf_b);

				log_message('error','Id Insert perfil x formulario '.$perfil_id);
				
				$dataPerfiles = array(
					'perfil_id' => $perfil_id,
					'form_id' => $frm_id,
					'lectura' => isset($pxf_l) ? '1' : '0',
					'escritura' => isset($pxf_e) ? '1' : '0',
					'actualiza' => isset($pxf_a) ? '1' : '0',
					'elimina' => isset($pxf_b) ? '1' : '0'
				);
				if ($this->Perfil_model->existeFormularioPerfil($frm_id, $perfil_id)) {
					$perfilxform = $this->Perfil_model->actualizarPerfilxFormulario($dataPerfiles);
				}else{
					$perfilxform = $this->Perfil_model->crearPerfilxFormulario($dataPerfiles);
				}

				$contador_exitos += ($perfilxform ? 1 : 0);
			}

			//$contador_exitos == count($pxfId)
			if ($contador_exitos == count($pxfId)){
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}
			else if ($contador_exitos < count($pxfId)) {
				$this->session->set_flashdata('error', 'Advertencia! El perfil se actualizó, pero no se le asignaron todos los formularios');
			}
			redirect('Perfil');
		}
	}

	public function cambiarEstado(){
		$this->form_validation->set_rules('estado_perfil_id','','required|trim');
		$this->form_validation->set_rules('cambio_estado','','required|trim');

		log_message('debug', "**** Perfil_model - cambiarEstado - estado_perfil_id -> ". $this->input->post('estado_perfil_id'));
		log_message('debug', "**** departamento_model - cambiarEstado - cambio_estado -> ". $this->input->post('cambio_estado'));

		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		}
		else{
			$resultado = $this->Perfil_model->cambiarEstado(
				(int) $this->input->post('estado_perfil_id'), 
				(int) $this->input->post('cambio_estado')
			);

			if ($resultado) {
				$this->session->set_flashdata('success', 'Cambio Realizado.');
			}
			else {
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Perfil');
		}
	}

	private function cargarVistaDatos(){

		$session_data = $this->session->userdata('logged_in');
		$menu_session = $this->session->userdata('arreglo_menu');

		$lista_perfiles = $this->Perfil_model->perfilesExistentes('perfil');

		foreach ($lista_perfiles as $perfil_i) {

			$perfil_i->formularios = $this->Menu_model->obtenerFormulariosPorPerfil($perfil_i->id);
		}

		$data_menu = array(
			'menu' => $menu_session
		);
		
		$data = array(
			'lista_perfiles' => $lista_perfiles,
			'lista_formularios' => $this->Formulario_model->formulariosExistentes()
		);

		$data_header = array(
			'titulo' => 'perfiles',
			'usuario_id' => $session_data['usu_id'],
			'usuario_nombre' => $session_data['usu_username'],
			'menu' =>$this->load->view('menu_aside_view', $data_menu, TRUE)
		);

		$this->load->view('header_view', $data_header);
		$this->load->view('perfil_view', $data);
		$this->load->view('footer_view');
	}
}	