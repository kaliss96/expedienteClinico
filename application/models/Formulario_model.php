<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formulario_model extends CI_Model {

	function formulariosExistentes(){

		$sql = "
			SELECT f.frm_id as id, f.frm_nombre as nombre, f.frm_descripcion as descripcion, 
				f.frm_estado as estado, f.frm_controlador as controlador, f.men_id as menu_id
			FROM formulario f
			GROUP BY frm_nombre, frm_estado
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function crearFormulario($_datos){
		
		log_message('debug', '**** formulario_model - registro -> '. json_encode($_datos) );		
	
		$data = array(
			'frm_nombre' => $_datos['nombre'],
			'frm_descripcion' => $_datos['descripcion'],
			'frm_controlador' => $_datos['controlador'],
			'men_id' => $_datos['id_menu']
		);
		return $this->db->insert('formulario', $data);
	}

	function actualizar($_datos){

	log_message('debug', '**** formulario_model - actualizar -> '. json_encode($_datos));

		$data = array(
			'frm_nombre' => $_datos['nombre'],
			'frm_descripcion' => $_datos['descripcion'],
			'frm_controlador' => $_datos['controlador'],
			'men_id' => $_datos['id_menu']
		);
		$this->db->where('frm_id', $_datos['id']);
		$query = $this->db->update('formulario', $data);
		return $query;
	}

	function cambiarEstado($_formulario_id, $_estado){
		log_message('debug', "**** formulario_model - cambiarEstado - _formulario_id -> $_formulario_id");
		log_message('debug', "**** formulario_model - cambiarEstado - _estado -> $_estado");

		$this->db->where('frm_id', $_formulario_id);

		if ($_estado == 1){
			$data = array('frm_estado' => 'ACTIVO');
		}
		else {
			$data = array('frm_estado' => 'INACTIVO');			
		}
		return $this->db->update('formulario', $data);
	}
}