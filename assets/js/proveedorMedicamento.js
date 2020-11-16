$(document).on('ready', function (){
	$('#grid').dataTable(); 
});

function editarProveedorMedicamento(_id){
	  console.log("editarProveedorMedicamento", "parametro id", _id);

	  let proveedorMedicamento = lista_proveedorMedicamento.find(i => i.id == _id);
	  console.log("editarProveedorMedicamento", proveedorMedicamento);

	  $('#txtProveedorMedicamentoId').val(proveedorMedicamento.id);
	  $('#txtnombre').val(proveedorMedicamento.nombre);
	  $('#txtapellido').val(proveedorMedicamento.apellido);
	  $('#txtcedula').val(proveedorMedicamento.cedula);
	  $('#txtcelular').val(proveedorMedicamento.celular);
	  $('#txttelefono').val(proveedorMedicamento.telefono);
	  $('#txtcorreo').val(proveedorMedicamento.correo);
	  $('#txtdireccion').val(proveedorMedicamento.direccion);

	  $('#ModalActualizar').modal("show");
}

function activar(_id){	
	$('#estado_proveedorMedicamento_id').val(_id);
	$('#cambio_estado').val(1);
	$('#lblMensajeEstado').html('¿Está seguro que desea activar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-danger').addClass('bg-success');
	$('#btnConfirmarEstado').removeClass('btn-danger').addClass('btn-success');

	$('#ModalEstado').modal("show");
}

function desactivar(_id){
	$('#estado_proveedorMedicamento_id').val(_id);
	$('#cambio_estado').val(0);
	$('#lblMensajeEstado').html('¿Está seguro que desea desactivar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-success').addClass('bg-danger');
	$('#btnConfirmarEstado').removeClass('btn-success').addClass('btn-danger');

	$('#ModalEstado').modal("show");
}