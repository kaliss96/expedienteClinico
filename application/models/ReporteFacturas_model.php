<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteFacturas_model extends CI_Model {

	function ReporteFacturasExistente(){
		$sql = "
			SELECT LPAD(df.df_id,7,'0') AS id, df.p_id AS id_paciente, 
					df.tpc_id AS id_tipo_consulta, tc.tpc_tipo_especialidad_consulta AS especialidad_consulta,
					DATE_FORMAT(df.df_fecha_registro, '%d/%m/%Y') AS fecha_registro,
					p.p_nombre_paciente AS nombre_paciente, p.p_apellido_paciente AS apellido_paciente,
					df.dtf_contado AS contado, df.df_precio AS precio_consulta,
					(df.df_precio - df.dtf_contado) AS cambio,
					df.df_precio AS total, df.df_estado AS estado
				FROM paciente  p
					INNER JOIN detalle_factura df ON df.p_id = p.p_id
					INNER JOIN tipo_consulta tc ON tc.p_id = p.p_id
				WHERE df.df_estado = 'ACTIVO'
		";

 		$result = $this->db->query($sql);
		return $result->result();
	}

	function DetalleFacturas($num_fac){
		$sql = "
			SELECT LPAD(df.df_id,7,'0') AS id, df.p_id AS id_paciente, 
					df.tpc_id AS id_tipo_consulta, tc.tpc_tipo_especialidad_consulta AS especialidad_consulta,
					DATE_FORMAT(df.df_fecha_registro, '%d/%m/%Y') AS fecha_registro,
					p.p_nombre_paciente AS nombre_paciente, p.p_apellido_paciente AS apellido_paciente,
					df.dtf_contado AS contado, df.df_precio AS precio_consulta,
					(df.df_precio - df.dtf_contado) AS cambio,
					df.df_precio AS total, df.df_estado AS estado
				FROM paciente  p
					INNER JOIN detalle_factura df ON df.p_id = p.p_id
					INNER JOIN tipo_consulta tc ON tc.p_id = p.p_id
				WHERE df.df_estado = 'ACTIVO'
				WHERE df_id = $num_fac
		";

 		$result = $this->db->query($sql);
		return $result->result();
	}
}	