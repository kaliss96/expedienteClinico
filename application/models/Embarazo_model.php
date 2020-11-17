<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Embarazo_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	function EmbarazoExistente(){

		$sql = "SELECT emb.emb_id AS id, 
			emb.p_id AS paciente_id, p.p_num_expediente AS num_expediente,
			DATE_FORMAT(emb.emb_fecha_registro, '%d/%m/%Y') AS fecha_registro,
			p.p_nombre_paciente AS nombre_paciente, p.p_apellido_paciente AS apellido_paciente,
			p.p_cedula AS cedula,
			emb.emb_problema_embarazo AS problema_embarazo, emb.emb_descripcion AS descripcion,
			emb.emb_estado AS estado
		FROM embarazo emb
		INNER JOIN paciente p ON p.p_id = emb.p_id
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function crearembarazo($_datos){
		log_message('debug', '**** Embarazo_model - registro -> '. json_encode($_datos));
		
		$data = array(
			'p_id' => $_datos['id_paciente'],
			'emb_problema_embarazo' => $_datos['problema_embarazo'],
			'emb_descripcion' => $_datos['descripcion']
		);
		return $this->db->insert('embarazo', $data);
	}

	function actualizar($_datos){
		log_message('debug', '**** Embarazo_model - actualizar -> '. json_encode($_datos));
		
		$data = array(
			'emb_problema_embarazo' => $_datos['problema_embarazo'],
			'emb_descripcion' => $_datos['descripcion']
		);
		$this->db->where('emb_id', $_datos['id']);
		$query = $this->db->update('embarazo', $data);
		return $query;

	}

	function cambiarEstado($_embarazo_id, $_estado){
		log_message('debug', "**** Embarazo_model - cambiarEstado - _embarazo_id -> $_embarazo_id");
		log_message('debug', "**** Embarazo_model - cambiarEstado - _estado -> $_estado");

		$this->db->where('emb_id', $_embarazo_id);

		if ($_estado == 1) {
			$data = array('emb_estado' => 'ACTIVO');
		}else {
			$data = array('emb_estado' => 'INACTIVO');
		}
		$this->db->set($data);
		return $this->db->update('embarazo');
	}	
}