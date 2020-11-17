<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {	
	function __construct(){
		parent::__construct();
		// log_message('debug','info detectar'.$this->session->userdata('arreglo_menu'))
	}

	function index(){
		$session_data = $this->session->userdata('logged_in');
		$menu_session = $this->session->userdata('arreglo_menu');		

		$data_menu = array(
			'menu' => $menu_session
		);

		$data_header = array(
			'titulo' => 'home',
			'usuario_id' => $session_data['usu_id'],
			'usuario_nombre' => $session_data['usu_username'],
			'menu' =>$this->load->view('menu_aside_view', $data_menu, TRUE)
		);

		$this->load->view('header_view', $data_header);
		$this->load->view('home_view');
		$this->load->view('footer_view');
	}
}
 ?>