$(document).on('ready', function (){
	$('#grid').dataTable(); 
});

function editarFormulario(_id){
	console.log("editarFormulario", "parametro id", _id);

	let formulario = lista_formularios.find(i => i.id == _id);
	console.log("editarFormulario", formulario);

	$('#txtFormularioId').val(formulario.id);
	$('#txtNombre').val(formulario.nombre);
	$('#txtDescripcion').val(formulario.descripcion);
	$('#txtControlador').val(formulario.controlador);
	$('#slc_menu').val(formulario.menu_id);

	$('#ModalActualizar').modal("show");
}

function activar(_id){	
	$('#estado_formulario_id').val(_id);
	$('#cambio_estado').val(1);
	$('#lblMensajeEstado').html('¿Está seguro que desea activar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-danger').addClass('bg-success');
	$('#btnConfirmarEstado').removeClass('btn-danger').addClass('btn-success');

	$('#ModalEstado').modal("show");
}

function desactivar(_id){
	$('#estado_formulario_id').val(_id);
	$('#cambio_estado').val(0);
	$('#lblMensajeEstado').html('¿Está seguro que desea desactivar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-success').addClass('bg-danger');
	$('#btnConfirmarEstado').removeClass('btn-success').addClass('btn-danger');

	$('#ModalEstado').modal("show");
}