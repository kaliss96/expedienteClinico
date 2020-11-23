<div class="page-content">
	<div class="page-header">
		<h1>Paciente</h1>
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<?php if ($this->session->flashdata('success')){ ?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<?php echo $this->session->flashdata('success') ?>
				</div>
			<?php } ?>

			<?php if ($this->session->flashdata('error')){ ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<?php echo $this->session->flashdata('error') ?>
				</div>
			<?php } ?>
		<?php if ($prfm_inserta == 1){ ?>	
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalPaciente">
				<i class="fa fa-plus"></i>
				Nuevo
			</button>
		<?php } ?>	
			<br><br>

			<table id="grid" class="table table-hover table-bordered table-striped table-condensed">
				<thead>
					<tr>
						<th>Fecha Registro</th>
						<th>Numero Expediente</th>
						<th>Nombre Paciente</th>
						<th>Fecha Nacimiento</th>
						<th>Cedula</th>
						<th>Celular</th>
						<th>Estado Civil</th>
						<th>Tipo Sangre</th>
						<th>Sexo</th>
						<th>Estado</th>			
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>

				<?php foreach ($lista_paciente as $fila) { ?>
				<tr class="<?php echo $fila->estado == 'INACTIVO' ? 'danger' : '' ?>">
				<td><?= $fila->fecha_registro;?></td>
				<td><?= $fila->num_expediente;?></td>
				<td><?= $fila->nombre_paciente;?> <?= $fila->apellido_paciente;?></td>
				<td><?= $fila->fecha_nacimiento;?></td>
				<td><?= $fila->cedula;?></td>
				<td><?= $fila->celular;?></td>
				<td><?= $fila->estado_civil;?></td>
				<td><?= $fila->tipo_sangre;?></td>
				<td><?= $fila->sexo;?></td>
				<td>
			  <?php if ($fila->estado == 'ACTIVO') {
				  echo '<label class="label label-success">activo</label>';
				}
				else {
				  echo '<label class="label label-danger">inactivo</label>';
				}?>
			  </td>
				<td>
			<?php if ($prfm_actualiza == 1){ ?>	
			  <button class="btn btn-info btn-xs" onclick="editarPaciente(<?php echo $fila->id ?>)"><span class="fa fa-pencil"></span></button>
			<?php } ?> 
			  <?php if ($fila->estado == 'ACTIVO') {
				echo '<button class="btn btn-danger btn-xs" onclick="desactivar('. $fila->id .')"><span class="fa fa-power-off"></span></button>';
				}else{
				 echo '<button class="btn btn-success btn-xs" onclick="activar('. $fila->id .')"><span class="fa fa-power-off"></span></button>';
				}?>
			  </td>
				</tr>
				<?php } ?>
		  </tbody>
	</table>

			<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->

<!-- Modal -->
	<div class="modal fade" id="ModalPaciente" tabindex="-1" role="dialog" aria-labelledby="myModalPaciente">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalPaciente">Registro de Paciente</h4>
				</div>
				<?php echo form_open('Paciente/registrar_Paciente','class="myclass"');?>

				<div class="modal-body">
					<?php if(validation_errors()) { ?>
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong><?php echo validation_errors(); ?></strong>
						</div>
					<?php } ?>

<ul class="nav nav-tabs" id="tabContent">
    <li class="active"><a href="#details" data-toggle="tab">Detalle 1</a></li>
    <li><a href="#access-security" data-toggle="tab">Detalle / 2</a></li>
