$(document).on('ready', function (){
	$('#grid').dataTable(); 
});

function editarExpediente(_id){
	  console.log("editarExpediente", "parametro id", _id);

	  let expediente = lista_expediente.find(i => i.id == _id);
	  console.log("editarExpediente", expediente);

	  $('#txtExpedienteId').val(expediente.id);
	  $('#slc_num_exp').val(expediente.paciente_id);
	  $('#txtpulso').val(expediente.pulso);
	  $('#txttension_arterial').val(expediente.tension_arterial);
	  $('#txtfrecuencia_cardiaca').val(expediente.frecuencia_cardiaca);
	  $('#txtfrecuencia_reumatoide').val(expediente.frecuencia_reumatoide);
	  $('#txtestatura').val(expediente.estatura);
	  $('#txtpeso').val(expediente.peso);
	  $('#txtsintomas').val(expediente.sintomas);
	  $('#txtenfermedad').val(expediente.enfermedad);
	  $('#txtevolucion').val(expediente.evolucion);
	  $('#txtdetalle_enfermedad').val(expediente.detalle_enfermedad);
	  $('#txttratamiento').val(expediente.tratamiento);
	  $('#txtorden_examen').val(expediente.orden_examen);
	  $('#txtdetalle_orden').val(expediente.detalle_orden);

	  $('#ModalActualizar').modal("show");
}

function activar(_id){	
	$('#estado_expediente_id').val(_id);
	$('#cambio_estado').val(1);
	$('#lblMensajeEstado').html('¿Está seguro que desea activar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-danger').addClass('bg-success');
	$('#btnConfirmarEstado').removeClass('btn-danger').addClass('btn-success');

	$('#ModalEstado').modal("show");
}

function desactivar(_id){
	$('#estado_expediente_id').val(_id);
	$('#cambio_estado').val(0);
	$('#lblMensajeEstado').html('¿Está seguro que desea desactivar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-success').addClass('bg-danger');
	$('#btnConfirmarEstado').removeClass('btn-success').addClass('btn-danger');

	$('#ModalEstado').modal("show");
}