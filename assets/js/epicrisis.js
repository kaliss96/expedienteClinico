$(document).on('ready', function (){
	$('#grid').dataTable(); 
});

function editarEpicrisis(_id){
	  console.log("editarEpicrisis", "parametro id", _id);

	  let epicrisis = lista_epicrisis.find(i => i.id == _id);
	  console.log("editarEpicrisis", epicrisis);

	  $('#txtEpicrisisId').val(epicrisis.id);
	  $('#slc_num_exp').val(epicrisis.paciente_id);
	  $('#txtfamiliar').val(epicrisis.familiar);
	  $('#txtpadecimiento').val(epicrisis.padecimiento);
	  $('#txtclinica').val(epicrisis.clinica);
	  $('#txtsala').val(epicrisis.sala);
	  $('#txtno_cama').val(epicrisis.no_cama);
	  $('#txtenfermedad').val(epicrisis.enfermedad);
	  $('#txtcomplicaciones').val(epicrisis.complicaciones);
	  $('#txtexamenes_realizados').val(epicrisis.examenes_realizados);
	  $('#txttratamientos_recibidos').val(epicrisis.tratamientos_recibidos);
	  $('#txtdiagnostico_ingreso').val(epicrisis.diagnostico_ingreso);
	  $('#txtdiagnostico_egreso').val(epicrisis.diagnostico_egreso);
	  $('#txtresultado_examen').val(epicrisis.resultado_examen);
	  $('#txtcirugia').val(epicrisis.cirugia);
	  $('#txtmotivo_cirugia').val(epicrisis.motivo_cirugia);


	  $('#ModalActualizar').modal("show");
}

function activar(_id){	
	$('#estado_epicrisis_id').val(_id);
	$('#cambio_estado').val(1);
	$('#lblMensajeEstado').html('¿Está seguro que desea activar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-danger').addClass('bg-success');
	$('#btnConfirmarEstado').removeClass('btn-danger').addClass('btn-success');

	$('#ModalEstado').modal("show");
}

function desactivar(_id){
	$('#estado_epicrisis_id').val(_id);
	$('#cambio_estado').val(0);
	$('#lblMensajeEstado').html('¿Está seguro que desea desactivar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-success').addClass('bg-danger');
	$('#btnConfirmarEstado').removeClass('btn-success').addClass('btn-danger');

	$('#ModalEstado').modal("show");
}