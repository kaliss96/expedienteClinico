$(document).on('ready', function (){
	$('#grid').dataTable(); 
});

function editarEmbarazo(_id){
	  console.log("editarEmbarazo", "parametro id", _id);

	  let embarazo = lista_embarazo.find(i => i.id == _id);
	  console.log("editarEmbarazo", embarazo);

	  $('#txtEmbarazoId').val(embarazo.id);
	  $('#slc_num_exp').val(embarazo.paciente_id);
	  $('#txtproblema_embarazo').val(embarazo.problema_embarazo);
	  $('#txtdescripcion').val(embarazo.descripcion);

	  $('#ModalActualizar').modal("show");
}

function activar(_id){	
	$('#estado_embarazo_id').val(_id);
	$('#cambio_estado').val(1);
	$('#lblMensajeEstado').html('¿Está seguro que desea activar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-danger').addClass('bg-success');
	$('#btnConfirmarEstado').removeClass('btn-danger').addClass('btn-success');

	$('#ModalEstado').modal("show");
}

function desactivar(_id){
	$('#estado_embarazo_id').val(_id);
	$('#cambio_estado').val(0);
	$('#lblMensajeEstado').html('¿Está seguro que desea desactivar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-success').addClass('bg-danger');
	$('#btnConfirmarEstado').removeClass('btn-success').addClass('btn-danger');

	$('#ModalEstado').modal("show");
}