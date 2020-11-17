<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProveedorMedicamento_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	function ProveedoresExistentes(){

		$sql = "SELECT pm_id AS id, 
		DATE_FORMAT(pm_fecha_registro, '%d/%m/%Y') AS fecha_registro,
		pm_nombre AS nombre,
		pm_apellido AS apellido, pm_cedula AS cedula, pm_celular AS celular, 
		pm_telefono AS telefono, pm_correo AS correo, pm_direccion AS direccion,
		pm_estado AS estado
		FROM proveedor_medicamento
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function crearProveedores($_datos){
		log_message('debug', '**** ProveedorMedicamento_model - registro -> '. json_encode($_datos));
		
		$data = array(
					'pm_nombre' => $_datos['nombre'],
					'pm_apellido' => $_datos['apellido'],
					'pm_cedula' => $_datos['cedula'],
					'pm_celular' => $_datos['celular'],
					'pm_telefono' => $_datos['telefono'],
					'pm_correo' => $_datos['correo'],
					'pm_direccion' => $_datos['direccion']
				);
				return $this->db->insert('proveedor_medicamento', $data);
	}

	function actualizar($_datos){
		log_message('debug', '**** ProveedorMedicamento_model - actualizar -> '. json_encode($_datos));
		
		$data = array(
			'pm_nombre' => $_datos['nombre'],
			'pm_apellido' => $_datos['apellido'],
			'pm_cedula' => $_datos['cedula'],
			'pm_celular' => $_datos['celular'],
			'pm_telefono' => $_datos['telefono'],
			'pm_correo' => $_datos['correo'],
			'pm_direccion' => $_datos['direccion']
		);
		$this->db->where('pm_id', $_datos['id']);
		$query = $this->db->update('proveedor_medicamento', $data);
		return $query;

	}

	function cambiarEstado($_proveedormedicamento_id, $_estado){
		log_message('debug', "**** ProveedorMedicamento_model - cambiarEstado - _proveedormedicamento_id -> $_proveedormedicamento_id");
		log_message('debug', "**** ProveedorMedicamento_model - cambiarEstado - _estado -> $_estado");

		$this->db->where('pm_id', $_proveedormedicamento_id);

		if ($_estado == 1) {
			$data = array('pm_estado' => 'ACTIVO');
		}else {
			$data = array('pm_estado' => 'INACTIVO');
		}
		return $this->db->update('proveedor_medicamento', $data);
	}	
}