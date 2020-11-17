<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicamento extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model("Medicamento_model");
	    $this->load->model('PerfilUsuario_model');
	}

	function index(){
		$this->cargarVistaDatos();
	}

	public function registrar_Fabricante(){
		
		log_message('debug', '**** Fabricante - registro -> '. $this->input->post('Fabricante'));	

		$this->form_validation->set_rules('fabricante','Fabricante','trim|required');
		
		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datosFabricante = array(
				'fabricante' => $this->input->post('fabricante')

			);

			$resultado = $this->Medicamento_model->crearFabricante($datosFabricante);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Medicamento');
		}		
	}

	public function actualizarFabricante(){
	$this->form_validation->set_rules('fabricante','Fabricante','trim|required');


	if(! $this->form_validation->run()){
		$this->cargarVistaDatos();
	} 
	else{			
		$datosFabricante = array(
			'id_fabricante' => $this->input->post('txtFabricanteId'),
			'fabricante' => $this->input->post('fabricante')
		);

		$resultado = $this->Medicamento_model->actualizarFabricante($datosFabricante);
		if ($resultado) {				
			$this->session->set_flashdata('success', 'Cambio Realizado!');
		}				
		else {								
			$this->session->set_flashdata('error', 'Error!');
		}
		redirect('Medicamento');
	}
}

/*	public function cambiarEstadoFabricante(){
			$this->form_validation->set_rules('estado_Fabricante_id','','required|trim');
			$this->form_validation->set_rules('cambio_estado','','required|trim');

			log_message('debug', "**** Medicamento_model - cambiarEstado - estado_Fabricante_id -> ". $this->input->post('estado_Fabricante_id'));
			log_message('debug', "**** Medicamento_model - cambiarEstado - cambio_estado -> ". $this->input->post('cambio_estado'));

			if(! $this->form_validation->run()){
				$this->cargarVistaDatos();
			}
			else{
				$resultado = $this->Medicamento_model->cambiarEstadoFabricante(
					(int) $this->input->post('estado_Fabricante_id'), 
					(int) $this->input->post('cambio_estado')
				);

				if ($resultado) {
					$this->session->set_flashdata('success', 'Cambio realizado.');
				}
				else {
					$this->session->set_flashdata('error', 'Error!');
				}
				redirect('Medicamento');
			}
	}*/

	public function registrar_Laboratorio(){
		
		log_message('debug', '**** Laboratorio - registro -> '. $this->input->post('Laboratorio'));	

		$this->form_validation->set_rules('laboratorio','Laboratorio','trim|required');
		
		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datosLaboratorio = array(
				'laboratorio' => $this->input->post('laboratorio')

			);

			$resultado = $this->Medicamento_model->crearLaboratorio($datosLaboratorio);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Medicamento');
		}		
	}

	public function actualizarLaboratorio(){
	$this->form_validation->set_rules('laboratorio','Laboratorio','trim|required');


	if(! $this->form_validation->run()){
		$this->cargarVistaDatos();
	} 
	else{			
		$datosLaboratorio = array(
			'id_laboratorio' => $this->input->post('txtLaboratorioId'),
			'laboratorio' => $this->input->post('laboratorio')
		);

		$resultado = $this->Medicamento_model->actualizarLaboratorio($datosLaboratorio);
		if ($resultado) {				
			$this->session->set_flashdata('success', 'Cambio Realizado!');
		}				
		else {								
			$this->session->set_flashdata('error', 'Error!');
		}
		redirect('Medicamento');
	}
}

