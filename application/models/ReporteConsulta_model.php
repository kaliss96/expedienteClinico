<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteConsulta_model extends CI_Model {

	function ReporteConsultaExistente(){
		$sql = "
			SELECT exp.exp_id AS id,
		exp.p_id AS paciente_id, p.p_num_expediente AS num_expediente,
		p.p_nombre_paciente AS nombre_paciente, p.p_apellido_paciente AS apellido_paciente,
		DATE_FORMAT(exp.exp_fecha_registro, '%d/%m/%Y') AS fecha_registro,
		exp.exp_sintomas AS sintomas, 
		exp.exp_enfermedad AS enfermedad, 
        exp.exp_detalle_enfermedad AS detalle_enfermedad, 
		exp.exp_tratamiento AS tratamiento, 
        exp.exp_orden_examen AS orden_examen, exp.exp_detalle_orden AS detalle_orden, 
		exp.exp_estado AS estado 
	FROM expediente exp
		INNER JOIN paciente p ON p.p_id = exp.p_id
		";

 		$result = $this->db->query($sql);
		return $result->result();
	}

	function DetalleReporteConsulta($num_exp){
		$sql = "
			SELECT exp.exp_id AS id,
		exp.p_id AS paciente_id, p.p_num_expediente AS num_expediente,
		p.p_nombre_paciente AS nombre_paciente, p.p_apellido_paciente AS apellido_paciente,
		DATE_FORMAT(exp.exp_fecha_registro, '%d/%m/%Y') AS fecha_registro,
		exp.exp_sintomas AS sintomas, 
		exp.exp_enfermedad AS enfermedad, 
        exp.exp_detalle_enfermedad AS detalle_enfermedad, 
		exp.exp_tratamiento AS tratamiento, 
        exp.exp_orden_examen AS orden_examen, exp.exp_detalle_orden AS detalle_orden, 
		exp.exp_estado AS estado 
	FROM expediente exp
		INNER JOIN paciente p ON p.p_id = exp.p_id
			WHERE p_num_expediente = $num_exp
		";

 		$result = $this->db->query($sql);
		return $result->result();
	}
}	