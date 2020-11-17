<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicamentos_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	function MedicamentoExistente(){

		$sql = "SELECT md.mct_id AS id, m.m_id AS id_marca, f.f_id AS id_fabricante, lb.lb_id AS id_laboratorio, 
		um.um_id AS id_unidad_medida, p.ps_id AS id_pais, DATE_FORMAT(md.mct_fecha_registro, '%d/%m/%Y') as fecha_registro,
		md.mct_lote AS lote, md.mct_nombre AS nombre, um.um_nombre AS unidad_medida, 
		md.mct_gramo AS gramo, m.m_nombre AS marca, f.f_nombre AS fabricante, lb.lb_nombre AS laboratorio, 
		p.ps_nombre AS pais, md.mct_estado AS estado 
		FROM medicamento md
		 INNER JOIN marca m ON m.m_id = md.mct_id 
		 INNER JOIN fabricante f ON f.f_id = md.f_id 
		 INNER JOIN laboratorio lb ON lb.lb_id = md.lb_id 
		 INNER JOIN unidad_medida um ON um.um_id = md.um_id 
		 INNER JOIN pais p ON p.ps_id = md.ps_id
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

		function MedicamentosActivos(){

		$sql = "SELECT md.mct_id AS id, m.m_id AS id_marca, f.f_id AS id_fabricante, lb.lb_id AS id_laboratorio,
		um.um_id AS id_unidad_medida, p.ps_id AS id_pais, DATE_FORMAT(md.mct_fecha_registro, '%d/%m/%Y') as fecha_registro, 
		md.mct_lote AS lote, md.mct_nombre AS nombre, um.um_nombre AS unidad_medida, 
		md.mct_gramo AS gramo, m.m_nombre AS marca, f.f_nombre AS fabricante, lb.lb_nombre AS laboratorio, 
		p.ps_nombre AS pais, md.mct_estado AS estado 
		FROM medicamento md
		INNER JOIN marca m ON m.m_id = md.m_id 
		INNER JOIN fabricante f ON f.f_id = md.f_id 
		INNER JOIN laboratorio lb ON lb.lb_id = md.lb_id 
		INNER JOIN unidad_medida um ON um.um_id = md.um_id 
		INNER JOIN pais p ON p.ps_id = md.ps_id
		/*WHERE f.f_estado = f.f_estado = 'ACTIVO'*/
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function cambiarEstadoMedicamento($_medicamento_id, $_estado){
		log_message('debug', "**** Medicamento_model - cambiarEstado - _medicamento_id -> $_medicamento_id");
		log_message('debug', "**** Medicamento_model - cambiarEstado - _estado -> $_estado");

		$this->db->where('mct_id', $_medicamento_id);

		if ($_estado == 1) {
			$data = array('mct_estado' => 'ACTIVO');
		}else {
			$data = array('mct_estado' => 'INACTIVO');
		}
		return $this->db->update('medicamento', $data);
	}	
}