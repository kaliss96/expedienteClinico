<style type="text/css">
	hr{
    	margin-top: 0px!important; 
    	margin-bottom: 0px!important;
	}
</style>

<div style="border:double; margin: 0 auto; padding: 20px 0 40px 0;">
	<div style="text-align: center">
		<h1 style="margin-top: 0!important;">EXPEDIENTE CLÍNICO ELÉCTRONICO</h1>
		<h2>Reporte Control de Embarazo</h2>
	</div>

	<table style="margin: 0 auto;" width="80%" cellspacing="1px" >
		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;"></th>
			<td style="border:0px; text-align: right">
				Fecha <span style="border-bottom: 1px solid black;"><?php echo date('d-m-Y');?></span>
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">PACIENTE:</th>
			<td style="border:0px;">
				<label id="tpl_rp_paciente_nombre"></label>
				<hr color="black" size="1">
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">CEDULA:</th>
			<td style="border:0px;">
				<label id="tpl_rp_paciente_cedula"></label>
				<hr color="black" size="1">
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">PROBLEMAS EMBARAZO:</th>
			<td style="border:0px;">
				<label id="tpl_rp_paciente_problema_embarazo"></label>
				<hr color="black" size="1">
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">DESCRIPCION:</th>
			<td style="border:0px;">
				<label id="tpl_rp_paciente_descripcion"></label>
				<hr color="black" size="1">
			</td>
		</tr>
	</table>