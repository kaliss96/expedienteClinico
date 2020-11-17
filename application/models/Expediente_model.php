<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expediente_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	function ExpedienteExistente(){

	$sql = "SELECT exp.exp_id AS id,
		exp.p_id AS paciente_id, p.p_num_expediente AS num_expediente,
		p.p_nombre_paciente AS nombre_paciente, p.p_apellido_paciente AS apellido_paciente,
		DATE_FORMAT(exp.exp_fecha_registro, '%d/%m/%Y') AS fecha_registro,
		exp.exp_pulso AS pulso, exp.exp_tension_arterial AS tension_arterial,
		exp.exp_frecuencia_cardiaca AS frecuencia_cardiaca, exp.exp_frecuencia_reumatoide AS frecuencia_reumatoide,
		exp.exp_estatura AS estatura, exp.exp_peso AS peso, exp.exp_sintomas AS sintomas, 
		exp.exp_enfermedad AS enfermedad, exp.exp_evolucion AS evolucion, exp.exp_detalle_enfermedad AS detalle_enfermedad, 
		exp.exp_tratamiento AS tratamiento, 
        exp.exp_orden_examen AS orden_examen, exp.exp_detalle_orden AS detalle_orden, 
		exp.exp_estado AS estado 
	FROM expediente exp
		INNER JOIN paciente p ON p.p_id = exp.p_id
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function crearExpediente($_datos){
		log_message('debug', '**** Expediente_model - registro -> '. json_encode($_datos));

		$sql = "INSERT INTO expediente (p_id, exp_pulso, exp_tension_arterial, exp_frecuencia_cardiaca, exp_frecuencia_reumatoide, exp_estatura, exp_peso)

		VALUES('".$_datos['id_paciente']."', '".$_datos['pulso']."', '".$_datos['tension_arterial']."', '".$_datos['frecuencia_cardiaca']."', 
		'".$_datos['frecuencia_reumatoide']."', '".$_datos['estatura']."', '".$_datos['peso']."')";

		return $this->db->query($sql);
		
		/*$data = array(
			'p_id' => $_datos['id_paciente'],
			'exp_pulso' => $_datos['pulso'],
			'exp_tension_arterial' => $_datos['tension_arterial'],
			'exp_frecuencia_cardiaca' => $_datos['frecuencia_cardiaca'],
			'exp_frecuencia_reumatoide' => $_datos['frecuencia_reumatoide'],
			'exp_estatura' => $_datos['estatura'],
			'exp_peso' => $_datos['peso'],
			'exp_indice_masa_corporal' => $_datos['indice_masa_corporal']
		);
		return $this->db->insert('expediente', $data);*/
	}

	function actualizar($_datos){
		log_message('debug', '**** Expediente_model - actualizar -> '. json_encode($_datos));
		
		$data = array(
			'exp_pulso' => $_datos['pulso'],
			'exp_tension_arterial' => $_datos['tension_arterial'],
			'exp_frecuencia_cardiaca' => $_datos['frecuencia_cardiaca'],
			'exp_frecuencia_reumatoide' => $_datos['frecuencia_reumatoide'],
			'exp_estatura' => $_datos['estatura'],
			'exp_peso' => $_datos['peso'],
			'exp_sintomas' => $_datos['sintomas'],
			'exp_enfermedad' => $_datos['enfermedad'],
			'exp_evolucion' => $_datos['evolucion'],
			'exp_detalle_enfermedad' => $_datos['detalle_enfermedad'],
			'exp_tratamiento' => $_datos['tratamiento'],
			'exp_orden_examen' => $_datos['orden_examen'],
			'exp_detalle_orden' => $_datos['detalle_orden']
		);
		$this->db->where('exp_id', $_datos['id']);
		$query = $this->db->update('expediente', $data);
		return $query;
	}

	function cambiarEstado($_expediente_id, $_estado){
		log_message('debug', "**** Expediente_model - cambiarEstado - _expediente_id -> $_expediente_id");
		log_message('debug', "**** Expediente_model - cambiarEstado - _estado -> $_estado");
		log_message('debug', "**** Expediente_model - cambiarEstado - session -> " . json_encode($session));

		$this->db->where('exp_id', $_expediente_id);

		if ($_estado == 1) {
			$data = array('exp_estado' => 'ACTIVO');
		}else {
			$data = array('exp_estado' => 'INACTIVO');
		}
		$this->db->set($data);
		return $this->db->update('expediente');
	}

}	