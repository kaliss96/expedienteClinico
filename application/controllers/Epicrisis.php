<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Epicrisis extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model("Epicrisis_model");
	    $this->load->model("Paciente_model");
	    $this->load->model('PerfilUsuario_model');
	}

	function index(){
		$this->cargarVistaDatos();
	}

	public function registrar_Epicrisis(){
		
		log_message('debug', '**** Epicrisis - registro -> '. $this->input->post('Epicrisis'));	

		$this->form_validation->set_rules('slc_num_exp','Numero Expediente','trim|required');
		$this->form_validation->set_rules('clinica','Clinica','trim|required');
		$this->form_validation->set_rules('sala','Sala','trim|required');
		$this->form_validation->set_rules('no_cama','No cama','trim|required');
		$this->form_validation->set_rules('enfermedad','Enfermedad','trim|required');
		$this->form_validation->set_rules('complicaciones','Complicaciones','trim|required');
		$this->form_validation->set_rules('examenes_realizados','Examenes_realizados','trim|required');
		$this->form_validation->set_rules('tratamientos_recibidos','Tratamientos Recibidos','trim|required');
		$this->form_validation->set_rules('diagnostico_ingreso','Diagnostico de Ingreso','trim|required');
		$this->form_validation->set_rules('diagnostico_egreso','Diagnosticode Egreso','trim|required');
		$this->form_validation->set_rules('resultado_examen','Resultado Examen','trim|required');
		//$this->form_validation->set_rules('cirugia','Cirugia','trim|required');
		//$this->form_validation->set_rules('motivo_cirugia','Motivo Cirugia','trim|required');

		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datosEpicrisis = array(
				'id_paciente' => $this->input->post('slc_num_exp'),
				'clinica' => $this->input->post('clinica'),
				'sala' => $this->input->post('sala'),
				'no_cama' => $this->input->post('no_cama'),
				'enfermedad' => $this->input->post('enfermedad'),
				'complicaciones' => $this->input->post('complicaciones'),
				'examenes_realizados' => $this->input->post('examenes_realizados'),
				'tratamientos_recibidos' => $this->input->post('tratamientos_recibidos'),
				'diagnostico_ingreso' => $this->input->post('diagnostico_ingreso'),
				'diagnostico_egreso' => $this->input->post('diagnostico_egreso'),
				'resultado_examen' => $this->input->post('resultado_examen'),
				'cirugia' => $this->input->post('cirugia'),
				'motivo_cirugia' => $this->input->post('motivo_cirugia')


			);

			$resultado = $this->Epicrisis_model->crearEpicrisis($datosEpicrisis);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Epicrisis');
		}		
	}

	public function actualizar(){
	$this->form_validation->set_rules('txtEpicrisisId','','trim|required');
	$this->form_validation->set_rules('clinica','Clinica','trim|required');
	$this->form_validation->set_rules('sala','Sala','trim|required');
	$this->form_validation->set_rules('no_cama','No cama','trim|required');
	$this->form_validation->set_rules('enfermedad','Enfermedad','trim|required');
	$this->form_validation->set_rules('complicaciones','Complicaciones','trim|required');
	$this->form_validation->set_rules('examenes_realizados','Examenes_realizados','trim|required');
	$this->form_validation->set_rules('tratamientos_recibidos','Tratamientos Recibidos','trim|required');
	$this->form_validation->set_rules('diagnostico_ingreso','Diagnostico de Ingreso','trim|required');
	$this->form_validation->set_rules('diagnostico_egreso','Diagnosticode Egreso','trim|required');
	$this->form_validation->set_rules('resultado_examen','Resultado Examen','trim|required');
	//$this->form_validation->set_rules('cirugia','Cirugia','trim|required');
	//$this->form_validation->set_rules('motivo_cirugia','Motivo Cirugia','trim|required');

	if(! $this->form_validation->run()){
		$this->cargarVistaDatos();
	} 
	else{			
		$datosEpicrisis = array(
			'id' => $this->input->post('txtEpicrisisId'),
			'clinica' => $this->input->post('clinica'),
			'sala' => $this->input->post('sala'),
			'no_cama' => $this->input->post('no_cama'),
			'enfermedad' => $this->input->post('enfermedad'),
			'complicaciones' => $this->input->post('complicaciones'),
			'examenes_realizados' => $this->input->post('examenes_realizados'),
			'tratamientos_recibidos' => $this->input->post('tratamientos_recibidos'),
			'diagnostico_ingreso' => $this->input->post('diagnostico_ingreso'),
			'diagnostico_egreso' => $this->input->post('diagnostico_egreso'),
			'resultado_examen' => $this->input->post('resultado_examen'),
			'cirugia' => $this->input->post('cirugia'),
			'motivo_cirugia' => $this->input->post('motivo_cirugia')
		);

		$resultado = $this->Epicrisis_model->actualizar($datosEpicrisis);
		if ($resultado) {				
			$this->session->set_flashdata('success', 'Cambio Realizado!');
		}				
		else {								
			$this->session->set_flashdata('error', 'Error!');
		}
		redirect('Epicrisis');
	}
}

	public function cambiarEstado(){
			$this->form_validation->set_rules('estado_epicrisis_id','','required|trim');
			$this->form_validation->set_rules('cambio_estado','','required|trim');

			log_message('debug', "**** Epicrisis_model - cambiarEstado - estado_epicrisis_id -> ". $this->input->post('estado_epicrisis_id'));
			log_message('debug', "**** Epicrisis_model - cambiarEstado - cambio_estado -> ". $this->input->post('cambio_estado'));

			if(! $this->form_validation->run()){
				$this->cargarVistaDatos();
			}
			else{
				$resultado = $this->Epicrisis_model->cambiarEstado(
					(int) $this->input->post('estado_epicrisis_id'), 
					(int) $this->input->post('cambio_estado')
				);

				if ($resultado) {
					$this->session->set_flashdata('success', 'Cambio realizado.');
				}
				else {
					$this->session->set_flashdata('error', 'Error!');
				}
				redirect('Epicrisis');
			}
		}

	private function cargarVistaDatos(){
		$session_data = $this->session->userdata('logged_in');
		$menu_session = $this->session->userdata('arreglo_menu');

		$data_menu = array(
			'menu' => $menu_session
		);

		//****************************
		$perfilOpciones = $this->PerfilUsuario_model->PerfilOpciones($session_data['perfil'],'Epicrisis');		
		
		log_message('error',"Opciones usuario opc: ".json_encode($perfilOpciones));		
		//****************************
				
		$data = array(
			'lista_epicrisis' => $this->Epicrisis_model->EpicrisisExistente(),
			'lista_Paciente' => $this->Paciente_model->PacientesActivos(),
			'prfm_lectura' => $perfilOpciones[0]->prfm_lectura,
			'prfm_inserta' => $perfilOpciones[0]->prfm_inserta,
			'prfm_actualiza' => $perfilOpciones[0]->prfm_actualiza,
			'prfm_elimina' => $perfilOpciones[0]->prfm_elimina				
		);
		
		$data_header = array(
			'titulo' => 'Epicrisis',
			'usuario_id' => $session_data['usu_id'],
			'usuario_nombre' => $session_data['usu_username'],
			'menu' =>$this->load->view('menu_aside_view', $data_menu, TRUE)
		);

		$this->load->view('header_view', $data_header);		
		$this->load->view('epicrisis_view', $data);		
		$this->load->view('footer_view');
	}
}