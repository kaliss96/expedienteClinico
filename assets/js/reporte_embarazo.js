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
		let reporte = lista_reporteEmbarazoExistente.find(i => i.id == _id);	
		console.log('reporte', reporte.id);

		consultarDetalleEmbarazo(reporte.id);

		$('#tpl_rp_fecha').html(reporte.fecha_registro);
		$('#tpl_rp_paciente_nombre').html(
			reporte.nombre_paciente + ' ' + reporte.apellido_paciente
		);	
		$('#tpl_rp_paciente_num_expediente').html(reporte.num_expediente);	
		$('#tpl_rp_paciente_cedula').html(reporte.cedula);
		$('#tpl_rp_paciente_problema_embarazo').html(reporte.problema_embarazo);
		$('#tpl_rp_paciente_descripcion').html(reporte.descripcion);

		let toPrint = $('#reporte_imprimir').find(".modal-body");	
		$('#reporte_imprimir').modal("show");
	}

	function consultarDetalleEmbarazo(num_exp){
		$.ajax({
			type: "POST",
			dataType: "JSON",
			data: {id:num_exp},
			url: "ReporteExpediente/DetalleEmbarazo"
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