$(document).on('ready', function (){
	$('#grid').dataTable(); 
});

function editarFabricante(_id){
	  console.log("editarFabricante", "parametro id_fabricante", _id);

	  let fabricante = lista_fabricante.find(i => i.id_fabricante == _id);
	  console.log("editarFabricante", fabricante);

	  $('#txtFabricanteId').val(fabricante.id_fabricante);
	  $('#txtfabricante').val(fabricante.fabricante);

	  $('#ModalActualizarFabricante').modal("show");
}

/*function activar(_id){	
	$('#estado_Fabricante_id').val(_id);
	$('#cambio_estado_fabricante').val(1);
	$('#lblModalEstadoFabricante').html('¿Está seguro que desea activar el registro?');

	$('#ModalEstadoFabricante').find('.modal-header').removeClass('bg-danger').addClass('bg-success');
	$('#btnConfirmarEstado').removeClass('btn-danger').addClass('btn-success');

	$('#ModalEstadoFabricante').modal("show");
}

function desactivar(_id){
	$('#estado_Fabricante_id').val(_id);
	$('#cambio_estado_fabricante').val(0);
	$('#lblModalEstadoFabricante').html('¿Está seguro que desea desactivar el registro?');

	$('#ModalEstadoFabricante').find('.modal-header').removeClass('bg-success').addClass('bg-danger');
	$('#btnConfirmarEstado').removeClass('btn-success').addClass('btn-danger');

	$('#ModalEstadoFabricante').modal("show");
}*/