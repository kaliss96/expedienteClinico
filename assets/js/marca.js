$(document).on('ready', function (){
	$('#grid').dataTable(); 
});

function editarMarca(_id){
	  console.log("editarMarca", "parametro id_marca", _id);

	  let marca = lista_marca.find(i => i.id_marca == _id);
	  console.log("editarMarca", marca);

	  $('#txtMarcaId').val(marca.id_marca);
	  $('#txtMarca').val(marca.marca);

	  $('#ModalActualizarMarca').modal("show");
}

/*function activar(_id){	
	$('#estado_marca_id').val(_id);
	$('#cambio_estado_marca').val(1);
	$('#lblMensajeEstado').html('¿Está seguro que desea activar el registro?');

	$('#ModalEstadoMarca').find('.modal-header').removeClass('bg-danger').addClass('bg-success');
	$('#btnConfirmarEstado').removeClass('btn-danger').addClass('btn-success');

	$('#ModalEstadoMarca').modal("show");
}

function desactivar(_id){
	$('#estado_marca_id').val(_id);
	$('#cambio_estado_marca').val(0);
	$('#lblMensajeEstado').html('¿Está seguro que desea desactivar el registro?');

	$('#ModalEstadoMarca').find('.modal-header').removeClass('bg-success').addClass('bg-danger');
	$('#btnConfirmarEstado').removeClass('btn-success').addClass('btn-danger');

	$('#ModalEstadoMarca').modal("show");
}*/