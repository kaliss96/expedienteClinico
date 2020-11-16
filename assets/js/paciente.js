$(document).on('ready', function (){
	$('#grid').dataTable(); 
});

function editarPaciente(_id){
	console.log("editarPaciente", "parametro id", _id);

	let Paciente = lista_paciente.find(i => i.id == _id);
	console.log("editarPaciente", Paciente);

	$('#txtPacienteId').val(Paciente.id);
	$('#txtnum_expediente').val(Paciente.num_expediente);
	$('#txtnombre_paciente').val(Paciente.nombre_paciente);
	$('#txtapellido_paciente').val(Paciente.apellido_paciente);
	$('#lblfecha_nacimiento').val(Paciente.fecha_nacimiento);
	$('#txtcedula').val(Paciente.cedula);
	$('#txtcelular').val(Paciente.celular);
	$('#txtcorreo').val(Paciente.correo);
	$('#txttelefono').val(Paciente.telefono);
	$('#txtestado_civil').val(Paciente.estado_civil);
	$('#txtdireccion').val(Paciente.direccion);
	$('#txttipo_sangre').val(Paciente.tipo_sangre);
	$('#txtsexo').val(Paciente.sexo);
	$('#ModalActualizar').modal("show");
}

function activar(_id){	
	$('#estado_paciente_id').val(_id);
	$('#cambio_estado').val(1);
	$('#lblMensajeEstado').html('¿Está seguro que desea activar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-danger').addClass('bg-success');
	$('#btnConfirmarEstado').removeClass('btn-danger').addClass('btn-success');

	$('#ModalEstado').modal("show");
}

function desactivar(_id){
	$('#estado_paciente_id').val(_id);
	$('#cambio_estado').val(0);
	$('#lblMensajeEstado').html('¿Está seguro que desea desactivar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-success').addClass('bg-danger');
	$('#btnConfirmarEstado').removeClass('btn-success').addClass('btn-danger');

	$('#ModalEstado').modal("show");
}