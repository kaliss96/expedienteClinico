<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PerfilUsuario_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	function PerfilOpciones($_perfil_id, $_controller){
		$sql = "
	SELECT 
	   prfm_lectura, prfm_inserta, prfm_actualiza, prfm_elimina
		FROM prf_form pf
		JOIN perfil pr ON pr.prf_id = pf.prf_id
		JOIN formulario fr ON fr.frm_id = pf.frm_id
		WHERE pf.prf_id = $_perfil_id
		AND fr.frm_controlador = '".$_controller."'";

		$result = $this->db->query($sql);
		return $result->result();
	}

}