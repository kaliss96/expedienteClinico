<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonalDispensario_model extends CI_Model {

	function PersonalDispensarioExistente(){

		$sql = "SELECT pd.pd_id AS id, pd.tp_id AS tipo_id, pd.pd_cod_minsa AS cod_minsa, tp.tp_especialidad AS especialidad,
		 pd.pd_nombres AS nombres, pd.pd_apellidos AS apellidos, pd.pd_sexo AS sexo,
		 DATE_FORMAT(pd.pd_fecha_registro, '%d/%m/%Y') as fecha_registro,
		 DATE_FORMAT(pd.pd_fecha_nac, '%d/%m/%Y') as fecha_nacimiento,
		 pd.pd_fecha_nac AS fecha_nacimiento, pd.pd_cedula AS cedula, pd.pd_est_civil AS estado_civil, pd.pd_email AS email, 
		 pd.pd_celular AS celular, pd.pd_telf_convencional AS telefono, pd.pd_nacionalidad AS nacionalidad,  
		 pd.pd_estado AS estado
		 FROM personal_dispensario pd
		 INNER JOIN tipo_personal tp 
 		ON tp.tp_id = pd.tp_id";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function registro($_datos){	
		log_message('debug', '**** PersonalDispensario_model - registro -> '. json_encode($_datos) );
		
		$sql = "INSERT INTO personal_dispensario (pd_cod_minsa, tp_id, pd_nombres, pd_apellidos, pd_sexo, pd_fecha_nac, pd_cedula, pd_est_civil, pd_email, pd_celular, pd_telf_convencional, pd_nacionalidad)

		VALUES('".$_datos['cod_minsa']."', '".$_datos['id_tipo']."', '".$_datos['nombres']."', '".$_datos['apellidos']."', 
		'".$_datos['sexo']."', 
		STR_TO_DATE('".$_datos['fecha_nacimiento']."', '%d/%m/%Y'), 
		'".$_datos['cedula']."', '".$_datos['estado_civil']."', '".$_datos['email']."', '".$_datos['celular']."',
		'".$_datos['telefono']."', '".$_datos['nacionalidad']."'
		)";
		
			return $this->db->query($sql);
	}

	function actualizar($_datos){
		log_message('debug', '**** PersonalDispensario_model - actualizar -> '. json_encode($_datos) );
		
		$sql = " UPDATE personal_dispensario SET 
			pd_cod_minsa = '".$_datos['cod_minsa']."',
			tp_id = '".$_datos['id_tipo']."',
			pd_nombres = '".$_datos['nombres']."',
			pd_apellidos = '".$_datos['apellidos']."',
			pd_sexo = '".$_datos['sexo']."',
			pd_fecha_nac = STR_TO_DATE('".$_datos['fecha_nacimiento']."', '%d/%m/%Y'),			
			pd_cedula = '".$_datos['cedula']."',
			pd_est_civil = '".$_datos['estado_civil']."',
			pd_email = '".$_datos['email']."',
			pd_celular = '".$_datos['celular']."',
			pd_telf_convencional = '".$_datos['telefono']."',
			pd_nacionalidad = '".$_datos['nacionalidad']."'
			WHERE pd_id = ".$_datos['id']."
			";
		$query = $this->db->query($sql);
		return $query;
	}

	function cambiarEstado($_personalDispensario_id, $_estado){
		log_message('debug', "**** PersonalDispensario_model - cambiarEstado - _personalDispensario_id -> $_personalDispensario_id");
		log_message('debug', "**** PersonalDispensario_model - cambiarEstado - _estado -> $_estado");

		$this->db->where('pd_id', $_personalDispensario_id);

		if ($_estado == 1) {
			$data = array('pd_estado' => 'ACTIVO');
		}else {
			$data = array('pd_estado' => 'INACTIVO');
		}
		return $this->db->update('personal_dispensario', $data);
	}
}