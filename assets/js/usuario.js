$(document).on('ready', function (){
	$('#grid').dataTable(); 
});

function editarUsuario(_id){
	console.log("editarUsuario", "parametro id", _id);

	let usuario = lista_usuarios.find(i => i.id == _id);
	console.log("editarUsuario", usuario);

	$('#txtUsuarioId').val(usuario.id);
	$('#slc_perfil').val(usuario.perfil_id);
	$('#slc_empleado').val(usuario.empleado_id);
	$('#txtusuario').val(usuario.usuario);
	//$('#txtcontrasena').val(usuario.contrasena);

	$('#ModalActualizar').modal("show");
}

function editarPass(_id){
	console.log("editarPass", "parametro id", _id);

	let usuario = lista_usuarios.find(i => i.id == _id);
	console.log("editarPass", usuario);

	$('#txtPassId').val(usuario.id);
	//$('#txtcontrasena').val(usuario.contrasena);

	$('#ModalActualizarPass').modal("show");
}

function activar(_id){	
	$('#estado_usuario_id').val(_id);
	$('#cambio_estado').val(1);
	$('#lblMensajeEstado').html('¿Está seguro que desea activar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-danger').addClass('bg-success');
	$('#btnConfirmarEstado').removeClass('btn-danger').addClass('btn-success');

	$('#ModalEstado').modal("show");
}

function desactivar(_id){
	$('#estado_usuario_id').val(_id);
	$('#cambio_estado').val(0);
	$('#lblMensajeEstado').html('¿Está seguro que desea desactivar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-success').addClass('bg-danger');
	$('#btnConfirmarEstado').removeClass('btn-success').addClass('btn-danger');

	$('#ModalEstado').modal("show");
}