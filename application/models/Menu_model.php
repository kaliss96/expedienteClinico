<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

	function menusExistentes(){
		$sql = "
			SELECT m.men_id as id, m.men_nombre as nombre, m.men_estado as estado
			FROM menu m
			ORDER BY men_estado, men_nombre
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function menusActivos(){
		$sql = "
			SELECT m.men_id as id, m.men_nombre as nombre
			FROM menu m
			where m.men_estado = 'ACTIVO'
			ORDER BY men_nombre
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function obtenerMenusXPerfil($perfil_id){
		$sql = "
			SELECT m.men_id, m.men_nombre, m.men_estado
			FROM menu m
			INNER JOIN formulario f ON f.men_id = m.men_id
			INNER JOIN prf_form pf ON pf.frm_id = f.frm_id
			WHERE pf.prf_id = $perfil_id 
				AND m.men_estado = 'ACTIVO'
				AND f.frm_estado = 'ACTIVO'
				AND pf.prfm_estado = 'ACTIVO'
				AND pf.prfm_lectura = 1
			GROUP BY m.men_id
		";

		$result = $this->db->query($sql);
		return $result->result();
	}

	function obtenerFormulariosPorPerfil($perfil_id){
		$sql = "
			SELECT f.frm_id, f.frm_nombre, f.frm_controlador,
			pf.prfm_lectura, pf.prfm_inserta, pf.prfm_actualiza, pf.prfm_elimina
			FROM formulario f
			INNER JOIN prf_form pf ON pf.frm_id = f.frm_id
			INNER JOIN menu m ON m.men_id = f.men_id
			WHERE pf.prf_id = $perfil_id
				AND m.men_estado = 'ACTIVO'
				AND f.frm_estado = 'ACTIVO'
				AND pf.prfm_lectura = '1'
		";		
		$result = $this->db->query($sql);
		return $result->result();
	}

	function obtenerFormulariosPorPerfilPorMenu($menu_id,$perfil_id){
		$sql = "
			SELECT f.frm_id, f.frm_nombre, f.frm_controlador,
			pf.prfm_lectura, pf.prfm_inserta, pf.prfm_actualiza, pf.prfm_elimina
			FROM formulario f
			INNER JOIN prf_form pf ON pf.frm_id = f.frm_id
			WHERE pf.prf_id = $perfil_id 
				AND f.men_id = $menu_id
				AND f.frm_estado = 'ACTIVO'
				AND pf.prfm_lectura = '1'
				AND pf.prfm_estado = 'ACTIVO'
		";		
		$result = $this->db->query($sql);
		return $result->result();
	}

	function crearMenu($_datos){
		
		log_message('debug', '**** menu_model - crearMenu -> '. json_encode($_datos) );
		$data = array(
			'men_nombre' => $_datos['nombre']
		);
		return $this->db->insert('menu', $data);
	}

	function actualizar($_datos){
		log_message('debug', '**** menu_model - actualizar -> '. json_encode($_datos));
		$data = array(
			'men_nombre' => $_datos['nombre']
		);
		$this->db->where('men_id', $_datos['id']);
		return $this->db->update('menu', $data);
	}

	/**
	 * @des: Activar e inactivar un registro de menú.
	 * @param $1 int -> id del menú
	 * @param $2 int -> nuevo estado del registro {0: inactivar, 1: activar}
	 *
	 * @return boolean
	 */
	function cambiarEstado($_menu_id, $_estado){
		log_message('debug', "**** menu_model - cambiarEstado - _menu_id -> $_menu_id");
		log_message('debug', "**** menu_model - cambiarEstado - _estado -> $_estado");

		$this->db->where('men_id', $_menu_id);

		if ($_estado == 1){
			$data = array('men_estado' => 'ACTIVO');
		}
		else {
			$data = array('men_estado' => 'INACTIVO');			
		}

		return $this->db->update('menu', $data);
	}
}