/*public function cambiarEstadoLaboratorio(){
			$this->form_validation->set_rules('estado_Laboratorio_id','','required|trim');
			$this->form_validation->set_rules('cambio_estado','','required|trim');

			log_message('debug', "**** Medicamento_model - cambiarEstado - estado_Laboratorio_id -> ". $this->input->post('estado_Laboratorio_id'));
			log_message('debug', "**** Medicamento_model - cambiarEstado - cambio_estado -> ". $this->input->post('cambio_estado'));

			if(! $this->form_validation->run()){
				$this->cargarVistaDatos();
			}
			else{
				$resultado = $this->Medicamento_model->cambiarEstadoLaboratorio(
					(int) $this->input->post('estado_Laboratorio_id'), 
					(int) $this->input->post('cambio_estado')
				);

				if ($resultado) {
					$this->session->set_flashdata('success', 'Cambio realizado.');
				}
				else {
					$this->session->set_flashdata('error', 'Error!');
				}
				redirect('Medicamento');
			}
}*/

	public function registrar_UnidadMedida(){
		
		log_message('debug', '**** UnidadMedida - registro -> '. $this->input->post('UnidadMedida'));	

		$this->form_validation->set_rules('unidad_medida','UnidadMedida','trim|required');
		
		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datosUnidadMedida = array(
				'unidad_medida' => $this->input->post('unidad_medida')

			);

			$resultado = $this->Medicamento_model->crearUnidadMedida($datosUnidadMedida);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Medicamento');
		}		
	}

	public function actualizarUnidadMedida(){
	$this->form_validation->set_rules('unidad_medida','UnidadMedida','trim|required');


	if(! $this->form_validation->run()){
		$this->cargarVistaDatos();
	} 
	else{			
		$datosUnidadMedida = array(
			'id_unidad_medida' => $this->input->post('txtUnidadMedidaId'),
			'unidad_medida' => $this->input->post('unidad_medida')
		);

		$resultado = $this->Medicamento_model->actualizarUnidadMedida($datosUnidadMedida);
		if ($resultado) {				
			$this->session->set_flashdata('success', 'Cambio Realizado!');
		}				
		else {								
			$this->session->set_flashdata('error', 'Error!');
		}
		redirect('Medicamento');
	}
}

/*	public function cambiarEstadoUnidadMedida(){
			$this->form_validation->set_rules('estado_UnidadMedida_id','','required|trim');
			$this->form_validation->set_rules('cambio_estado','','required|trim');

			log_message('debug', "**** Medicamento_model - cambiarEstado - estado_UnidadMedida_id -> ". $this->input->post('estado_UnidadMedida_id'));
			log_message('debug', "**** Medicamento_model - cambiarEstado - cambio_estado -> ". $this->input->post('cambio_estado'));

			if(! $this->form_validation->run()){
				$this->cargarVistaDatos();
			}
			else{
				$resultado = $this->Medicamento_model->cambiarEstadoUnidadMedida(
					(int) $this->input->post('estado_UnidadMedida_id'), 
					(int) $this->input->post('cambio_estado')
				);

				if ($resultado) {
					$this->session->set_flashdata('success', 'Cambio realizado.');
				}
				else {
					$this->session->set_flashdata('error', 'Error!');
				}
				redirect('Medicamento');
			}
	}*/

	public function registrar_Pais(){
		
		log_message('debug', '**** Pais - registro -> '. $this->input->post('Pais'));	

		$this->form_validation->set_rules('pais','Pais','trim|required');
		
		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datosPais = array(
				'pais' => $this->input->post('pais')

			);

			$resultado = $this->Medicamento_model->crearPais($datosPais);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Medicamento');
		}		
	}	

public function actualizarPais(){
	$this->form_validation->set_rules('txtPaisId','','trim|required');
	$this->form_validation->set_rules('pais','pais','trim|required');


	if(! $this->form_validation->run()){
		$this->cargarVistaDatos();
	} 
	else{			
		$datosPais = array(
			'id_pais' => $this->input->post('txtPaisId'),
			'pais' => $this->input->post('pais')
		);

		$resultado = $this->Medicamento_model->actualizarPais($datosPais);
		if ($resultado) {				
			$this->session->set_flashdata('success', 'Cambio Realizado!');
		}				
		else {								
			$this->session->set_flashdata('error', 'Error!');
		}
		redirect('Medicamento');
	}
}

