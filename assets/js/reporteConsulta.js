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
		let reporte = lista_reporteConsulta_Existente.find(i => i.id == _id);	
		console.log('reporte', reporte.id);

		consultarDetalleConsulta(reporte.id);

		$('#tpl_rp_fecha').html(reporte.fecha_registro);
		$('#tpl_rp_paciente_nombre').html(
			reporte.nombre_paciente + ' ' + reporte.apellido_paciente
		);	
		$('#tpl_rp_paciente_num_expediente').html(reporte.num_expediente);	
		$('#tpl_rp_paciente_sintomas').html(reporte.sintomas);
		$('#tpl_rp_paciente_enfermedad').html(reporte.enfermedad);
		$('#tpl_rp_paciente_detalle_enfermedad').html(reporte.detalle_enfermedad);
		$('#tpl_rp_paciente_tratamiento').html(reporte.tratamiento);
		$('#tpl_rp_paciente_orden_examen').html(reporte.orden_examen);
		$('#tpl_rp_paciente_detalle_orden').html(reporte.detalle_orden);

		let toPrint = $('#reporte_imprimir').find(".modal-body");	
		$('#reporte_imprimir').modal("show");
	}

	function consultarDetalleConsulta(num_exp){
		$.ajax({
			type: "POST",
			dataType: "JSON",
			data: {id:num_exp},
			url: "ReporteConsulta/DetalleConsulta"
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