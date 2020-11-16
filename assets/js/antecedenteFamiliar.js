$(document).on('ready', function (){
	$('#grid').dataTable(); 
});

function editarAntecedenteFamiliar(_id){
	  console.log("editarAntecedenteFamiliar", "parametro id", _id);

	  let antecedenteFamiliar = lista_antecedenteFamiliar.find(i => i.id == _id);
	  console.log("editarAntecedenteFamiliar", antecedenteFamiliar);

	  $('#txtAntecedenteFamiliarId').val(antecedenteFamiliar.id);
	  $('#slc_num_exp').val(antecedenteFamiliar.paciente_id);
	  $('#txtfamiliar').val(antecedenteFamiliar.familiar);
	  $('#txtpadecimiento').val(antecedenteFamiliar.padecimiento);

	  $('#ModalActualizar').modal("show");
}

function activar(_id){	
	$('#estado_antecedenteFamiliar_id').val(_id);
	$('#cambio_estado').val(1);
	$('#lblMensajeEstado').html('¿Está seguro que desea activar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-danger').addClass('bg-success');
	$('#btnConfirmarEstado').removeClass('btn-danger').addClass('btn-success');

	$('#ModalEstado').modal("show");
}

function desactivar(_id){
	$('#estado_antecedenteFamiliar_id').val(_id);
	$('#cambio_estado').val(0);
	$('#lblMensajeEstado').html('¿Está seguro que desea desactivar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-success').addClass('bg-danger');
	$('#btnConfirmarEstado').removeClass('btn-success').addClass('btn-danger');

	$('#ModalEstado').modal("show");
}