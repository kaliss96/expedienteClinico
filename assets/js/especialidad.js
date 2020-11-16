$(document).on('ready', function (){
	$('#grid').dataTable(); 
});

function editarEspecialidad(_id){
	  console.log("editarEspecialidad", "parametro id_especialidad", _id);

	  let especialidad = lista_especialidad.find(i => i.id_especialidad == _id);
	  console.log("editarEspecialidad", especialidad);

	  $('#txtEspecialidadId').val(especialidad.id_especialidad);
	  $('#txtEspecialidad').val(especialidad.especialidad);

	  $('#ModalActualizarEspecialidad').modal("show");
}

function activar(_id){	
	$('#estado_especialidad_id').val(_id);
	$('#cambio_estado_especialidad').val(1);
	$('#lblMensajeEstadoespecialidad').html('¿Está seguro que desea activar el registro?');

	$('#ModalEstadoespecialidad').find('.modal-header').removeClass('bg-danger').addClass('bg-success');
	$('#btnConfirmarEstadoespecialidad').removeClass('btn-danger').addClass('btn-success');

	$('#ModalEstadoespecialidad').modal("show");
}

function desactivar(_id){
	$('#estado_especialidad_id').val(_id);
	$('#cambio_estado_especialidad').val(0);
	$('#lblMensajeEstadoespecialidad').html('¿Está seguro que desea desactivar el registro?');

	$('#ModalEstadoespecialidad').find('.modal-header').removeClass('bg-success').addClass('bg-danger');
	$('#btnConfirmarEstadoespecialidad').removeClass('btn-success').addClass('btn-danger');

	$('#ModalEstadoespecialidad').modal("show");
}