</ul>

	<div class="tab-content">
		<div class="tab-pane active" id="details">	        
			<table class="table table-hover">
				<tbody>					
					<tr>            
						<td>					
							<div class="form-group">
								<label for="num_expediente">Número :</label>
								<input name="num_expediente" placeholder="Número " class="form-control" />						
							</div>
						</td>
						<td>					
							<div class="form-group">
								<label for="nombre_paciente">Nombre:</label>
								<input name="nombre_paciente" placeholder="Nombre" class="form-control" />						
							</div>
						</td>
						<td>
							<div class="form-group">
								<label for="apellido_paciente">Apellido Paciente:</label>
								<input name="apellido_paciente" placeholder="Apellido Paciente" class="form-control" />						
							</div>
						</td>
					</tr>			
				</tbody>				
			</table>

			<table class="table table-hover">
				<tbody>					
					<tr>
						<td>
							<label for="fecha_nacimiento">Fecha Nacimiento:</label>
							<div class="input-group date fj-date">
								<input name="fecha_nacimiento" type="text" class="form-control">
								<span class="input-group-addon add-on">
								<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</td>

						<td>
							<div class="form-group">
								<label for="cedula">Cedula:</label>
								<input name="cedula" placeholder="Cedula" class="form-control" />						
							</div>
						</td>

						<td>
							<div class="form-group">
								<label for="celular">Celular:</label>
								<input name="celular" placeholder="Celular" class="form-control" />						
							</div>
						</td>	
					</tr>			
				</tbody>				
			</table>

			<table class="table table-hover">
		<tbody>					
			<tr>
				<td>
					<label for="tipo_sangre">Tipo de Sangre:</label>
					  <select name="tipo_sangre" class="form-control">
					    <option>O +</option>
					    <option>O -</option>
					  </select>
				</td>
				<td>
					<label for="sexo">Sexo:</label>
					  <select name="sexo" class="form-control">
					    <option>MASCULINO</option>
					    <option>FEMENINO</option>
					  </select>
				</td>
			</tr>			
		</tbody>				
		</table>	            
	 </div>
	<div class="tab-pane" id="access-security">
		<table class="table table-hover">
			<tbody>					
				<tr>
					<td>
						<div class="form-group">
							<label for="correo">Correo:</label>
							<input name="correo" placeholder="Correo" class="form-control" />						
						</div>										
					</td>
					<td>
						<div class="form-group">
							<label for="telefono">Telefono:</label>
							<input name="telefono" placeholder="Telefono" class="form-control" />						
						</div>
					</td>
					<td>
						<div class="form-group">
							<label for="estado_civil">Estado Civil:</label>
							<input name="estado_civil" placeholder="Estado Civil" class="form-control" />						
						</div>
					</td>
				</tr>			
			</tbody>				
		</table>

		<div class="form-group">
			<label for="direccion" class="control-label">Direccion:</label>
			<textarea name="direccion" class="form-control" rows="4" name="message" placeholder="Direccion"></textarea>
		</div>
     </div>

</div>
</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>	
					<button type="submit" class="btn btn-primary">Registrar</button>
				</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>

	<!-- Modal Actualizar-->
	<div class="modal fade" id="ModalActualizar" tabindex="-1" role="dialog" aria-labelledby="myModalActualizar">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalActualizar">Actualizar  Paciente</h4>
				</div>
				<?php echo form_open('Paciente/actualizar','class="myclass"');?>
					<input type="text" name="txtPacienteId" id="txtPacienteId" class="hide" />

				<div class="modal-body">
					<?php if(validation_errors()) { ?>
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong><?php echo validation_errors(); ?></strong>
						</div>
					<?php } ?>

<table class="table table-hover">
	<tbody>					
		<tr>            
			<td>					
				<div class="form-group">
					<label for="num_expediente">Número :</label>
					<input name="num_expediente" id="txtnum_expediente" placeholder="Número " class="form-control" />						
				</div>
			</td>
			<td>					
				<div class="form-group">
					<label for="nombre_paciente">Nombre:</label>
					<input name="nombre_paciente" id="txtnombre_paciente" placeholder="Nombre" class="form-control" />						
				</div>
			</td>
			<td>
				<div class="form-group">
					<label for="apellido_paciente">Apellido Paciente:</label>
					<input name="apellido_paciente" id="txtapellido_paciente" placeholder="Apellido Paciente" class="form-control" />						
				</div>
			</td>
		</tr>			
	</tbody>				
</table>

<table class="table table-hover">
	<tbody>					
		<tr>
			<td>
				<label for="fecha_nacimiento">Fecha Nacimiento:</label>
				<div class="input-group date fj-date">
					<input name="fecha_nacimiento" id="lblfecha_nacimiento" type="text" class="form-control">
					<span class="input-group-addon add-on">
					<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</td>

			<td>
				<div class="form-group">
					<label for="cedula">Cedula:</label>
					<input name="cedula" id="txtcedula" placeholder="Cedula" class="form-control" />						
				</div>
			</td>

			<td>
				<div class="form-group">
					<label for="celular">Celular:</label>
					<input name="celular" id="txtcelular" placeholder="Celular" class="form-control" />						
				</div>
			</td>	
		</tr>			
	</tbody>				
