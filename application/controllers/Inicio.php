<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		$this->load->view('header_view');
		$this->load->view('home_view');
		$this->load->view('footer_view');
	}
}
 ?>