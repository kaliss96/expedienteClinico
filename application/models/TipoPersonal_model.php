<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoPersonal_model extends CI_Model {

	function TipoPersonalExistentes(){

		$sql = "SELECT tp_id AS id, tp_tipo_personal AS tipo_personal, tp_especialidad AS especialidad,
		tp_estado AS estado
		FROM tipo_personal";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function TipoPersonalActivos(){
		$sql = "
			SELECT tp_id AS id_tipo, tp_especialidad AS especialidad
            FROM tipo_personal
			WHERE tp_estado = 'ACTIVO'
			ORDER BY tp_especialidad
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function registro($_datos){	
		log_message('debug', '**** TipoPersonal_model - registro -> '. json_encode($_datos) );
		
		$data = array(
			'tp_tipo_personal' => $_datos['tipo_personal'],
			'tp_especialidad' => $_datos['especialidad']
		);
		return $this->db->insert('tipo_personal', $data);
	}

	function actualizar($_datos){
		log_message('debug', '**** TipoPersonal_model - actualizar -> '. json_encode($_datos) );
		
		$data = array(
			'tp_tipo_personal' => $_datos['tipo_personal'],
			'tp_especialidad' => $_datos['especialidad']
		);
		$this->db->where('tp_id', $_datos['id']);
		$query = $this->db->update('tipo_personal', $data);
		return $query;
	}

	function cambiarEstado($_tipo_personal_id, $_estado){
		log_message('debug', "**** TipoPersonal_model - cambiarEstado - _tipo_personal_id -> $_tipo_personal_id");
		log_message('debug', "**** TipoPersonal_model - cambiarEstado - _estado -> $_estado");

		$this->db->where('tp_id', $_tipo_personal_id);

		if ($_estado == 1) {
			$data = array('tp_estado' => 'ACTIVO');
		}else {
			$data = array('tp_estado' => 'INACTIVO');
		}
		return $this->db->update('tipo_personal', $data);
	}
}