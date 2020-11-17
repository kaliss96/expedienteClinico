<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class perfil_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	function perfilesExistentes(){
		$sql = "
			SELECT p.prf_id as id, p.prf_nombre as nombre, p.prf_descripcion as descripcion, 
			p.prf_fecha_habilitar as fecha,
			p.prf_estado as estado
			FROM perfil p
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function perfilesActivos(){
		$sql = "
			SELECT p.prf_id as id_perfil, p.prf_nombre as nombre
			FROM perfil p
			WHERE p.prf_estado = 'ACTIVO'
			ORDER BY prf_nombre
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function existeFormularioPerfil($_formulario_id, $_perfil_id){
		$sql = "SELECT true as existe
			FROM formulario f
			INNER JOIN prf_form pf ON pf.frm_id = f.frm_id
			WHERE pf.prf_id = $_perfil_id AND f.frm_id = $_formulario_id";

		$result = $this->db->query($sql);
		return $result->row() ? true : false;
	}

	function crearPerfil($_datos){
		
		log_message('debug', '**** perfil_model - registro -> '. json_encode($_datos) );
		
		$data = array(
			'prf_nombre' => $_datos['nombre'],
			'prf_descripcion' => $_datos['descripcion']
		);
		
		$insert_id = $this->db->insert('perfil', $data);
		
		//seleccionar el ultimo insert mediante el ID
		$query = $this->db->query('SELECT LAST_INSERT_ID()');
		$row = $query->row_array();
		return $row['LAST_INSERT_ID()'];
		
	}
	
	function crearPerfilxFormulario($_datos){
		
		log_message('debug', '**** perfil_model - crearPerfilxFormulario ->'.json_encode($_datos));
		
		$data = array(
			'prf_id' => $_datos['perfil_id'],
			'frm_id' => $_datos['form_id'],
			'prfm_lectura' => $_datos['lectura'],
			'prfm_inserta' => $_datos['escritura'],
			'prfm_actualiza' => $_datos['actualiza'],
			'prfm_elimina' => $_datos['elimina']
		);
		
		$result = $this->db->insert('prf_form', $data);
		return  $result;
	}

	function actualizarPerfilxFormulario($_datos){

		log_message('debug', '**** perfil_model - actualizarPerfilxFormulario ->'.json_encode($_datos));
		
		$data = array(
			'prfm_lectura' => $_datos['lectura'],
			'prfm_inserta' => $_datos['escritura'],
			'prfm_actualiza' => $_datos['actualiza'],
			'prfm_elimina' => $_datos['elimina']
		);
		$this->db->where("prf_id", $_datos['perfil_id']);
		$this->db->where("frm_id", $_datos['form_id']);
		$result = $this->db->update('prf_form', $data);
		return  $result;
	}

	function actualizar($_datos){

		log_message('debug', '**** perfil_model - actualizar -> '. json_encode($_datos));

		$data = array(			
			'prf_nombre' => $_datos['nombre'],
			'prf_descripcion' => $_datos['descripcion']
		);
		$this->db->where('prf_id', $_datos['id']);
		$query = $this->db->update('perfil', $data);
		return $query;
	}

	function cambiarEstado($_perfil_id, $_estado){
		log_message('debug', "**** perfil_model - cambiarEstado - _perfil_id -> $_perfil_id");
		log_message('debug', "**** perfil_model - cambiarEstado - _estado -> $_estado");

		$this->db->where('prf_id', $_perfil_id);

		if ($_estado == 1) {
			$data = array('prf_estado' => 'ACTIVO');
		}else {
			$data = array('prf_estado' => 'INACTIVO');
		}
		return $this->db->update('perfil', $data);
	}
}


