<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model("Usuario_model");
	    $this->load->model("Perfil_model");
	    $this->load->model('PerfilUsuario_model');
	}

	function index(){
		$this->cargarVistaDatos();
	}

	public function registrar_usuario(){
	
		// Validacion datos usuario
		$this->form_validation->set_rules('usuario','Usuario','trim|required');
		$this->form_validation->set_rules('contrasena','Pass','trim|required');
		$this->form_validation->set_rules('passconf', 'Confirmar Contaseña', 'required');
		$this->form_validation->set_rules('slc_perfil','perfil','trim|required');
 
		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datos_usuario = array(
				'usuario' => $this->input->post('usuario'),
				'contrasena' => $this->input->post('contrasena'),
				'id_perfil' => $this->input->post('slc_perfil')
			);

			$resultado = $this->Usuario_model->crearUsuario($datos_usuario);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambios Realizados!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Usuario');
		}
	}

	public function actualizar(){
		$this->form_validation->set_rules('txtUsuarioId','','trim|required');
		$this->form_validation->set_rules('usuario','Usuario','trim|required');
		$this->form_validation->set_rules('slc_perfil','perfil','trim|required');
 
		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datos_usuario = array(
				'id' => $this->input->post('txtUsuarioId'),
				'usuario' => $this->input->post('usuario'),
				'id_perfil' => $this->input->post('slc_perfil')
			);

			$resultado = $this->Usuario_model->actualizar($datos_usuario);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambios Realizados!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Usuario');
		}
	}

	public function actualizarPass(){
		$this->form_validation->set_rules('txtPassId','','trim|required');
		$this->form_validation->set_rules('contrasena','Pass','trim|required');
 
		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datos_usuario = array(
				'id' => $this->input->post('txtPassId'),
				'contrasena' => $this->input->post('contrasena')
			);

			$resultado = $this->Usuario_model->actualizarPass($datos_usuario);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambios Realizados!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Usuario');
		}
	}

	public function cambiarEstado(){
		$this->form_validation->set_rules('estado_usuario_id','','required|trim');
		$this->form_validation->set_rules('cambio_estado','','required|trim');

		log_message('debug', "**** Usuario_model - cambiarEstado - estado_usuario_id -> ". $this->input->post('estado_usuario_id'));
		log_message('debug', "**** Usuario_model - cambiarEstado - cambio_estado -> ". $this->input->post('cambio_estado'));

		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		}
		else{
			$resultado = $this->Usuario_model->cambiarEstado(
				(int) $this->input->post('estado_usuario_id'), 
				(int) $this->input->post('cambio_estado')
			);

			if ($resultado) {
				$this->session->set_flashdata('success', 'Cambios Realizados.');
			}
			else {
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Usuario');
		}
	}

	private function cargarVistaDatos(){
		$session_data = $this->session->userdata('logged_in');
		$menu_session = $this->session->userdata('arreglo_menu');

		$data_menu = array(
			'menu' => $menu_session
		);

		//****************************
		$perfilOpciones = $this->PerfilUsuario_model->PerfilOpciones($session_data['perfil'],'Usuario');		
		
		log_message('error',"Opciones usuario opc: ".json_encode($perfilOpciones));		
		//****************************
				
		$data = array(
			'lista_usuarios' => $this->Usuario_model->usuariosExistentes(),
			'lista_perfiles' => $this->Perfil_model->perfilesActivos(),
			'prfm_lectura' => $perfilOpciones[0]->prfm_lectura,
			'prfm_inserta' => $perfilOpciones[0]->prfm_inserta,
			'prfm_actualiza' => $perfilOpciones[0]->prfm_actualiza,
			'prfm_elimina' => $perfilOpciones[0]->prfm_elimina
		);
		
		$data_header = array(
			'titulo' => 'Usuario',
			'usuario_id' => $session_data['usu_id'],
			'usuario_nombre' => $session_data['usu_username'],
			'menu' =>$this->load->view('menu_aside_view', $data_menu, TRUE)
		);

		$this->load->view('header_view', $data_header);		
		$this->load->view('usuario_view', $data);		
		$this->load->view('footer_view');
	}

}	