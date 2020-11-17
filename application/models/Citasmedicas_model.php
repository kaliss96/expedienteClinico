<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Citasmedicas_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	function CitasMedicasExistentes(){

		$sql = "SELECT cm_id AS id, p.p_num_expediente AS num_expediente, cm.p_id AS paciente_id, 
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

	function crearCitasMedicas($_datos){
		log_message('debug', '**** Citasmedicas_model - registro -> '. json_encode($_datos));
		
		$sql = "INSERT INTO citas_medicas (p_id, tp_id, cm_fecha_cita_medica, cm_hora, cm_descripcion)

		VALUES('".$_datos['id_paciente']."', '".$_datos['id_tipo']."', STR_TO_DATE('".$_datos['fecha_cita_medica']."', '%d/%m/%Y'), 
		TIME(STR_TO_DATE('". $_datos['hora'] ."', '%h:%i %p')), 
		'".$_datos['descripcion']."')";
		
		return $this->db->query($sql);
	}

	function actualizar($_datos){
		log_message('debug', '**** Citasmedicas_model - actualizar -> '. json_encode($_datos));
		
		$sql = " UPDATE citas_medicas SET 
			cm_fecha_cita_medica = STR_TO_DATE('".$_datos['fecha_cita_medica']."', '%d/%m/%Y'),			
			cm_hora = '".$_datos['hora']."',
			tp_id = '".$_datos['id_tipo']."',
			cm_descripcion = '".$_datos['descripcion']."'
			WHERE cm_id = ".$_datos['id']."
			";
		$query = $this->db->query($sql);
		return $query;

	}

	function cambiarEstado($_citasmedicas_id, $_estado){
		log_message('debug', "**** Citasmedicas_model - cambiarEstado - _citasmedicas_id -> $_citasmedicas_id");
		log_message('debug', "**** Citasmedicas_model - cambiarEstado - _estado -> $_estado");

		$this->db->where('cm_id', $_citasmedicas_id);

		if ($_estado == 1) {
			$data = array('cm_estado' => 'ACTIVO');
		}else {
			$data = array('cm_estado' => 'INACTIVO');
		}
		return $this->db->update('citas_medicas', $data);
	}	
}