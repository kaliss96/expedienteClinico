$(document).on('ready', function (){
	$('#grid').dataTable();
	$('#tbl-perfil').dataTable(); 
	$('#ModalActualizar').on('hidden.bs.modal', refresh);
});

function refresh()
    {
        location.reload(true);
    }

function editarPerfil(_id){
	console.log("editarPerfil", "parametro id", _id);

	let perfil = lista_perfiles.find(i => i.id == _id);
	console.log("editarPerfil", perfil);

	$('#txtPerfilId').val(perfil.id);
	$('#txtnombre').val(perfil.nombre);
	$('#txtdescripcion').val(perfil.descripcion);

	perfil.formularios.forEach(function(perfil_i){

		$('#chkForm'+perfil_i.frm_id).attr("checked",true);

		if(perfil_i.prfm_lectura==1){
			$('#chkFormLectura'+perfil_i.frm_id).attr("checked",true);
		}else{
			$('#chkFormLectura'+perfil_i.frm_id).attr("checked",false);
		}
		if (perfil_i.prfm_inserta==1) {
			$('#chkFormEscritura'+perfil_i.frm_id).attr("checked",true);
		}
		if (perfil_i.prfm_actualiza==1) {
			$('#chkFormActualizar'+perfil_i.frm_id).attr("checked",true);
		}
		if (perfil_i.prfm_elimina==1) {
			$('#chkFormBorrar'+perfil_i.frm_id).attr("checked",true);
		}
	
	});

	$('#ModalActualizar').modal("show");
}

function activar(_id){	
	$('#estado_perfil_id').val(_id);
	$('#cambio_estado').val(1);
	$('#lblMensajeEstado').html('¿Está seguro que desea activar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-danger').addClass('bg-success');
	$('#btnConfirmarEstado').removeClass('btn-danger').addClass('btn-success');

	$('#ModalEstado').modal("show");
}

function desactivar(_id){
	$('#estado_perfil_id').val(_id);
	$('#cambio_estado').val(0);
	$('#lblMensajeEstado').html('¿Está seguro que desea desactivar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-success').addClass('bg-danger');
	$('#btnConfirmarEstado').removeClass('btn-success').addClass('btn-danger');

	$('#ModalEstado').modal("show");
}