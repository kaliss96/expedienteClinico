<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class DetalleFactura_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	function DetalleFacturaExistente(){

		$sql = "SELECT LPAD(df.df_id,7,'0') AS id, df.p_id AS id_paciente, 
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

	function crearDetalleFactura($_datos){
		log_message('debug', '**** DetalleFactura_model - registro -> '. json_encode($_datos));
		
		$data = array(
			'p_id' => $_datos['id_paciente'],
			'tpc_id' => $_datos['id_tipo_consulta'],
			'dtf_contado' => $_datos['contado'],
			'df_precio' => $_datos['precio_consulta']
		);
		return $this->db->insert('detalle_factura', $data);
	}

	function actualizar($_datos){
		log_message('debug', '**** DetalleFactura_model - actualizar -> '. json_encode($_datos));
		
		$data = array(
			'tpc_id' => $_datos['id_tipo_consulta'],
			'dtf_contado' => $_datos['contado'],
			'df_precio' => $_datos['precio_consulta']
		);
		$this->db->where('df_id', $_datos['id']);
		$query = $this->db->update('detalle_factura', $data);
		return $query;
	}

/*	function cancelarDetalle($_detallefactura_id){
		log_message('debug', "**** DetalleFactura_model - cancelarDetalle - _detallefactura_id -> $_detallefactura_id");

		$this->db->where('df_id', $_detallefactura_id);

		$this->db->set('df_estado', 'INACTIVO');
		return $this->db->update('detalle_factura');
	}*/

	function otorgarDetalleFactura($detallefactura_id, $_estado){

		$session = $this->session->userdata('logged_in');
		log_message('debug', "**** DetalleFactura_model - otorgarDetalleFactura - detallefactura_id -> $detallefactura_id");
		log_message('debug', "**** DetalleFactura_model - otorgarDetalleFactura - _estado -> $_estado");
		log_message('debug', "**** DetalleFactura_model - otorgarDetalleFactura - session -> " . json_encode($session));

		$this->db->where('df_id', $detallefactura_id);

		if ($_estado == 1) {
			$data = array(
				'df_estado' => 'ACTIVO'
			);
		}else {
			$data = array(
				'df_estado' => 'INACTIVO'
			);
		}

		$this->db->set($data);
		return $this->db->update('detalle_factura');
	}

}	