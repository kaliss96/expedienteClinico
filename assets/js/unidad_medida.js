$(document).on('ready', function (){
	$('#grid').dataTable(); 
});

function editarUnidadMedida(_id){
	  console.log("editarUnidadMedida", "parametro id_unidad_medida", _id);

	  let unidad_medida = lista_unidadMedida.find(i => i.id_unidad_medida == _id);
	  console.log("editarUnidadMedida", unidad_medida);

	  $('#txtUnidadMedidaId').val(unidad_medida.id_unidad_medida);
	  $('#txtunidad_medida').val(unidad_medida.unidad_medida);

	  $('#ModalActualizarUnidadMedida').modal("show");
}

/*function activar(_id){	
	$('#estado_UnidadMedida_id').val(_id);
	$('#cambio_estado').val(1);
	$('#lblMensajeEstado').html('¿Está seguro que desea activar el registro?');

	$('#ModalEstadoUnidadMedida').find('.modal-header').removeClass('bg-danger').addClass('bg-success');
	$('#btnConfirmarEstado').removeClass('btn-danger').addClass('btn-success');

	$('#ModalEstadoUnidadMedida').modal("show");
}

function desactivar(_id){
	$('#estado_UnidadMedida_id').val(_id);
	$('#cambio_estado').val(0);
	$('#lblMensajeEstado').html('¿Está seguro que desea desactivar el registro?');

	$('#ModalEstadoUnidadMedida').find('.modal-header').removeClass('bg-success').addClass('bg-danger');
	$('#btnConfirmarEstado').removeClass('btn-success').addClass('btn-danger');

	$('#ModalEstadoUnidadMedida').modal("show");
}*/