/*	public function cambiarEstadoPais(){
			$this->form_validation->set_rules('estado_pais_id','','required|trim');
			$this->form_validation->set_rules('cambio_estado_pais','','required|trim');

			log_message('debug', "**** Medicamento_model - cambiarEstadoPais - estado_pais_id -> ". $this->input->post('estado_pais_id'));
			log_message('debug', "**** Medicamento_model - cambiarEstadoPais - cambio_estado_pais -> ". $this->input->post('cambio_estado_pais'));

			if(! $this->form_validation->run()){
				$this->cargarVistaDatos();
			}
			else{
				$resultado = $this->Medicamento_model->cambiarEstadoPais(
					(int) $this->input->post('estado_pais_id'), 
					(int) $this->input->post('cambio_estado_pais')
				);

				if ($resultado) {
					$this->session->set_flashdata('success', 'Cambio realizado.');
				}
				else {
					$this->session->set_flashdata('error', 'Error!');
				}
				redirect('Medicamento');
			}
	}*/

	public function registrar_Marca(){
		
		log_message('debug', '**** Marca - registro -> '. $this->input->post('Marca'));	

		$this->form_validation->set_rules('marca','Laboratorio','trim|required');
		
		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datosMarca = array(
				'marca' => $this->input->post('marca')

			);

			$resultado = $this->Medicamento_model->crearMarca($datosMarca);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Medicamento');
		}		
	}

	public function actualizarMarca(){
	$this->form_validation->set_rules('txtMarcaId','','trim|required');
	$this->form_validation->set_rules('marca','Marca','trim|required');


	if(! $this->form_validation->run()){
		$this->cargarVistaDatos();
	} 
	else{			
		$datosMarca = array(
			'id_marca' => $this->input->post('txtMarcaId'),
			'marca' => $this->input->post('marca')
		);

		$resultado = $this->Medicamento_model->actualizarMarca($datosMarca);
		if ($resultado) {				
			$this->session->set_flashdata('success', 'Cambio Realizado!');
		}				
		else {								
			$this->session->set_flashdata('error', 'Error!');
		}
		redirect('Medicamento');
	}
}

/*	public function cambiarEstadoMarca(){
			$this->form_validation->set_rules('estado_marca_id','','required|trim');
			$this->form_validation->set_rules('cambio_estado_marca','','required|trim');

			log_message('debug', "**** Medicamento_model - cambiarEstado - estado_marca_id -> ". $this->input->post('estado_marca_id'));
			log_message('debug', "**** Medicamento_model - cambiarEstado - cambio_estado_marca -> ". $this->input->post('cambio_estado_marca'));

			if(! $this->form_validation->run()){
				$this->cargarVistaDatos();
			}
			else{
				$resultado = $this->Medicamento_model->cambiarEstadoMarca(
					(int) $this->input->post('estado_marca_id'), 
					(int) $this->input->post('cambio_estado_marca')
				);

				if ($resultado) {
					$this->session->set_flashdata('success', 'Cambio realizado.');
				}
				else {
					$this->session->set_flashdata('error', 'Error!');
				}
				redirect('Medicamento');
			}
	}*/

	public function registrar_Medicamento(){
		
		log_message('debug', '**** Medicamento - registro -> '. $this->input->post('Medicamento'));	

		$this->form_validation->set_rules('lote','Lote','trim|required');
		$this->form_validation->set_rules('nombre','Nombre','required|min_length[3]|regex_match[/^[\p{L} ,.]*$/u]|trim');
		$this->form_validation->set_rules('gramo','Gramo','trim|required');
		$this->form_validation->set_rules('slc_marca','Marca','trim|required');
		$this->form_validation->set_rules('slc_fabricante','Fabricante','trim|required');
		$this->form_validation->set_rules('slc_laboratorio','Laboratorio','trim|required');
		$this->form_validation->set_rules('slc_unidad_medida','Unidad de Medida','trim|required');
		$this->form_validation->set_rules('slc_pais','Pais','trim|required');
		
		if(! $this->form_validation->run()){
			$this->cargarVistaDatos();
		} 
		else{			
			$datosMedicamento = array(
				'lote' => $this->input->post('lote'),
				'nombre' => $this->input->post('nombre'),
				'gramo' => $this->input->post('gramo'),
				'id_marca' => $this->input->post('slc_marca'),
				'id_fabricante' => $this->input->post('slc_fabricante'),
				'id_laboratorio' => $this->input->post('slc_laboratorio'),
				'id_unidad_medida' => $this->input->post('slc_unidad_medida'),
				'id_pais' => $this->input->post('slc_pais')

			);

			$resultado = $this->Medicamento_model->crearMedicamento($datosMedicamento);
			if ($resultado) {				
				$this->session->set_flashdata('success', 'Cambio Realizado!');
			}				
			else {								
				$this->session->set_flashdata('error', 'Error!');
			}
			redirect('Medicamento');
		}		
	}

	public function actualizar(){
	$this->form_validation->set_rules('txtMedicamentoId','','trim|required');
	$this->form_validation->set_rules('lote','Lote','trim|required');
	$this->form_validation->set_rules('nombre','Nombre','required|min_length[3]|regex_match[/^[\p{L} ,.]*$/u]|trim');
	$this->form_validation->set_rules('gramo','Gramo','trim|required');
	$this->form_validation->set_rules('slc_marca','Marca','trim|required');
	$this->form_validation->set_rules('slc_fabricante','Fabricante','trim|required');
	$this->form_validation->set_rules('slc_laboratorio','Laboratorio','trim|required');
	$this->form_validation->set_rules('slc_unidad_medida','Unidad de Medida','trim|required');
	$this->form_validation->set_rules('slc_pais','Pais','trim|required');


	if(! $this->form_validation->run()){
		$this->cargarVistaDatos();
	} 
	else{			
		$datosMedicamento = array(
			'id' => $this->input->post('txtMedicamentoId'),
			'lote' => $this->input->post('lote'),
			'nombre' => $this->input->post('nombre'),
			'gramo' => $this->input->post('gramo'),
			'id_marca' => $this->input->post('slc_marca'),
			'id_fabricante' => $this->input->post('slc_fabricante'),
			'id_laboratorio' => $this->input->post('slc_laboratorio'),
			'id_unidad_medida' => $this->input->post('slc_unidad_medida'),
			'id_pais' => $this->input->post('slc_pais')
		);

		$resultado = $this->Medicamento_model->actualizar($datosMedicamento);
		if ($resultado) {				
			$this->session->set_flashdata('success', 'Cambio Realizado!');
		}				
		else {								
			$this->session->set_flashdata('error', 'Error!');
		}
		redirect('Medicamento');
	}
}

