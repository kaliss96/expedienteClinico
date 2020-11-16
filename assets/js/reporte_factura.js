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
		let reporte = lista_reportefactura_Existente.find(i => i.id == _id);	
		console.log('reporte', reporte.id);

		consultarDetalleCitaMedica(reporte.id);

		$('#tpl_rp_fecha').html(reporte.fecha_registro);
		$('#tpl_rp_paciente_nombre').html(
			reporte.nombre_paciente + ' ' + reporte.apellido_paciente
		);	
		$('#tpl_rp_paciente_contado').html(reporte.contado);	
		$('#tpl_rp_paciente_precio_consulta').html(reporte.precio_consulta);
		$('#tpl_rp_paciente_cambio').html(reporte.cambio);
		$('#tpl_rp_paciente_total').html(reporte.total);

		let toPrint = $('#reporte_imprimir').find(".modal-body");	
		$('#reporte_imprimir').modal("show");
	}

	function consultarDetalleFactura(num_fac){
		$.ajax({
			type: "POST",
			dataType: "JSON",
			data: {id:num_exp},
			url: "ReporteFactura/DetalleFactura"
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