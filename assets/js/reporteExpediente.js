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
		let reporte = lista_reporteExpedienteExistente.find(i => i.id == _id);	
		console.log('reporte', reporte.id_expediente);

		consultarDetalleExpediente(reporte.id_expediente);

		$('#tpl_rp_fecha').html(reporte.fecha_registro);
		$('#tpl_rp_paciente_nombre').html(
			reporte.nombre_paciente + ' ' + reporte.apellido
		);	
		$('#tpl_rp_fecha_nacimiento').html(reporte.fecha_nacimiento);	
		$('#tpl_rp_paciente_cedula').html(reporte.cedula);
		$('#tpl_rp_paciente_telefono').html(reporte.telefono);
		$('#tpl_rp_paciente_correo').html(reporte.correo);
		$('#tpl_rp_direccion').html(reporte.direccion);	
		$('#tpl_rp_estaddo_civil').html(reporte.estaddo_civil);
		$('#tpl_rp_tipo_sangre').html(reporte.tipo_sangre);
		$('#tpl_rp_sexo').html(reporte.sexo);
		$('#tpl_rp_pulso').html(reporte.pulso);
		$('#tpl_rp_tension_arterial').html(reporte.tension_arterial);
		$('#tpl_rp_frecuencia_cardiaca').html(reporte.frecuencia_cardiaca);	
		$('#tpl_rp_frecuencia_reumatoide').html(reporte.frecuencia_reumatoide);
		$('#tpl_rp_peso').html(reporte.peso);
		$('#tpl_rp_evolucion').html(reporte.evolucion);
		$('#tpl_rp_sintomas').html(reporte.sintomas);
		$('#tpl_rp_enfermedad').html(reporte.enfermedad);
		$('#tpl_rp_detalle_enfermedad').html(reporte.detalle_enfermedad);
		$('#tpl_rp_tratamiento').html(reporte.tratamiento);

		let toPrint = $('#reporte_imprimir').find(".modal-body");	
		$('#reporte_imprimir').modal("show");
	}

	function consultarDetalleExpediente(num_exp){
		$.ajax({
			type: "POST",
			dataType: "JSON",
			data: {id_expediente:num_exp},
			url: "ReporteExpediente/DetalleXExpediente"
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