</table>

<table class="table table-hover">
	<tbody>					
		<tr>
			<td>
				<div class="form-group">
					<label for="correo">Correo:</label>
					<input type="email" name="correo" id="txtcorreo" placeholder="Correo" class="form-control" />						
				</div>										
			</td>
			<td>
				<div class="form-group">
					<label for="telefono">Telefono:</label>
					<input name="telefono" id="txttelefono" placeholder="Telefono" class="form-control" />						
				</div>
			</td>
<!-- 			<td>
				<label for="estado_civil">Estado Civil:</label>
				  <select name="estado_civil" id="txtestado_civil" class="form-control">
				    <option>soltero</option>
				    <option>casado</option>
				  </select>
			</td> -->
			<td>
				<div class="form-group">
					<label for="estado_civil">Estado Civil:</label>
					<input name="estado_civil" id="txtestado_civil" placeholder="Estado Civil" class="form-control" />						
				</div>
			</td>
		</tr>			
	</tbody>				
</table>

	<div class="form-group">
		<label for="direccion" class="control-label">Direccion:</label>
		<textarea name="direccion" id="txtdireccion" class="form-control" rows="4" name="message" placeholder="Direccion"></textarea>
	</div>

<table class="table table-hover">
	<tbody>					
		<tr>
			<td>
				<label for="tipo_sangre">Tipo de Sangre:</label>
				  <select name="tipo_sangre" id="txttipo_sangre" class="form-control">
				    <option>O +</option>
				    <option>O -</option>
				  </select>
			</td>
			<td>
				<label for="sexo">Sexo:</label>
				  <select name="sexo" class="form-control" id="txtsexo">
				    <option>MASCULINO</option>
				    <option>FEMENINO</option>
				  </select>
			</td>
		</tr>			
	</tbody>				
</table>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>					
				<button type="submit" class="btn btn-primary">Actualizar</button>
			</div>
			<?php echo form_close() ?>
		</div>
	</div>
</div>

<!-- Modal Cambio Estado -->
	<div class="modal fade" id="ModalEstado" tabindex="-1" role="dialog" aria-labelledby="lblModalEstado">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="lblModalEstado">Confirmar</h4>
				</div>
				<form method="post" action="<?php echo site_url('Paciente/cambiarEstado') ?>">
					<input type="text" name="estado_paciente_id" id="estado_paciente_id" class="hide" />
					<input type="text" name="cambio_estado" id="cambio_estado" class="hide" />

					<div class="modal-body">
						<div class="form-group">
						<h4 id="lblMensajeEstado" class="text-warning text-center"></h4>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn" id="btnConfirmarEstado">Confirmar</button>
					</div>
				</form>	
			</div>
		</div>
	</div>

	<script type="text/javascript">

		var lista_paciente = <?php echo json_encode($lista_paciente) ?>;
		console.log(lista_paciente);

		$(document).on('ready', function(){
		$('#grid').DataTable( {
		"language": {
		           "lengthMenu": "Vista _MENU_ Número de páginas",
		           "info": "Mostrar páginas _PAGE_ de _PAGES_",
		           "sSearch":         "Buscar:",
		           "sLoadingRecords": "Cargando...",
				    "oPaginate": {
				        "sFirst":    "Primero",
				        "sLast":     "Último",
				        "sNext":     "Siguiente",
				        "sPrevious": "Anterior"
				    },
				    "sZeroRecords":    "No se encontraron resultados",
				    "sEmptyTable":     "Ningún dato disponible en esta tabla",
				    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		           "infoFiltered": "(filtered from _MAX_ total records)"
		}
		}); 

			<?php if(validation_errors()) { ?>
				$('#ModalPaciente').modal("show");
			<?php } ?>
		});

		$.fn.datepicker.dates['es'] = {
		days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
		daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
		daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
		months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", 
		"Septiembre", "Octubre", "Noviembre", "Diciembre"],
		monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
		today: "Hoy",
		monthsTitle: "Meses",
		clear: "Borrar",
		weekStart: 1,
		format: "dd/mm/yyyy"
		};

		$('.fj-date').datepicker({
				daysOfWeekDisabled: "0,6",
			    format: "dd/mm/yyyy",
			    language : 'es',
			    autoclose: true,
		    	toggleActive: true
			});
	</script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/paciente.js') ?>"></script>	