$(document).on('ready', function (){
	$('#grid').dataTable(); 
});

function editarPais(_id){
	  console.log("editarPais", "parametro id_pais", _id);

	  let pais = lista_pais.find(i => i.id_pais == _id);
	  console.log("editarPais", pais);

	  $('#txtPaisId').val(pais.id_pais);
	  $('#txtpais').val(pais.pais);

	  $('#ModalActualizarPais').modal("show");
}

/*function activar(_id){	
	$('#estado_pais_id').val(_id);
	$('#cambio_estado_pais').val(1);
	$('#lblMensajeEstadoPais').html('¿Está seguro que desea activar el registro?');

	$('#ModalEstadoPais').find('.modal-header').removeClass('bg-danger').addClass('bg-success');
	$('#btnConfirmarEstadoPais').removeClass('btn-danger').addClass('btn-success');

	$('#ModalEstadoPais').modal("show");
}

function desactivar(_id){
	$('#estado_pais_id').val(_id);
	$('#cambio_estado_pais').val(0);
	$('#lblMensajeEstadoPais').html('¿Está seguro que desea desactivar el registro?');

	$('#ModalEstadoPais').find('.modal-header').removeClass('bg-success').addClass('bg-danger');
	$('#btnConfirmarEstadoPais').removeClass('btn-success').addClass('btn-danger');

	$('#ModalEstadoPais').modal("show");
}*/