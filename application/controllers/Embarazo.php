<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Embarazo extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model("Embarazo_model");
	    $this->load->model("Paciente_model");
	    $this->load->model('PerfilUsuario_model');
	}

	function index(){
		$this->cargarVistaDatos();
	}

	public function registrar_Embarazo(){
		
		log_message('debug', '**** Embarazo - registro -> '. $this->input->post('Embarazo'));	

		$this->form_validation->set_rules('slc_num_exp','Numero Expediente','trim|required');
		$this->form_validation->set_rules('problema_embarazo','Problema','trim|required');
		$this->form_validation->set_rules('descripcion','Descripción','trim|required');


		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datosEmbarazo = array(
				'id_paciente' => $this->input->post('slc_num_exp'),
				'problema_embarazo' => $this->input->post('problema_embarazo'),
				'descripcion' => $this->input->post('descripcion')

			);

			$resultado = $this->Embarazo_model->crearEmbarazo($datosEmbarazo);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Embarazo');
		}		
	}

	public function actualizar(){
	$this->form_validation->set_rules('txtEmbarazoId','','trim|required');
	$this->form_validation->set_rules('problema_embarazo','Problema','trim|required');
	$this->form_validation->set_rules('descripcion','Descripción','trim|required');

	if(! $this->form_validation->run()){
		$this->cargarVistaDatos();
	} 
	else{			
		$datosEmbarazo = array(
			'id' => $this->input->post('txtEmbarazoId'),
			'problema_embarazo' => $this->input->post('problema_embarazo'),
			'descripcion' => $this->input->post('descripcion')
		);

		$resultado = $this->Embarazo_model->actualizar($datosEmbarazo);
		if ($resultado) {				
			$this->session->set_flashdata('success', 'Cambio Realizado!');
		}				
		else {								
			$this->session->set_flashdata('error', 'Error!');
		}
		redirect('Embarazo');
	}
}

	public function cambiarEstado(){
			$this->form_validation->set_rules('estado_embarazo_id','','required|trim');
			$this->form_validation->set_rules('cambio_estado','','required|trim');

			log_message('debug', "**** Embarazo_model - cambiarEstado - estado_embarazo_id -> ". $this->input->post('estado_embarazo_id'));
			log_message('debug', "**** Embarazo_model - cambiarEstado - cambio_estado -> ". $this->input->post('cambio_estado'));

			if(! $this->form_validation->run()){
				$this->cargarVistaDatos();
			}
			else{
				$resultado = $this->Embarazo_model->cambiarEstado(
					(int) $this->input->post('estado_embarazo_id'), 
					(int) $this->input->post('cambio_estado')
				);

				if ($resultado) {
					$this->session->set_flashdata('success', 'Cambio realizado.');
				}
				else {
					$this->session->set_flashdata('error', 'Error!');
				}
				redirect('Embarazo');
			}
		}

	private function cargarVistaDatos(){
		$session_data = $this->session->userdata('logged_in');
		$menu_session = $this->session->userdata('arreglo_menu');

		$data_menu = array(
			'menu' => $menu_session
		);

		//****************************
		$perfilOpciones = $this->PerfilUsuario_model->PerfilOpciones($session_data['perfil'],'Embarazo');		
		
		log_message('error',"Opciones usuario opc: ".json_encode($perfilOpciones));		
		//****************************
				
		$data = array(
			'lista_embarazo' => $this->Embarazo_model->EmbarazoExistente(),
			'lista_Paciente' => $this->Paciente_model->PacientesActivos(),
			'prfm_lectura' => $perfilOpciones[0]->prfm_lectura,
			'prfm_inserta' => $perfilOpciones[0]->prfm_inserta,
			'prfm_actualiza' => $perfilOpciones[0]->prfm_actualiza,
			'prfm_elimina' => $perfilOpciones[0]->prfm_elimina				
		);
		
		$data_header = array(
			'titulo' => 'Embarazo',
			'usuario_id' => $session_data['usu_id'],
			'usuario_nombre' => $session_data['usu_username'],
			'menu' =>$this->load->view('menu_aside_view', $data_menu, TRUE)
		);

		$this->load->view('header_view', $data_header);		
		$this->load->view('embarazo_view', $data);		
		$this->load->view('footer_view');
	}
}