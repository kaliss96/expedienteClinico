<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteExpediente_model extends CI_Model {

	function ExpedienteExistente(){
		$sql = "
			SELECT p.p_id AS id, exp.exp_id AS id_expediente, p.p_num_expediente AS numero, 
				DATE_FORMAT(p.p_fecha_registro, '%d/%m/%Y') as fecha_registro, 
					p.p_nombre_paciente AS nombre_paciente, p.p_apellido_paciente AS apellido,
					p.p_fecha_nacimiento AS fecha_nacimiento, p.p_cedula AS cedula,
					p.p_celular AS celular, p.p_telefono AS telefono, p.p_correo AS correo,
					p.p_direccion AS direccion, p.p_estado_civil AS estaddo_civil,
					p.p_tipo_sangre AS tipo_sangre, p.p_sexo AS sexo, p.p_estado AS estado,
					exp.exp_pulso AS pulso, exp.exp_tension_arterial AS tension_arterial,
					exp.exp_frecuencia_cardiaca AS frecuencia_cardiaca, 
					exp.exp_frecuencia_reumatoide AS frecuencia_reumatoide,
					exp.exp_estatura AS estatura, exp.exp_peso AS peso, 
					exp.exp_indice_masa_corporal AS indice_masa_corporal, exp.exp_evolucion AS evolucion,
					exp.exp_sintomas AS sintomas, exp.exp_enfermedad AS enfermedad, 
				    exp.exp_detalle_enfermedad AS detalle_enfermedad, exp.exp_tratamiento AS tratamiento
				FROM paciente p
				INNER JOIN expediente exp ON exp.p_id = p.p_id
		";

 		$result = $this->db->query($sql);
		return $result->result();
	}

	function DetalleExpediente($num_exp){
		$sql = "
			SELECT p.p_id AS id, exp.exp_id AS id_expediente, p.p_num_expediente AS numero, 
				DATE_FORMAT(p.p_fecha_registro, '%d/%m/%Y') as fecha_registro, 
					p.p_nombre_paciente AS nombre_paciente, 
					p.p_apellido_paciente AS apellido,
					p.p_fecha_nacimiento AS fecha_nacimiento, p.p_cedula AS cedula,
					p.p_celular AS celular, p.p_telefono AS telefono, p.p_correo AS correo,
					p.p_direccion AS direccion, p.p_estado_civil AS estaddo_civil,
					p.p_tipo_sangre AS tipo_sangre, p.p_sexo AS sexo, 
					exp.exp_pulso AS pulso, exp.exp_tension_arterial AS tension_arterial,
					exp.exp_frecuencia_cardiaca AS frecuencia_cardiaca, 
					exp.exp_frecuencia_reumatoide AS frecuencia_reumatoide,
					exp.exp_estatura AS estatura, exp.exp_peso AS peso, exp.exp_evolucion AS evolucion,
					exp.exp_sintomas AS sintomas, exp.exp_enfermedad AS enfermedad, 
				    exp.exp_detalle_enfermedad AS detalle_enfermedad, exp.exp_tratamiento AS tratamiento
				FROM paciente p
				INNER JOIN expediente exp ON exp.p_id = p.p_id
				WHERE p_num_expediente = $num_exp
		";

 		$result = $this->db->query($sql);
		return $result->result();
	}
}	