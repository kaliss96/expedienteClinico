$(document).on('ready', function (){
	$('#grid').dataTable(); 
});

	function ImprimirReporte (){	
		var toPrint = $('#reporte_imprimir').find(".modal-body");
		var popupWin = window.open(' ','popimpr');

		console.log(toPrint);
		// return;

		popupWin.document.write(toPrint[0].innerHTML);
		popupWin.document.close();
		popupWin.print();
		popupWin.close();
	}

	function VerReporte(_id){
		let reporte = lista_reporteCitaMedica_Existente.find(i => i.id == _id);	
		console.log('reporte', reporte.id);

		consultarDetalleCitaMedica(reporte.id);

		$('#tpl_rp_fecha').html(reporte.fecha_registro);
		console.log('fecha',reporte.fecha_registro);
		$('#tpl_rp_paciente_nombre').html(
			reporte.nombre_paciente + ' ' + reporte.apellido_paciente
		);	
		$('#tpl_rp_paciente_num_expediente').html(reporte.num_expediente);	
		$('#tpl_rp_paciente_cedula').html(reporte.cedula);
		$('#tpl_rp_paciente_fecha_cita_reserva').html(reporte.fecha_cita_reserva);
		$('#tpl_rp_paciente_fecha_cita_medica').html(reporte.fecha_cita_medica);
		$('#tpl_rp_paciente_hora').html(reporte.hora);
		$('#tpl_rp_paciente_descripcion').html(reporte.descripcion);

		let toPrint = $('#reporte_imprimir').find(".modal-body");	
		$('#reporte_imprimir').modal("show");
	}

	function consultarDetalleCitaMedica(num_exp){
		$.ajax({
			type: "POST",
			dataType: "JSON",
			data: {id:num_exp},
			url: "ReporteCitaMedica/DetalleCitaMedica"
		})
		.done(function(_res){
			// Success
			console.log('ajax', _res);
		})
		.fail(function(e){
			// Error
			console.error('ajax', e);	 
	});
}