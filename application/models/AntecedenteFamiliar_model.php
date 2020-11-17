<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AntecedenteFamiliar_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	function AntecedenteFamiliarExistente(){

		$sql = "SELECT af.af_id AS id, af.p_id AS paciente_id, p.p_num_expediente AS num_expediente, 
		DATE_FORMAT(af.af_fecha_registro, '%d/%m/%Y') AS fecha_registro,
		p.p_nombre_paciente AS nombre_paciente, p.p_apellido_paciente AS apellido_paciente,
		af.af_familiar AS familiar, af.af_padecimiento AS padecimiento, af.af_estado AS estado
		FROM antecedente_familiar af
		INNER JOIN paciente p ON p.p_id = af.p_id
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function crearAntecedenteFamiliar($_datos){
		log_message('debug', '**** AntecedenteFamiliar_model - registro -> '. json_encode($_datos));
		
		$data = array(
			'p_id' => $_datos['id_paciente'],
			'af_familiar' => $_datos['familiar'],
			'af_padecimiento' => $_datos['padecimiento']
		);
		return $this->db->insert('antecedente_familiar', $data);
	}

	function actualizar($_datos){
		log_message('debug', '**** AntecedenteFamiliar_model - actualizar -> '. json_encode($_datos));
		
		$data = array(
			'af_familiar' => $_datos['familiar'],
			'af_padecimiento' => $_datos['padecimiento']
		);
		$this->db->where('af_id', $_datos['id']);
		$query = $this->db->update('antecedente_familiar', $data);
		return $query;

	}

	function cambiarEstado($_antecedentefamiliar_id, $_estado){
		log_message('debug', "**** AntecedenteFamiliar_model - cambiarEstado - _antecedentefamiliar_id -> $_antecedentefamiliar_id");
		log_message('debug', "**** AntecedenteFamiliar_model - cambiarEstado - _estado -> $_estado");

		$this->db->where('af_id', $_antecedentefamiliar_id);

		if ($_estado == 1) {
			$data = array('af_estado' => 'ACTIVO');
		}else {
			$data = array('af_estado' => 'INACTIVO');
		}
		$this->db->set($data);
		return $this->db->update('antecedente_familiar');
	}	
}