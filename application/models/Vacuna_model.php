<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vacuna_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	function VacunasExistentes(){

		$sql = "SELECT v.v_id AS id, p.p_num_expediente AS num_expediente, v.p_id AS paciente_id, 
		DATE_FORMAT(v.v_fecha_registro, '%d/%m/%Y') as fecha_registro,
		p.p_nombre_paciente AS nombre_paciente, p.p_apellido_paciente AS apellido_paciente,
		DATE_FORMAT(v.v_fecha_vacuna, '%d/%m/%Y') as fecha_vacuna,
		v.v_nombre_vacuna AS nombre_vacuna, v.v_notas AS notas, 
		v.v_estado AS estado 
		FROM vacuna v
		INNER JOIN paciente p ON p.p_id = v.p_id
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function crearVacunas($_datos){
		log_message('debug', '**** Vacuna_model - registro -> '. json_encode($_datos));
		
		$sql = "INSERT INTO vacuna (p_id, v_fecha_vacuna, v_nombre_vacuna, v_notas)

		VALUES('".$_datos['id_paciente']."', STR_TO_DATE('".$_datos['fecha_vacuna']."', '%d/%m/%Y'), 
		'".$_datos['nombre_vacuna']."', '".$_datos['notas']."')";
		
			return $this->db->query($sql);
	}

	function actualizar($_datos){
		log_message('debug', '**** Vacuna_model - actualizar -> '. json_encode($_datos));
		
		$sql = " UPDATE vacuna SET 
			v_fecha_vacuna = STR_TO_DATE('".$_datos['fecha_vacuna']."', '%d/%m/%Y'),			
			v_nombre_vacuna = '".$_datos['nombre_vacuna']."',
			v_notas = '".$_datos['notas']."'
			WHERE v_id = ".$_datos['id']."
			";
		$query = $this->db->query($sql);
		return $query;

	}

	function cambiarEstado($_vacuna_id, $_estado){
		log_message('debug', "**** Vacuna_model - cambiarEstado - _vacuna_id -> $_vacuna_id");
		log_message('debug', "**** Vacuna_model - cambiarEstado - _estado -> $_estado");

		$this->db->where('v_id', $_vacuna_id);

		if ($_estado == 1) {
			$data = array('v_estado' => 'ACTIVO');
		}else {
			$data = array('v_estado' => 'INACTIVO');
		}
		return $this->db->update('vacuna', $data);
	}	
}