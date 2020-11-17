<?php 
if(!defined('BASEPATH'))
exit('No direct script access allowed');

class VerificarSesion
{      
function Validar()

{
$CI =& get_instance();
$sess = $CI->session->userdata('logged_in');

if(strtolower($CI->router->class) != 'login') {
if($sess['usu_id']==0)
redirect('login', 'refresh');
	}
}

}