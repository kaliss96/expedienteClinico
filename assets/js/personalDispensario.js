$(document).on('ready', function (){
	$('#grid').dataTable(); 
});

function editarPersonalDispensario(_id){
	  console.log("editarPersonalDispensario", "parametro id", _id);

	  let personalDispensario = lista_PersonalDispensario.find(i => i.id == _id);
	  console.log("editarPersonalDispensario", personalDispensario);

	  $('#txtPersonalDispensarioId').val(personalDispensario.id);
	  $('#slc_especialista').val(personalDispensario.tipo_id);
	  $('#txtcod_minsa').val(personalDispensario.cod_minsa);
	  $('#txtnombres').val(personalDispensario.nombres);
	  $('#txtapellidos').val(personalDispensario.apellidos);
	  $('#txtsexo').val(personalDispensario.sexo);
	  $('#txtFechaNacimiento').val(personalDispensario.fecha_nacimiento);
	  $('#txtcedula').val(personalDispensario.cedula);
	  $('#txtestado_civil').val(personalDispensario.estado_civil);
	  $('#txtemail').val(personalDispensario.email);
	  $('#txtcelular').val(personalDispensario.celular);
	  $('#txttelefono').val(personalDispensario.telefono);
	  $('#txtnacionalidad').val(personalDispensario.nacionalidad);

	  $('#ModalActualizar').modal("show");
}

function activar(_id){	
	$('#estado_personalDispensario_id').val(_id);
	$('#cambio_estado').val(1);
	$('#lblMensajeEstado').html('¿Está seguro que desea activar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-danger').addClass('bg-success');
	$('#btnConfirmarEstado').removeClass('btn-danger').addClass('btn-success');

	$('#ModalEstado').modal("show");
}

function desactivar(_id){
	$('#estado_personalDispensario_id').val(_id);
	$('#cambio_estado').val(0);
	$('#lblMensajeEstado').html('¿Está seguro que desea desactivar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-success').addClass('bg-danger');
	$('#btnConfirmarEstado').removeClass('btn-success').addClass('btn-danger');

	$('#ModalEstado').modal("show");
}