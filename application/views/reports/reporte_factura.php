<style type="text/css">
	hr{
    	margin-top: 0px!important; 
    	margin-bottom: 0px!important;
	}
</style>
<div style="border:double; margin: 0 auto; padding: 20px 0 40px 0;">
	<div style="text-align: center">
		<h1 style="margin-top: 0!important;">EXPEDIENTE CLÍNICO ELÉCTRONICO</h1>
		<h2>Recibo Factura</h2>
	</div>

	<table style="margin: 0 auto;" width="80%" cellspacing="1px" >
		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;"></th>
			<td style="border:0px; text-align: right">
				Fecha <span style="border-bottom: 1px solid black;"><?php echo date('d-m-Y');?></span>
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">NÚMERO FACTURA:</th>
			<td style="border:0px;">
				<label id="tpl_rp_paciente_num_expediente" disabled="true"></label>
				<hr color="black" size="1">
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">PACIENTE:</th>
			<td style="border:0px;">
				<label id="tpl_rp_paciente_nombre" disabled="true"></label>
				<hr color="black" size="1">
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">CONTADO:</th>
			<td style="border:0px;">
				<label id="tpl_rp_paciente_contado" disabled="true"></label>
				<hr color="black" size="1">
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">ESPECIALIDAD:</th>
			<td style="border:0px;">
				<textarea id="tpl_rp_especialidad_consulta" disabled="true"></textarea>
				<hr color="black" size="1">
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">PRECIO CONSULTA:</th>
			<td style="border:0px;">
				<label id="tpl_rp_paciente_precio_consulta" disabled="true"></label>
				<hr color="black" size="1">
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">CAMBIO:</th>
			<td style="border:0px;">
				<label id="tpl_rp_paciente_cambio" disabled="true"></label>
				<hr color="black" size="1">
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">TOTAL:</th>
			<td style="border:0px;">
				<label id="tpl_rp_paciente_total" disabled="true"></label>
				<hr color="black" size="1">
			</td>
		</tr>

	</table>