/*	public function cambiarEstado(){
			$this->form_validation->set_rules('estado_medicamento_id','','required|trim');
			$this->form_validation->set_rules('cambio_estado','','required|trim');

			log_message('debug', "**** Medicamento_model - cambiarEstado - estado_medicamento_id -> ". $this->input->post('estado_medicamento_id'));
			log_message('debug', "**** Medicamento_model - cambiarEstado - cambio_estado -> ". $this->input->post('cambio_estado'));

			if(! $this->form_validation->run()){
				$this->cargarVistaDatos();
			}
			else{
				$resultado = $this->Medicamento_model->cambiarEstado(
					(int) $this->input->post('estado_medicamento_id'), 
					(int) $this->input->post('cambio_estado')
				);

				if ($resultado) {
					$this->session->set_flashdata('success', 'Cambio realizado.');
				}
				else {
					$this->session->set_flashdata('error', 'Error!');
				}
				redirect('Medicamento');
			}
	}*/

	private function cargarVistaDatos(){
		$session_data = $this->session->userdata('logged_in');
		$menu_session = $this->session->userdata('arreglo_menu');

		$data_menu = array(
			'menu' => $menu_session
		);

		//****************************
		$perfilOpciones = $this->PerfilUsuario_model->PerfilOpciones($session_data['perfil'],'Medicamento');		
		
		log_message('error',"Opciones usuario opc: ".json_encode($perfilOpciones));		
		//****************************		
		
		$data = array(
			'lista_Medicamento' => $this->Medicamento_model->MedicamentoExistente(),
			'lista_medicamentos' => $this->Medicamento_model->MedicamentosActivos(),
			'lista_fabricante' => $this->Medicamento_model->FabricanteExistente(),
			'lista_laboratorio' => $this->Medicamento_model->LaboratorioExistente(),
			'lista_marca' => $this->Medicamento_model->MarcaExistente(),
			'lista_unidadMedida' => $this->Medicamento_model->UnidadMedidaExistente(),
			'lista_pais' => $this->Medicamento_model->PaisExistente(),
			'prfm_lectura' => $perfilOpciones[0]->prfm_lectura,
			'prfm_inserta' => $perfilOpciones[0]->prfm_inserta,
			'prfm_actualiza' => $perfilOpciones[0]->prfm_actualiza,
			'prfm_elimina' => $perfilOpciones[0]->prfm_elimina	
		);

		$data_header = array(
			'titulo' => 'Medicamentos',
			'usuario_id' => $session_data['usu_id'],
			'usuario_nombre' => $session_data['usu_username'],
			'menu' =>$this->load->view('menu_aside_view', $data_menu, TRUE)
		);

		$this->load->view('header_view', $data_header);		
		$this->load->view('medicamento_view', $data);		
		$this->load->view('footer_view');
	}
}