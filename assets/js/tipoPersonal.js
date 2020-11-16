$(document).on('ready', function (){
	$('#grid').dataTable(); 
});

function editarTipoPersonal(_id){
	  console.log("editarTipoPersonal", "parametro id", _id);

	  let tipoPersonal = lista_TipoPersonal.find(i => i.id == _id);
	  console.log("editarTipoPersonal", tipoPersonal);

	  $('#txtTipoPersonalId').val(tipoPersonal.id);
	  $('#txttipo_personal').val(tipoPersonal.tipo_personal);
	  $('#txtespecialidad').val(tipoPersonal.especialidad);

	  $('#ModalActualizar').modal("show");
}

function activar(_id){	
	$('#estado_TipoPersonal_id').val(_id);
	$('#cambio_estado').val(1);
	$('#lblMensajeEstado').html('¿Está seguro que desea activar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-danger').addClass('bg-success');
	$('#btnConfirmarEstado').removeClass('btn-danger').addClass('btn-success');

	$('#ModalEstado').modal("show");
}

function desactivar(_id){
	$('#estado_TipoPersonal_id').val(_id);
	$('#cambio_estado').val(0);
	$('#lblMensajeEstado').html('¿Está seguro que desea desactivar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-success').addClass('bg-danger');
	$('#btnConfirmarEstado').removeClass('btn-success').addClass('btn-danger');

	$('#ModalEstado').modal("show");
}