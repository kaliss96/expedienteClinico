<style type="text/css">
	hr{
    	margin-top: 0px!important; 
    	margin-bottom: 0px!important;
	}
</style>
<div style="border:double; margin: 0 auto; padding: 20px 0 40px 0;">
	<div style="text-align: center">
		<h1 style="margin-top: 0!important;">EXPEDIENTE CLÍNICO ELÉCTRONICO</h1>
		<h2>Reporte de Expediente</h2>
	</div>

	<table style="margin: 0 auto;" width="80%" cellspacing="1px" >
		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;"></th>
			<td style="border:0px; text-align: right">
				Fecha <span id="tpl_rp_fecha" name="fecha_registro" style="border-bottom: 1px solid black;">2017/04/12</span>			
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
			<th style="border:0px; text-align: left; width:25%;">FECHA NACIMIENTO:</th>
			<td style="border:0px;">
				<label id="tpl_rp_fecha_nacimiento"></label>
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
			<th style="border:0px; text-align: left; width:25%;">TELÉFONO:</th>
			<td style="border:0px;">
				<label id="tpl_rp_paciente_telefono"></label>
				<hr color="black" size="1">
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">CORREO:</th>
			<td style="border:0px;">
				<label id="tpl_rp_paciente_correo"></label>
				<hr color="black" size="1">
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">DIRECCIÓN:</th>
			<td style="border:0px;">
				<label id="tpl_rp_direccion"></label>
				<hr color="black" size="1">
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">ESTADO CÍVIL:</th>
			<td style="border:0px;">
				<label id="tpl_rp_estaddo_civil"></label>
				<hr color="black" size="1">
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">TIPO DE SANGRE:</th>
			<td style="border:0px;">
				<label id="tpl_rp_tipo_sangre"></label>
				<hr color="black" size="1">
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">SEXO:</th>
			<td style="border:0px;">
				<label id="tpl_rp_sexo"></label>
				<hr color="black" size="1">
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">PULSO:</th>
			<td style="border:0px;">
				<label id="tpl_rp_pulso"></label>
				<hr color="black" size="1">
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">TENSIÓN:</th>
			<td style="border:0px;">
				<label id="tpl_rp_tension_arterial"></label>
				<hr color="black" size="1">
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">FRECUENCIA CARDIACA:</th>
			<td style="border:0px;">
				<label id="tpl_rp_frecuencia_cardiaca"></label>
				<hr color="black" size="1">
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">FRECUENCIA REUMATOIDE:</th>
			<td style="border:0px;">
				<label id="tpl_rp_frecuencia_reumatoide"></label>
				<hr color="black" size="1">
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">PESO:</th>
			<td style="border:0px;">
				<label id="tpl_rp_peso"></label>
				<hr color="black" size="1">
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">EVOLUCIÓN:</th>
			<td style="border:0px;">
				<textarea id="tpl_rp_evolucion"></textarea>
				<hr color="black" size="1">
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">SINTOMAS:</th>
			<td style="border:0px;">
				<textarea id="tpl_rp_sintomas"></textarea>
				<hr color="black" size="1">
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">ENFERMEDAD:</th>
			<td style="border:0px;">
				<textarea id="tpl_rp_enfermedad"></textarea>
				<hr color="black" size="1">
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">DETALLE ENFERMEDAD:</th>
			<td style="border:0px;">
				<textarea id="tpl_rp_detalle_enfermedad"></textarea>
				<hr color="black" size="1">
			</td>
		</tr>

		<tr style="height: 45px; ">
			<th style="border:0px; text-align: left; width:25%;">TRATAMIENTO:</th>
			<td style="border:0px;">
				<textarea id="tpl_rp_tratamiento"></textarea>
				<hr color="black" size="1">
			</td>
		</tr>

	</table>

