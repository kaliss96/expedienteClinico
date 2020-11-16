$(document).on('ready', function (){
	$('#grid').dataTable(); 
});

function editarMenu(_id){
	console.log("editarMenu", "parametro id", _id);

	let menu = lista_menus.find(i => i.id == _id);
	console.log("editarMenu", menu);

	$('#txtMenuId').val(menu.id);
	$('#txtNombre').val(menu.nombre);

	$('#ModalActualizar').modal("show");
}

function activar(_id){	
	$('#estado_menu_id').val(_id);
	$('#cambio_estado').val(1);
	$('#lblMensajeEstado').html('¿Está seguro que desea activar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-danger').addClass('bg-success');
	$('#btnConfirmarEstado').removeClass('btn-danger').addClass('btn-success');

	$('#ModalEstado').modal("show");
}

function desactivar(_id){
	$('#estado_menu_id').val(_id);
	$('#cambio_estado').val(0);
	$('#lblMensajeEstado').html('¿Está seguro que desea desactivar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-success').addClass('bg-danger');
	$('#btnConfirmarEstado').removeClass('btn-success').addClass('btn-danger');

	$('#ModalEstado').modal("show");
}