<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProveedorMedicamento extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model("ProveedorMedicamento_model");
	    $this->load->model('PerfilUsuario_model');
	}

	function index(){
		$this->cargarVistaDatos();
	}

	public function registrar_ProveedorMedicamento(){
		
		log_message('debug', '**** ProveedorMedicamento - registro -> '. $this->input->post('ProveedorMedicamento'));	

		$this->form_validation->set_rules('nombre','Nombres','trim|required');
		$this->form_validation->set_rules('apellido','Apellidos','trim|required');
		$this->form_validation->set_rules('cedula','Numero de Cedula','trim|required');
		$this->form_validation->set_rules('celular','Numero de Celular','trim|required|numeric');
		$this->form_validation->set_rules('telefono','Hora','trim|required|numeric');
		$this->form_validation->set_rules('correo','Correo','required|min_length[3]|valid_email|trim');
		$this->form_validation->set_rules('direccion','Direccion','trim|required');
		
		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datosProveedor = array(
				'nombre' => $this->input->post('nombre'),
				'apellido' => $this->input->post('apellido'),
				'cedula' => $this->input->post('cedula'),
				'celular' => $this->input->post('celular'),
				'telefono' => $this->input->post('telefono'),
				'correo' => $this->input->post('correo'),
				'direccion' => $this->input->post('direccion')

			);

			$resultado = $this->ProveedorMedicamento_model->crearProveedores($datosProveedor);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('ProveedorMedicamento');
		}		
	}

	public function actualizar(){
	$this->form_validation->set_rules('txtProveedorMedicamentoId','','trim|required');
	$this->form_validation->set_rules('nombre','Nombres','trim|required');
	$this->form_validation->set_rules('apellido','Apellidos','trim|required');
	$this->form_validation->set_rules('cedula','Numero de Cedula','trim|required');
	$this->form_validation->set_rules('celular','Numero de Celular','trim|required|numeric');
	$this->form_validation->set_rules('telefono','Hora','trim|required|numeric');
	$this->form_validation->set_rules('correo','Correo','required|min_length[3]|valid_email|trim');
	$this->form_validation->set_rules('direccion','Direccion','trim|required');

	if(! $this->form_validation->run()){
		$this->cargarVistaDatos();
	} 
	else{			
		$datosProveedor = array(
			'id' => $this->input->post('txtProveedorMedicamentoId'),
			'nombre' => $this->input->post('nombre'),
			'apellido' => $this->input->post('apellido'),
			'cedula' => $this->input->post('cedula'),
			'celular' => $this->input->post('celular'),
			'telefono' => $this->input->post('telefono'),
			'correo' => $this->input->post('correo'),
			'direccion' => $this->input->post('direccion')
		);

		$resultado = $this->ProveedorMedicamento_model->actualizar($datosProveedor);
		if ($resultado) {				
			$this->session->set_flashdata('success', 'Cambio Realizado!');
		}				
		else {								
			$this->session->set_flashdata('error', 'Error!');
		}
		redirect('ProveedorMedicamento');
	}
}

	public function cambiarEstado(){
			$this->form_validation->set_rules('estado_proveedorMedicamento_id','','required|trim');
			$this->form_validation->set_rules('cambio_estado','','required|trim');

			log_message('debug', "**** ProveedorMedicamento_model - cambiarEstado - estado_proveedorMedicamento_id -> ". $this->input->post('estado_proveedorMedicamento_id'));
			log_message('debug', "**** ProveedorMedicamento_model - cambiarEstado - cambio_estado -> ". $this->input->post('cambio_estado'));

			if(! $this->form_validation->run()){
				$this->cargarVistaDatos();
			}
			else{
				$resultado = $this->ProveedorMedicamento_model->cambiarEstado(
					(int) $this->input->post('estado_proveedorMedicamento_id'), 
					(int) $this->input->post('cambio_estado')
				);

				if ($resultado) {
					$this->session->set_flashdata('success', 'Cambio realizado.');
				}
				else {
					$this->session->set_flashdata('error', 'Error!');
				}
				redirect('ProveedorMedicamento');
			}
		}

	private function cargarVistaDatos(){
		$session_data = $this->session->userdata('logged_in');
		$menu_session = $this->session->userdata('arreglo_menu');

		$data_menu = array(
			'menu' => $menu_session
		);

		//****************************
		$perfilOpciones = $this->PerfilUsuario_model->PerfilOpciones($session_data['perfil'],'ProveedorMedicamento');		
		
		log_message('error',"Opciones usuario opc: ".json_encode($perfilOpciones));		
		//****************************
				
		$data = array(
			'lista_proveedorMedicamento' => $this->ProveedorMedicamento_model->ProveedoresExistentes(),
			'prfm_lectura' => $perfilOpciones[0]->prfm_lectura,
			'prfm_inserta' => $perfilOpciones[0]->prfm_inserta,
			'prfm_actualiza' => $perfilOpciones[0]->prfm_actualiza,
			'prfm_elimina' => $perfilOpciones[0]->prfm_elimina		
		);
		
		$data_header = array(
			'titulo' => 'Proveedores Existentes',
			'usuario_id' => $session_data['usu_id'],
			'usuario_nombre' => $session_data['usu_username'],
			'menu' =>$this->load->view('menu_aside_view', $data_menu, TRUE)
		);

		$this->load->view('header_view', $data_header);		
		$this->load->view('proveedorMedicamento_view', $data);		
		$this->load->view('footer_view');
	}
}