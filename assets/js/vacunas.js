$(document).on('ready', function (){
	$('#grid').dataTable(); 
});

function editarVacunas(_id){
	  console.log("editarVacunas", "parametro id", _id);

	  let vacunas = lista_vacunas.find(i => i.id == _id);
	  console.log("editarVacunas", vacunas);

	  $('#txtVacunaId').val(vacunas.id);
	  $('#slc_num_exp').val(vacunas.paciente_id);
	  $('#txtfecha_vacuna').val(vacunas.fecha_vacuna);
	  $('#txtnombre_vacuna').val(vacunas.nombre_vacuna);
	  $('#txtnotas').val(vacunas.notas);

	  $('#ModalActualizar').modal("show");
}

function activar(_id){	
	$('#estado_vacuna_id').val(_id);
	$('#cambio_estado').val(1);
	$('#lblMensajeEstado').html('¿Está seguro que desea activar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-danger').addClass('bg-success');
	$('#btnConfirmarEstado').removeClass('btn-danger').addClass('btn-success');

	$('#ModalEstado').modal("show");
}

function desactivar(_id){
	$('#estado_vacuna_id').val(_id);
	$('#cambio_estado').val(0);
	$('#lblMensajeEstado').html('¿Está seguro que desea desactivar el registro?');

	$('#ModalEstado').find('.modal-header').removeClass('bg-success').addClass('bg-danger');
	$('#btnConfirmarEstado').removeClass('btn-success').addClass('btn-danger');

	$('#ModalEstado').modal("show");
}