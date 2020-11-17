<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Factura_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	function FacturaExistente(){

		$sql = "SELECT f.ftr_contado AS contado, f.ftr_precio_total AS precio, 
			(f.ftr_contado - f.ftr_precio_total) AS cambio,
			f.ftr_precio_total AS total
		FROM factura f
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function crearFactura($_datos){
		log_message('debug', '**** Factura_model - registro -> '. json_encode($_datos));
		
		$data = array(
			'p_id' => $_datos['id_paciente'],
			'ftr_contado' => $_datos['familiar'],
			'af_padecimiento' => $_datos['padecimiento']
		);
		return $this->db->insert('antecedente_familiar', $data);
	}

	function actualizar($_datos){
		log_message('debug', '**** Factura_model - actualizar -> '. json_encode($_datos));
		
		$data = array(
			'ftr_contado' => $_datos['familiar'],
			'af_padecimiento' => $_datos['padecimiento']
		);
		$this->db->where('af_id', $_datos['id']);
		$query = $this->db->update('antecedente_familiar', $data);
		return $query;

	}

	function cambiarEstado($_antecedentefamiliar_id, $_estado){
		log_message('debug', "**** Factura_model - cambiarEstado - _antecedentefamiliar_id -> $_antecedentefamiliar_id");
		log_message('debug', "**** Factura_model - cambiarEstado - _estado -> $_estado");

		$this->db->where('af_id', $_antecedentefamiliar_id);

		if ($_estado == 1) {
			$data = array('af_estado' => 'ACTIVO');
		}else {
			$data = array('af_estado' => 'INACTIVO');
		}
		$this->db->set($data);
		return $this->db->update('antecedente_familiar');
	}	
}