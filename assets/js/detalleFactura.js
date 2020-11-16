$(document).on('ready', function (){
	$('#grid').dataTable(); 
});

function editarDetalleFactura(_id){
	  console.log("editarDetalleFactura", "parametro id", _id);

	  let detalleFactura = lista_detalleFactura.find(i => i.id == _id);
	  console.log("editarDetalleFactura", detalleFactura);

	  $('#txtDetallefacturaId').val(detalleFactura.id);
	  $('#slc_num_exp').val(detalleFactura.id_paciente);
	  $('#slc_tip_cst').val(detalleFactura.id_tipo_consulta);
	  $('#txtprecio').val(detalleFactura.precio);

	  $('#ModalActualizar').modal("show");
}

function autorizar(_id){	
	$('#detallefactura_id').val(_id);
	$('#autorizar_estado').val(1);
	$('#lblMensajeEstado').html('¿Está seguro que desea autorizar el detalle Factura');

	$('#ModalAutorizar').find('.modal-header').removeClass('bg-danger').addClass('bg-success');
	$('#btnConfirmarEstado').removeClass('btn-danger').addClass('btn-success');

	$('#ModalAutorizar').modal("show");
}

/*function cancelar(_id){
	$('#detallefactura_id').val(_id);
	$('#autorizar_estado').val(0);
	$('#lblMensajeEstado').html('¿Está seguro que desea cancelar el detalle Factura?');

	$('#ModalAutorizar').find('.modal-header').removeClass('bg-success').addClass('bg-danger');
	$('#btnConfirmarEstado').removeClass('btn-success').addClass('btn-danger');

	$('#ModalAutorizar').modal("show");
}*/

 function cancelar(_id){
	$('#estado_detalle_id').val(_id);
	$('#lblMensajeEstado').html('¿Está seguro que desea cancelar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-success').addClass('bg-danger');
	$('#btnConfirmarEstado').removeClass('btn-success').addClass('btn-danger');

	$('#ModalEstado').modal("show");
}

