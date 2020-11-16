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
		let reporte = lista_reporteEpicrisisExistente.find(i => i.id == _id);	
		console.log('reporte', reporte.id);

		consultarDetalleEpicrisis(reporte.id);

		$('#tpl_rp_fecha').html(reporte.fecha_registro);
		$('#tpl_rp_paciente_nombre').html(
			reporte.nombre_paciente + ' ' + reporte.apellido_paciente
		);	
		$('#tpl_rp_paciente_num_expediente').html(reporte.num_expediente);	
		$('#tpl_rp_paciente_cedula').html(reporte.cedula);
		$('#tpl_rp_paciente_clinica').html(reporte.clinica);
		$('#tpl_rp_paciente_sala').html(reporte.sala);
		$('#tpl_rp_paciente_no_cama').html(reporte.no_cama);	
		$('#tpl_rp_paciente_enfermedad').html(reporte.enfermedad);
		$('#tpl_rp_paciente_complicaciones').html(reporte.complicaciones);
		$('#tpl_rp_paciente_examenes_realizados').html(reporte.examenes_realizados);
		$('#tpl_rp_paciente_tratamientos_recibidos').html(reporte.tratamientos_recibidos);
		$('#tpl_rp_paciente_diagnostico_ingreso').html(reporte.diagnostico_ingreso);
		$('#tpl_rp_paciente_diagnostico_egreso').html(reporte.diagnostico_egreso);	
		$('#tpl_rp_paciente_resultado_examen').html(reporte.resultado_examen);
		$('#tpl_rp_paciente_cirugia').html(reporte.cirugia);
		$('#tpl_rp_paciente_motivo_cirugia').html(reporte.motivo_cirugia);

		let toPrint = $('#reporte_imprimir').find(".modal-body");	
		$('#reporte_imprimir').modal("show");
	}

	function consultarDetalleEpicrisis(num_exp){
		$.ajax({
			type: "POST",
			dataType: "JSON",
			data: {id:num_exp},
			url: "ReporteExpediente/DetalleEpicrisis"
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