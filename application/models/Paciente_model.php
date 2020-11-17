<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Paciente_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	function PacientesExistentes(){
		
		$sql = "SELECT p.p_id AS id, p.p_num_expediente AS num_expediente,
		DATE_FORMAT(p.p_fecha_registro, '%d/%m/%Y') AS fecha_registro,
		p.p_nombre_paciente AS nombre_paciente, p.p_apellido_paciente AS apellido_paciente, 
		DATE_FORMAT(p.p_fecha_nacimiento, '%d/%m/%Y') AS fecha_nacimiento,
		p.p_cedula AS cedula, p.p_celular AS celular, p.p_telefono AS telefono, p.p_correo AS correo, 
		p.p_direccion AS direccion, p.p_estado_civil AS estado_civil, p.p_tipo_sangre AS tipo_sangre, 
		p.p_sexo AS sexo, p.p_estado AS estado
		FROM paciente p
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function PacientesActivos(){
		$sql = "
			SELECT p.p_id AS id_Paciente, p.p_num_expediente AS num_expediente
			FROM paciente p
			WHERE p.p_estado = 'ACTIVO'
			ORDER BY num_expediente
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function crearPaciente($_datos){
		log_message('debug', '**** Paciente_model - registro -> '. json_encode($_datos));
		
		$sql = "INSERT INTO paciente (p_num_expediente, p_nombre_paciente, p_apellido_paciente, p_fecha_nacimiento, p_cedula, p_celular, p_telefono, p_correo, p_direccion, p_estado_civil, p_tipo_sangre, p_sexo)

		VALUES('".$_datos['num_expediente']."', '".$_datos['nombre_paciente']."','".$_datos['apellido_paciente']."', 
		STR_TO_DATE('".$_datos['fecha_nacimiento']."', '%d/%m/%Y'), '".$_datos['cedula']."', '".$_datos['celular']."', 
		'".$_datos['telefono']."', '".$_datos['correo']."', '".$_datos['direccion']."', '".$_datos['estado_civil']."', 
		'".$_datos['tipo_sangre']."', '".$_datos['sexo']."' 	
				)";
			return $this->db->query($sql);
	}

	function actualizar($_datos){
		log_message('debug', '**** Paciente_model - actualizar -> '. json_encode($_datos));
		
		$sql = " UPDATE paciente SET 
			p_nombre_paciente = '".$_datos['nombre_paciente']."',
			p_apellido_paciente = '".$_datos['apellido_paciente']."',
			p_fecha_nacimiento = STR_TO_DATE('".$_datos['fecha_nacimiento']."', '%d/%m/%Y'),			
			p_cedula = '".$_datos['cedula']."',
			p_celular = '".$_datos['celular']."',
			p_telefono = '".$_datos['telefono']."',
			p_correo = '".$_datos['correo']."',
			p_direccion = '".$_datos['direccion']."',
			p_estado_civil = '".$_datos['estado_civil']."',
			p_tipo_sangre = '".$_datos['tipo_sangre']."',
			p_sexo = '".$_datos['sexo']."'
			WHERE p_id = ".$_datos['id']."
			";
		$query = $this->db->query($sql);
		return $query;

	}

	function cambiarEstado($_paciente_id, $_estado){
		log_message('debug', "**** Paciente_model - cambiarEstado - _paciente_id -> $_paciente_id");
		log_message('debug', "**** Paciente_model - cambiarEstado - _estado -> $_estado");

		$this->db->where('p_id', $_paciente_id);

		if ($_estado == 1) {
			$data = array('p_estado' => 'ACTIVO');
		}else {
			$data = array('p_estado' => 'INACTIVO');
		}
		return $this->db->update('paciente', $data);
	}
}	