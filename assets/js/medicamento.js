$(document).on('ready', function (){
	$('#grid').dataTable(); 
});

function editarMedicamento(_id){
	  console.log("editarMedicamento", "parametro id", _id);

	  let medicamento = lista_medicamentos.find(i => i.id == _id);
	  console.log("editarMedicamento", medicamento);

	  $('#txtMedicamentoId').val(medicamento.id);
	  $('#txtlote').val(medicamento.lote);
	  $('#txtnombre').val(medicamento.nombre);
	  $('#txtgramo').val(medicamento.gramo);
	  $('#slc_fabricante').val(medicamento.id_fabricante);
	  $('#slc_laboratorio').val(medicamento.id_laboratorio);
	  $('#slc_marca').val(medicamento.id_marca);
	  $('#slc_unidad_medida').val(medicamento.id_unidad_medida);
	  $('#slc_pais').val(medicamento.id_pais);

	  $('#ModalActualizar').modal("show");
}

function activar(_id){	
	$('#estado_medicamento_id').val(_id);
	$('#cambio_estado').val(1);
	$('#lblMensajeEstado').html('¿Está seguro que desea activar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-danger').addClass('bg-success');
	$('#btnConfirmarEstado').removeClass('btn-danger').addClass('btn-success');

	$('#ModalEstado').modal("show");
}

function desactivar(_id){
	$('#estado_medicamento_id').val(_id);
	$('#cambio_estado').val(0);
	$('#lblMensajeEstado').html('¿Está seguro que desea desactivar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-success').addClass('bg-danger');
	$('#btnConfirmarEstado').removeClass('btn-success').addClass('btn-danger');

	$('#ModalEstado').modal("show");
}