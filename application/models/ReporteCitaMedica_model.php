<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteCitaMedica_model extends CI_Model {

	function ReporteCitaMedicaExistente(){
		$sql = "
			SELECT cm_id AS id, p.p_num_expediente AS num_expediente, cm.p_id AS paciente_id, 
			cm.tp_id AS tipo_id, p.p_nombre_paciente AS nombre_paciente,
			p.p_apellido_paciente AS apellido_paciente, p.p_cedula AS cedula,
			tp.tp_especialidad AS especialidad, 
			DATE_FORMAT(cm.cm_fecha_cita_reserva, '%d/%m/%Y') as fecha_cita_reserva,
			DATE_FORMAT(cm.cm_fecha_cita_medica, '%d/%m/%Y') as fecha_cita_medica,
			TIME_FORMAT(cm_hora, '%h:%i %p') as hora,
			cm.cm_descripcion AS descripcion, cm.cm_estado AS estado 
		FROM citas_medicas cm
			INNER JOIN paciente p ON p.p_id = cm.p_id
			INNER JOIN tipo_personal tp ON tp.tp_id = cm.tp_id
		";

 		$result = $this->db->query($sql);
		return $result->result();
	}

	function DetalleReporteCitaMedica($num_exp){
		$sql = "
			SELECT cm_id AS id, p.p_num_expediente AS num_expediente, cm.p_id AS paciente_id, 
			cm.tp_id AS tipo_id, p.p_nombre_paciente AS nombre_paciente,
			p.p_apellido_paciente AS apellido_paciente, p.p_cedula AS cedula,
			tp.tp_especialidad AS especialidad, 
			DATE_FORMAT(cm.cm_fecha_cita_reserva, '%d/%m/%Y') as fecha_cita_reserva,
			DATE_FORMAT(cm.cm_fecha_cita_medica, '%d/%m/%Y') as fecha_cita_medica,
			TIME_FORMAT(cm_hora, '%h:%i %p') as hora,
			cm.cm_descripcion AS descripcion, cm.cm_estado AS estado 
		FROM citas_medicas cm
			INNER JOIN paciente p ON p.p_id = cm.p_id
			INNER JOIN tipo_personal tp ON tp.tp_id = cm.tp_id
			WHERE p_num_expediente = $num_exp
		";

 		$result = $this->db->query($sql);
		return $result->result();
	}
}	