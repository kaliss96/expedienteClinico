$(document).on('ready', function (){
	$('#grid').dataTable(); 
});

function editarLaboratorio(_id){
	  console.log("editarLaboratorio", "parametro id_laboratorio", _id);

	  let laboratorio = lista_laboratorio.find(i => i.id_laboratorio == _id);
	  console.log("editarLaboratorio", laboratorio);

	  $('#txtLaboratorioId').val(laboratorio.id_laboratorio);
	  $('#txtlaboratorio').val(laboratorio.laboratorio);

	  $('#ModalActualizarLaboratorio').modal("show");
}

/*function activar(_id){	
	$('#estado_Laboratorio_id').val(_id);
	$('#cambio_estado').val(1);
	$('#lblMensajeEstado').html('¿Está seguro que desea activar el registro?');

	$('#ModalEstadoLaboratorio').find('.modal-header').removeClass('bg-danger').addClass('bg-success');
	$('#btnConfirmarEstado').removeClass('btn-danger').addClass('btn-success');

	$('#ModalEstadoLaboratorio').modal("show");
}

function desactivar(_id){
	$('#estado_Laboratorio_id').val(_id);
	$('#cambio_estado').val(0);
	$('#lblMensajeEstado').html('¿Está seguro que desea desactivar el registro?');

	$('#ModalEstadoLaboratorio').find('.modal-header').removeClass('bg-success').addClass('bg-danger');
	$('#btnConfirmarEstado').removeClass('btn-success').addClass('btn-danger');

	$('#ModalEstadoLaboratorio').modal("show");
}*/