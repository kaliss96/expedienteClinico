<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicamento_model extends CI_Model {
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

	function crearMedicamento($_datos){
		log_message('debug', '**** Medicamento_model - registro -> '. json_encode($_datos));
		
		$data = array(
			'mct_lote' => $_datos['lote'],
			'mct_nombre' => $_datos['nombre'],
			'mct_gramo' => $_datos['gramo'],
			'm_id' => $_datos['id_marca'],
			'f_id' => $_datos['id_fabricante'],
			'lb_id' => $_datos['id_laboratorio'],
			'um_id' => $_datos['id_unidad_medida'],
			'ps_id' => $_datos['id_pais']

		);
		return $this->db->insert('medicamento', $data);
	}

	function FabricanteExistente(){

		$sql = "SELECT f.f_id AS id_fabricante,
		DATE_FORMAT(f.f_fecha_registro, '%d/%m/%Y') AS fecha_registro, 
		f.f_nombre AS fabricante,
		f.f_estado AS estado
		FROM fabricante f
		WHERE f.f_estado = 'ACTIVO'
		ORDER BY fabricante
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function crearFabricante($_datos){
		log_message('debug', '**** Medicamento_model - registro -> '. json_encode($_datos));
		
		$data = array(
			'f_nombre' => $_datos['fabricante']
		);
		return $this->db->insert('fabricante', $data);
	}

	function actualizarFabricante($_datos){
		log_message('debug', '**** Medicamento_model - actualizarFabricante -> '. json_encode($_datos));
		
		$data = array(
			'f_nombre' => $_datos['fabricante']
		);
		$this->db->where('f_id', $_datos['id_fabricante']);
		$query = $this->db->update('fabricante', $data);
		return $query;

	}

/*	function cambiarEstadoFabricante($_fabricante_id, $_estado){
		log_message('debug', "**** Medicamento_model - cambiarEstado - _fabricante_id -> $_fabricante_id");
		log_message('debug', "**** Medicamento_model - cambiarEstado - _estado -> $_estado");

		$this->db->where('f_id', $_fabricante_id);

		if ($_estado == 1) {
			$data = array('f_estado' => 'ACTIVO');
		}else {
			$data = array('f_estado' => 'INACTIVO');
		}
		return $this->db->update('fabricante', $data);
	}*/

	function LaboratorioExistente(){

		$sql = "SELECT lb.lb_id AS id_laboratorio,
		DATE_FORMAT(lb.lb_fecha_registro, '%d/%m/%Y') AS fecha_registro, 
		lb.lb_nombre AS laboratorio, 
		lb.lb_estado AS estado
		FROM laboratorio lb
		ORDER BY laboratorio
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function crearLaboratorio($_datos){
		log_message('debug', '**** Medicamento_model - registro -> '. json_encode($_datos));
		
		$data = array(
			'lb_nombre' => $_datos['laboratorio']
		);
		return $this->db->insert('laboratorio', $data);
	}

	function actualizarLaboratorio($_datos){
		log_message('debug', '**** Medicamento_model - actualizarLaboratorio -> '. json_encode($_datos));
		
		$data = array(
			'lb_nombre' => $_datos['laboratorio']
		);
		$this->db->where('lb_id', $_datos['id_laboratorio']);
		$query = $this->db->update('laboratorio', $data);
		return $query;

	}

/*	function cambiarEstadoLaboratorio($_laboratorio_id, $_estado){
		log_message('debug', "**** Medicamento_model - cambiarEstado - _laboratorio_id -> $_laboratorio_id");
		log_message('debug', "**** Medicamento_model - cambiarEstado - _estado -> $_estado");

		$this->db->where('lb_id', $_laboratorio_id);

		if ($_estado == 1) {
			$data = array('lb_estado' => 'ACTIVO');
		}else {
			$data = array('lb_estado' => 'INACTIVO');
		}
		return $this->db->update('laboratorio', $data);
	}*/

	function MarcaExistente(){

		$sql = "SELECT m.m_id AS id_marca,
		DATE_FORMAT(m.m_fecha_registro, '%d/%m/%Y') AS fecha_registro, 
		m.m_nombre AS marca, 
		m.m_estado AS estado
		FROM marca m
        ORDER BY marca
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function crearMarca($_datos){
		log_message('debug', '**** Medicamento_model - registro -> '. json_encode($_datos));
		
		$data = array(
			'm_nombre' => $_datos['marca']
		);
		return $this->db->insert('marca', $data);
	}

	function actualizarMarca($_datos){
		log_message('debug', '**** Medicamento_model - actualizarMarca -> '. json_encode($_datos));
		
		$data = array(
			'm_nombre' => $_datos['marca']
		);
		$this->db->where('m_id', $_datos['id_marca']);
		$query = $this->db->update('marca', $data);
		return $query;

	}

/*	function cambiarEstadoMarca($_marca_id, $_estado){
		log_message('debug', "**** Medicamento_model - cambiarEstado - _marca_id -> $_marca_id");
		log_message('debug', "**** Medicamento_model - cambiarEstado - _estado -> $_estado");

		$this->db->where('m_id', $_marca_id);

		if ($_estado == 1) {
			$data = array('m_estado' => 'ACTIVO');
		}else {
			$data = array('m_estado' => 'INACTIVO');
		}
		return $this->db->update('marca', $data);
	}*/

	function UnidadMedidaExistente(){

		$sql = "SELECT um.um_id AS id_unidad_medida,
		DATE_FORMAT(um.um_fecha_registro, '%d/%m/%Y') AS fecha_registro, 
		um.um_nombre AS unidad_medida, 
		um.um_estado AS estado
		FROM unidad_medida um
        ORDER BY unidad_medida
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function crearUnidadMedida($_datos){
		log_message('debug', '**** Medicamento_model - registro -> '. json_encode($_datos));
		
		$data = array(
			'um_nombre' => $_datos['unidad_medida']
		);
		return $this->db->insert('unidad_medida', $data);
	}

	function actualizarUnidadMedida($_datos){
		log_message('debug', '**** Medicamento_model - actualizarUnidadMedida -> '. json_encode($_datos));
		
		$data = array(
			'um_nombre' => $_datos['unidad_medida']
		);
		$this->db->where('um_id', $_datos['id_unidad_medida']);
		$query = $this->db->update('unidad_medida', $data);
		return $query;

	}

/*	function cambiarEstadoUnidadMedida($_unidad_medida_id, $_estado){
		log_message('debug', "**** Medicamento_model - cambiarEstado - _unidad_medida_id -> $_unidad_medida_id");
		log_message('debug', "**** Medicamento_model - cambiarEstado - _estado -> $_estado");

		$this->db->where('um_id', $_unidad_medida_id);

		if ($_estado == 1) {
			$data = array('um_estado' => 'ACTIVO');
		}else {
			$data = array('um_estado' => 'INACTIVO');
		}
		return $this->db->update('unidad_medida', $data);
	}*/

	function PaisExistente(){

		$sql = "SELECT ps.ps_id AS id_pais,
		DATE_FORMAT(ps.ps_fecha_registro, '%d/%m/%Y') AS fecha_registro, 
		ps.ps_nombre AS pais, 
		ps.ps_estado AS estado
		FROM pais ps
        ORDER BY pais
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function crearPais($_datos){
		log_message('debug', '**** Medicamento_model - registro -> '. json_encode($_datos));
		
		$data = array(
			'ps_nombre' => $_datos['pais']
		);
		return $this->db->insert('pais', $data);
	}

	function actualizarPais($_datos){
		log_message('debug', '**** Medicamento_model - actualizarPais -> '. json_encode($_datos));
		
		$data = array(
			'ps_nombre' => $_datos['pais']
		);
		$this->db->where('ps_id', $_datos['id_pais']);
		$query = $this->db->update('pais', $data);
		return $query;

	}

/*	function cambiarEstadoPais($_pais_id, $_estado){
		log_message('debug', "**** Medicamento_model - cambiarEstado - _pais_id -> $_pais_id");
		log_message('debug', "**** Medicamento_model - cambiarEstado - _estado -> $_estado");

		$this->db->where('ps_id', $_pais_id);

		if ($_estado == 1) {
			$data = array('ps_estado' => 'ACTIVO');
		}else {
			$data = array('ps_estado' => 'INACTIVO');
		}
		return $this->db->update('pais', $data);
	}*/

	function actualizar($_datos){
		log_message('debug', '**** Medicamento_model - actualizar -> '. json_encode($_datos));
		
		$data = array(
			'mct_lote' => $_datos['lote'],
			'mct_nombre' => $_datos['nombre'],
			'mct_gramo' => $_datos['gramo'],
			'm_id' => $_datos['id_marca'],
			'f_id' => $_datos['id_fabricante'],
			'lb_id' => $_datos['id_laboratorio'],
			'um_id' => $_datos['id_unidad_medida'],
			'ps_id' => $_datos['id_pais']
		);
		$this->db->where('mct_id', $_datos['id']);
		$query = $this->db->update('medicamento', $data);
		return $query;

	}

/*	function cambiarEstado($_medicamento_id, $_estado){
		log_message('debug', "**** Medicamento_model - cambiarEstado - _medicamento_id -> $_medicamento_id");
		log_message('debug', "**** Medicamento_model - cambiarEstado - _estado -> $_estado");

		$this->db->where('mct_id', $_medicamento_id);

		if ($_estado == 1) {
			$data = array('mct_estado' => 'ACTIVO');
		}else {
			$data = array('mct_estado' => 'INACTIVO');
		}
		return $this->db->update('medicamento', $data);
	}*/	
}