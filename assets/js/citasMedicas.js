$(document).on('ready', function (){
	$('#grid').dataTable(); 
});

function editarCitasMedicas(_id){
	  console.log("editarCitasMedicas", "parametro id", _id);

	  let citasMedicas = lista_citasMedicas.find(i => i.id == _id);
	  console.log("editarCitasMedicas", citasMedicas);

	  $('#txtCitaMedicaId').val(citasMedicas.id);
	  $('#slc_num_exp').val(citasMedicas.paciente_id);
	  $('#slc_especialista').val(citasMedicas.tipo_id);
	  $('#txtfecha_cita_medica').val(citasMedicas.fecha_cita_medica);
	  $('#lblhora').val(citasMedicas.hora);
	  $('#txtdescripcion').val(citasMedicas.descripcion);

	  $('#ModalActualizar').modal("show");
}

function activar(_id){	
	$('#estado_citamedica_id').val(_id);
	$('#cambio_estado').val(1);
	$('#lblMensajeEstado').html('¿Está seguro que desea activar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-danger').addClass('bg-success');
	$('#btnConfirmarEstado').removeClass('btn-danger').addClass('btn-success');

	$('#ModalEstado').modal("show");
}

function desactivar(_id){
	$('#estado_citamedica_id').val(_id);
	$('#cambio_estado').val(0);
	$('#lblMensajeEstado').html('¿Está seguro que desea desactivar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-success').addClass('bg-danger');
	$('#btnConfirmarEstado').removeClass('btn-success').addClass('btn-danger');

	$('#ModalEstado').modal("show");
}