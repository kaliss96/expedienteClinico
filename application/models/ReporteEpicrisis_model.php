<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteEpicrisis_model extends CI_Model {

	function EpicrisisExistente(){
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
}	