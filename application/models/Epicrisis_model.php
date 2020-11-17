<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Epicrisis_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	function EpicrisisExistente(){

		$sql = "SELECT e.epc_id AS id, e.p_id AS paciente_id,
		DATE_FORMAT(e.epc_fecha_registro, '%d/%m/%Y') AS fecha_registro,
        p.p_nombre_paciente AS nombre_paciente, p.p_apellido_paciente AS apellido_paciente,
        p.p_num_expediente AS num_expediente, p.p_cedula AS cedula,
		e.epc_clinica AS clinica, e.epc_sala AS sala, e.epc_no_cama AS no_cama,
		e.epc_enfermedad AS enfermedad, e.epc_complicaciones AS complicaciones,
		e.epc_examenes_realizados AS examenes_realizados, e.epc_tratamientos_recibidos AS tratamientos_recibidos, 
		e.epc_diagnostico_ingreso AS diagnostico_ingreso, e.epc_diagnostico_egreso AS diagnostico_egreso,
		e.epc_resultado_examen AS resultado_examen, e.epc_cirugia AS cirugia, e.epc_motivo_cirugia AS motivo_cirugia,
		e.epc_estado AS estado
		FROM epicrisis e
        INNER JOIN paciente p ON p.p_id = e.p_id
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function DetalleEpicrisis($num_exp){
		$sql = "
			SELECT e.epc_id AS id, e.p_id AS paciente_id,
					DATE_FORMAT(e.epc_fecha_registro, '%d/%m/%Y') AS fecha_registro,
			        p.p_nombre_paciente AS nombre_paciente, p.p_apellido_paciente AS apellido_paciente,
			        p.p_num_expediente AS num_expediente, p.p_cedula AS cedula,
					e.epc_clinica AS clinica, e.epc_sala AS sala, e.epc_no_cama AS no_cama,
					e.epc_enfermedad AS enfermedad, e.epc_complicaciones AS complicaciones,
					e.epc_examenes_realizados AS examenes_realizados, e.epc_tratamientos_recibidos AS tratamientos_recibidos, 
					e.epc_diagnostico_ingreso AS diagnostico_ingreso, e.epc_diagnostico_egreso AS diagnostico_egreso,
					e.epc_resultado_examen AS resultado_examen, e.epc_cirugia AS cirugia, e.epc_motivo_cirugia AS motivo_cirugia,
					e.epc_estado AS estado
				FROM epicrisis e
		        	INNER JOIN paciente p ON p.p_id = e.p_id
				WHERE p_num_expediente = $num_exp
		";

 		$result = $this->db->query($sql);
		return $result->result();
	}

	function crearEpicrisis($_datos){
		log_message('debug', '**** Epicrisis_model - registro -> '. json_encode($_datos));
		
		$data = array(
			'p_id' => $_datos['id_paciente'],
			'epc_clinica' => $_datos['clinica'],
			'epc_sala' => $_datos['sala'],
			'epc_no_cama' => $_datos['no_cama'],
			'epc_enfermedad' => $_datos['enfermedad'],
			'epc_complicaciones' => $_datos['complicaciones'],
			'epc_examenes_realizados' => $_datos['examenes_realizados'],
			'epc_tratamientos_recibidos' => $_datos['tratamientos_recibidos'],
			'epc_diagnostico_ingreso' => $_datos['diagnostico_ingreso'],
			'epc_diagnostico_egreso' => $_datos['diagnostico_egreso'],
			'epc_resultado_examen' => $_datos['resultado_examen'],
			'epc_cirugia' => $_datos['cirugia'],
			'epc_motivo_cirugia' => $_datos['motivo_cirugia']
		);
		return $this->db->insert('epicrisis', $data);
	}

	function actualizar($_datos){
		log_message('debug', '**** Epicrisis_model - actualizar -> '. json_encode($_datos));
		
		$data = array(
			'epc_clinica' => $_datos['clinica'],
			'epc_sala' => $_datos['sala'],
			'epc_no_cama' => $_datos['no_cama'],
			'epc_enfermedad' => $_datos['enfermedad'],
			'epc_complicaciones' => $_datos['complicaciones'],
			'epc_examenes_realizados' => $_datos['examenes_realizados'],
			'epc_tratamientos_recibidos' => $_datos['tratamientos_recibidos'],
			'epc_diagnostico_ingreso' => $_datos['diagnostico_ingreso'],
			'epc_diagnostico_egreso' => $_datos['diagnostico_egreso'],
			'epc_resultado_examen' => $_datos['resultado_examen'],
			'epc_cirugia' => $_datos['cirugia'],
			'epc_motivo_cirugia' => $_datos['motivo_cirugia']
		);
		$this->db->where('epc_id', $_datos['id']);
		$query = $this->db->update('epicrisis', $data);
		return $query;

	}

	function cambiarEstado($_epicrisis_id, $_estado){
		log_message('debug', "**** Epicrisis_model - cambiarEstado - _epicrisis_id -> $_epicrisis_id");
		log_message('debug', "**** Epicrisis_model - cambiarEstado - _estado -> $_estado");

		$this->db->where('epc_id', $_epicrisis_id);

		if ($_estado == 1) {
			$data = array('epc_estado' => 'ACTIVO');
		}else {
			$data = array('epc_estado' => 'INACTIVO');
		}
		$this->db->set($data);
		return $this->db->update('epicrisis');
	}	
}