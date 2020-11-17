<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteEmbarazo_model extends CI_Model {

	function EmbarazoExistente(){
		$sql = "
			SELECT emb.emb_id AS id, 
			emb.p_id AS paciente_id, p.p_num_expediente AS num_expediente,
			DATE_FORMAT(emb.emb_fecha_registro, '%d/%m/%Y') AS fecha_registro,
			p.p_nombre_paciente AS nombre_paciente, p.p_apellido_paciente AS apellido_paciente,
			p.p_cedula AS cedula,
			emb.emb_problema_embarazo AS problema_embarazo, emb.emb_descripcion AS descripcion,
			emb.emb_estado AS estado
		FROM embarazo emb
			INNER JOIN paciente p ON p.p_id = emb.p_id
		";

 		$result = $this->db->query($sql);
		return $result->result();
	}

	function DetalleEmbarazo($num_exp){
		$sql = "
			SELECT emb.emb_id AS id, 
			emb.p_id AS paciente_id, p.p_num_expediente AS num_expediente,
			DATE_FORMAT(emb.emb_fecha_registro, '%d/%m/%Y') AS fecha_registro,
			p.p_nombre_paciente AS nombre_paciente, p.p_apellido_paciente AS apellido_paciente,
			p.p_cedula AS cedula,
			emb.emb_problema_embarazo AS problema_embarazo, emb.emb_descripcion AS descripcion,
			emb.emb_estado AS estado
		FROM embarazo emb
		INNER JOIN paciente p ON p.p_id = emb.p_id
			WHERE p_num_expediente = $num_exp
		";

 		$result = $this->db->query($sql);
		return $result->result();
	}
}	