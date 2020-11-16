$(document).on('ready', function (){
	$('#grid').dataTable(); 
});

function editarTipoConsulta(_id){
	  console.log("editarTipoConsulta", "parametro id", _id);

	  let tipoConsulta = lista_tipoConsulta.find(i => i.id == _id);
	  console.log("editarTipoConsulta", tipoConsulta);

	  $('#txtTipoConsultaId').val(tipoConsulta.id);
	  $('#slc_num_exp').val(tipoConsulta.paciente_id);
	  $('#txtespecialidad_consulta').val(tipoConsulta.especialidad_consulta);

	  $('#ModalActualizar').modal("show");
}

function activar(_id){	
	$('#estado_TipoConsulta_id').val(_id);
	$('#cambio_estado').val(1);
	$('#lblMensajeEstado').html('¿Está seguro que desea activar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-danger').addClass('bg-success');
	$('#btnConfirmarEstado').removeClass('btn-danger').addClass('btn-success');

	$('#ModalEstado').modal("show");
}

function desactivar(_id){
	$('#estado_TipoConsulta_id').val(_id);
	$('#cambio_estado').val(0);
	$('#lblMensajeEstado').html('¿Está seguro que desea desactivar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-success').addClass('bg-danger');
	$('#btnConfirmarEstado').removeClass('btn-success').addClass('btn-danger');

	$('#ModalEstado').modal("show");
}