<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	function UsuariosExistentes(){

		$sql = "
			SELECT u.usu_id as id, u.usu_username as usuario, u.usu_contrasena as contrasena,
			u.usu_fecha_inicio as fecha, u.usu_estado as estado, u.prf_id as perfil_id
			FROM usuario u
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function crearUsuario($_datos){
		
		log_message('debug', '**** usuario_model - registro -> '. json_encode($_datos) );		
	
		$data = array(
			'usu_username' => $_datos['usuario'],
			'usu_contrasena' => md5($_datos['contrasena']),
			'prf_id' => $_datos['id_perfil'],
			'emp_id' => $_datos['id_empleado']			
		);		
		return $this->db->insert('usuario', $data);	
	}

	function actualizar($_datos){

		log_message('debug', '**** usuario_model - actualizar -> '. json_encode($_datos));

		$data = array(			
			'usu_username' => $_datos['usuario'],
			'prf_id' => $_datos['id_perfil'],
			'emp_id' => $_datos['id_empleado']
		);
		$this->db->where('usu_id', $_datos['id']);
		$query = $this->db->update('usuario', $data);
		return $query;
	}

	function actualizarPass($_datos){

		log_message('debug', '**** usuario_model - actualizarPass -> '. json_encode($_datos));

		$data = array(			
			'usu_contrasena' => md5($_datos['contrasena'])
		);

		$this->db->where('usu_id', $_datos['id']);
		$query = $this->db->update('usuario', $data);
		return $query;
	}

	function cambiarEstado($_usuario_id, $_estado){
		log_message('debug', "**** usuario_model - cambiarEstado - _usuario_id -> $_usuario_id");
		log_message('debug', "**** usuario_model - cambiarEstado - _estado -> $_estado");

		$this->db->where('usu_id', $_usuario_id);

		if ($_estado == 1) {
			$data = array('usu_estado' => 'ACTIVO');
		}else {
			$data = array('usu_estado' => 'INACTIVO');
		}
		return $this->db->update('usuario', $data);
	}
}