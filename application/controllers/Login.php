<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->model('Menu_model');		
	}

	public function index(){
		$this->load->view('login_view');
	}

	public function logeo(){

		$this->form_validation->set_rules('usu_username','Username','trim|required|min_length[3]');
		$this->form_validation->set_rules('usu_contrasena','Password','trim|required|min_length[2]');

		if($this->form_validation->run()==false){
			$this->load->view('login_view');
			return;
		}
		
		$usu_username = $this->input->post('usu_username');
		$usu_contrasena = $this->input->post('usu_contrasena');

		log_message('debug', '**** Login - count(usu_username) -> '. count($usu_username));

		$usuario = $this->Login_model->login($usu_username, $usu_contrasena);
		
		log_message('debug', '**** Login - logeo -> '. json_encode($usuario));

		if($usuario){
			$sess_array = array(
				'usu_id' => $usuario->usu_id, 
				'usu_username' => $usuario->usu_username,
		 		'usu_contrasena' => $usuario->usu_contrasena,
		 		'perfil' => $usuario->prf_id,
		 		//'empleado' => $usuario->emp_id
		 	);
			$this->session->set_userdata('logged_in', $sess_array);

			$menus = $this->Menu_model->obtenerMenusXPerfil($usuario->prf_id);
			
			//nombre del arreglo
			$menus_usuario = array();			
			
			foreach ($menus as $menu_iterador) {
				log_message('debug', '**** Login - logeo - $menu -> item = '. json_encode($menu_iterador));

				$menu_temporal = array(
					"id"=>$menu_iterador->men_id,
					"nombre"=>$menu_iterador->men_nombre,
					"formularios"=>array()
				);

				$formularios = $this->Menu_model->obtenerFormulariosPorPerfilPorMenu($menu_iterador->men_id, $usuario->prf_id);				
				/******************************** Recorrido de Formulario ******************************/
				foreach ($formularios as $iterator_form) {
					log_message('debug', '**** Login - logeo - $form -> item = '. json_encode($iterator_form));
					
					$menu_temporal['formularios'][] = array(
						"id"=>$iterator_form->frm_id,
						"nombre"=>$iterator_form->frm_nombre,
						"lectura"=>$iterator_form->prfm_lectura,
						"inserta"=>$iterator_form->prfm_inserta,
						"actualiza"=>$iterator_form->prfm_actualiza,
						"elimina"=>$iterator_form->prfm_elimina,
						"controlador"=>$iterator_form->frm_controlador
					);
				}

				$menus_usuario[] = $menu_temporal;
				/************************************ Recorrido Fin ************************************/

				//$menu_iterador->men_id
				//Consumir el método para obtener los formularios por menu y por perfil
			}
			// Se guarda en sensión temporal el arreglo del menú del usuario. Acceder mediante el identificaddor 'arreglo_menu'
			$this->session->set_userdata('arreglo_menu', $menus_usuario);
			log_message('debug', '**** Login - logeo - menus_usuario = '. json_encode($menus_usuario));
			
			redirect('Home');
		} 
		else{
			// $this->form_validation->set_message('logeo', 'Usuario o Contraseña invalida (Porfavor revise sus credenciales)');
			$this->session->set_flashdata('error', 'El usuario o contraseña son incorrectos.');
			redirect('Login');
		}
	}

	public function obtenerMenuXPerfil(){
		if($this->input->post('')){
			$this->Menu_model->register();
			redirect('login');
		} else{
			$this->load->view('home_view');
		}		
	}
}
