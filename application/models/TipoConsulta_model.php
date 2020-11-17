<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoConsulta_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	function TipoConsultaExistente(){

		$sql = "SELECT tc.tpc_id AS id, tc.p_id AS paciente_id, p.p_num_expediente AS num_expediente, 
				DATE_FORMAT(tc.tpc_fecha_registro, '%d/%m/%Y') as fecha_registro,
				p.p_nombre_paciente AS nombre_paciente, p.p_apellido_paciente AS apellido_paciente,
				tc.tpc_tipo_especialidad_consulta AS especialidad_consulta,
				tc.tcp_estado AS estado 
			FROM tipo_consulta tc
			INNER JOIN paciente p ON p.p_id = tc.p_id
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function TipoConsultaActiva(){
		$sql = "
			SELECT tc.tpc_id AS id_tipo_consulta, 
				tc.tpc_tipo_especialidad_consulta AS especialidad_consulta
			FROM tipo_consulta tc
				WHERE tc.tcp_estado = 'ACTIVO'
				ORDER BY tpc_tipo_especialidad_consulta
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function crearTipoConsulta($_datos){
		log_message('debug', '**** TipoConsulta_model - registro -> '. json_encode($_datos));
		
		$data = array(
			'p_id' => $_datos['id_paciente'],
			'tpc_tipo_especialidad_consulta' => $_datos['especialidad_consulta']
		);
		return $this->db->insert('tipo_consulta', $data);
	}

	function actualizar($_datos){
		log_message('debug', '**** TipoConsulta_model - actualizar -> '. json_encode($_datos));
		
		$data = array(
			'tpc_tipo_especialidad_consulta' => $_datos['especialidad_consulta']
		);
		$this->db->where('tpc_id', $_datos['id']);
		$query = $this->db->update('tipo_consulta', $data);
		return $query;

	}

	function cambiarEstado($_tipoConsulta_id, $_estado){
		log_message('debug', "**** TipoConsulta_model - cambiarEstado - _tipoConsulta_id -> $_tipoConsulta_id");
		log_message('debug', "**** TipoConsulta_model - cambiarEstado - _estado -> $_estado");
		log_message('debug', "**** TipoConsulta_model - cambiarEstado - session -> " . json_encode($session));

		$this->db->where('tpc_id', $_tipoConsulta_id);

		if ($_estado == 1) {
			$data = array('tcp_estado' => 'ACTIVO');
		}else {
			$data = array('tcp_estado' => 'INACTIVO');
		}
		$this->db->set($data);
		return $this->db->update('tipo_consulta');
	}	
}