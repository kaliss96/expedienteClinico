 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	function login($usu_username, $usu_contrasena){
		
		$this->db->select('u.usu_id, u.usu_username, u.usu_contrasena, p.prf_id');
		$this->db->from('usuario as u');
		$this->db->join('perfil as p', 'p.prf_id=u.prf_id');
		$this->db->where('u.usu_username', $usu_username);
		$this->db->where('u.usu_contrasena', md5($usu_contrasena));
		$this->db->where('u.usu_estado', 'ACTIVO');
		$this->db->where('p.prf_estado', 'ACTIVO');
		$this->db->limit(1);

		$query = $this->db->get();
		if($query->num_rows()==1){
			return $query->row();
		} else{
			return NULL;
		}
	}

	/*function register($_datos){
		
		log_message('debug', '**** Login_model - register -> '. json_encode($_datos) );
		
		$data = array(
			//'usu_id' => '',
			'emp_id' => 1,
			'usu_username' => $_datos['apodo'],
			'usu_contrasena' => md5($_datos['contrasena'])
		);
		return $this->db->insert('usuario', $data);
		return $this->db->insert('empleado', $data);
	}*/
}