<div class="page-content">
	<div class="page-header">
		<h1>Personal del Dispensario</h1>
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
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalPersonalDispensario">
				<i class="fa fa-plus"></i>
				Nuevo
			</button>
		<?php } ?>	
			<br><br>

			<table id="grid" class="table table-hover table-bordered table-striped table-condensed">
				<thead>
					<tr>
						<th>Fecha</th>
						<th>Codigo</th>
						<th>Especialidad</th>
						<th>Personal</th>
						<th>Cedula</th>
						<th>Correo</th>
						<th>Celular</th>
						<th>Telefono</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>	

			<?php foreach ($lista_PersonalDispensario as $fila) { ?>
			<tr class="<?php echo $fila->estado == 'INACTIVO' ? 'danger' : '' ?>">
			<td><?= $fila->fecha_registro;?></td>
			<td><?= $fila->cod_minsa;?></td>
			<td><?= $fila->especialidad;?></td>
			<td><?= $fila->nombres;?> <?= $fila->apellidos;?></td>
			<td><?= $fila->cedula;?></td>
			<td><?= $fila->email;?></td>
			<td><?= $fila->celular;?></td>
			<td><?= $fila->telefono;?></td>
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
		<button class="btn btn-info btn-xs" onclick="editarPersonalDispensario(<?php echo $fila->id ?>)"><span class="fa fa-pencil"></span></button>
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

<div class="modal fade" id="ModalPersonalDispensario" tabindex="-1" role="dialog" aria-labelledby="myModalPersonalDispensario">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalPersonalDispensario">Registro de Personal del Dispensario</h4>
			</div>
			<?php echo form_open('PersonalDispensario/registrarPersonalDispensario','class="myclass"');?>

			<div class="modal-body">
				<?php if(validation_errors()) { ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong><?php echo validation_errors(); ?></strong>
				</div>
				<?php } ?>

				<ul class="nav nav-tabs" id="tabContent">
				    <li class="active"><a href="#primero" data-toggle="tab">PERSONAL 1</a></li>
				    <li><a href="#segundo" data-toggle="tab">PERSONAL / 2</a></li>
				    <li><a href="#tercero" data-toggle="tab">PERSONAL / 3</a></li>
				</ul>

<div class="tab-content">
		<div class="tab-pane active" id="primero">
			<table class="table table-hover">
				<tbody>					
					<tr>
						<td>
							<div class="form-group">
								<label for="slc_especialista">ESPECIALISTA</label>
								<select name="slc_especialista" class="form-control">
									<?php foreach ($lista_TipoPersonal as $fila) { ?>
										<option value="<?php echo $fila->id_tipo ?>">
										<?php echo $fila->especialidad ?></option>
									<?php } ?>
								</select>
							</div>
						</td>
						<td>
							<div class="form-group">
								<label for="cod_minsa">CÓDIGO:</label>
								<input name="cod_minsa" placeholder="Código" class="form-control" />           
							</div>
						</td>
					</tr>			
				</tbody>				
			</table>
			<table class="table table-hover">
				<tbody>					
					<tr>
					<td>			
						<td>
							<div class="form-group">
								<label for="nombres">NOMBRES:</label>
								<input name="nombres" placeholder="Nombres" class="form-control" />           
							</div>
						</td>
						<td>
							<div class="form-group">
								<label for="apellidos">APELLIDOS:</label>
								<input name="apellidos" placeholder="Apellidos" class="form-control" />           
							</div>
						</td>
					</tr>			
				</tbody>				
			</table>
		</div>

		<div class="tab-pane" id="segundo">
			<table class="table table-hover">
				<tbody>					
					<tr>
						<td>
							<label for="sexo">SEXO:</label>
								  <select name="sexo" class="form-control">
								    <option>MASCULINO</option>
								    <option>FEMENINO</option>
								  </select>
						</td>
						<td>
							<label for="fecha_nacimiento">FECHA NACIMIENTO:</label>
								<div class="input-group date fj-date">
									<input name="fecha_nacimiento" type="text" class="form-control">
									<span class="input-group-addon add-on">
									<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
						</td>
						<td>
							<div class="form-group">
								<label for="cedula">CÉDULA</label>
								<input name="cedula" placeholder="Cedula" class="form-control" />           
							</div>
						</td>
					</tr>			
				</tbody>				
			</table>

			<table class="table table-hover">
				<tbody>					
					<tr>
						<td>
							<label for="estado_civil">ESTADO CIVIL:</label>
								  <select name="estado_civil" class="form-control">
								    <option>SOLTERO</option>
								    <option>SOLTERA</option>
								    <option>JUNTADO</option>
								    <option>JUNTADA</option>
								    <option>CASADO</option>
								    <option>CASADA</option>
								    <option>DIVORSIADO</option>
								    <option>DIVORSIADA</option>
								  </select>
						</td>
						<td>
							<div class="form-group">
								<label for="email">CORREO:</label>
								<input name="email" placeholder="Correo" class="form-control" />           
							</div>
						</td>
						<td>
							<div class="form-group">
								<label for="celular">CELULAR:</label>
								<input name="celular" placeholder="Número Celular" class="form-control" />           
							</div>
						</td>
					</tr>			
				</tbody>				
			</table>
		</div>		
		<div class="tab-pane" id="tercero">
			<table class="table table-hover">
				<tbody>					
					<tr>
						<td>
							<div class="form-group">
								<label for="telefono">TÉLEFONO:</label>
								<input name="telefono" placeholder=" Número Telefono" class="form-control" />           
							</div>
						</td>
						<td>
							<div class="form-group">
								<label for="nacionalidad">NACIONALIDAD:</label>
								<input name="nacionalidad" placeholder="Nacionalidad" class="form-control" />           
							</div>
						</td>
					</tr>			
				</tbody>				
			</table>
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
</div>

	<!-- Modal Actualizar-->
	<div class="modal fade" id="ModalActualizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Actualizar Personal del Dispensario</h4>
				</div>
				<?php echo form_open('PersonalDispensario/actualizar','class="myclass"');?>
					<input type="text" name="txtPersonalDispensarioId" id="txtPersonalDispensarioId" class="hide" />

					<div class="modal-body">
						<?php if(validation_errors()) { ?>
							<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong><?php echo validation_errors(); ?></strong>
							</div>
						<?php } ?>


				<ul class="nav nav-tabs" id="tabContent">
				    <li class="active"><a href="#primeroAct" data-toggle="tab">PERSONAL 1</a></li>
				    <li><a href="#segundoAct" data-toggle="tab">PERSONAL / 2</a></li>
				    <li><a href="#terceroAct" data-toggle="tab">PERSONAL / 3</a></li>
				</ul>

<div class="tab-content">
	<div class="tab-pane active" id="primeroAct">
		<table class="table table-hover">
			<tbody>					
				<tr>
					<td>
						<div class="form-group">
							<label for="slc_especialista">ESPECIALISTA</label>
							<select name="slc_especialista" id="slc_especialista" class="form-control">
								<?php foreach ($lista_TipoPersonal as $fila) { ?>
									<option value="<?php echo $fila->id_tipo ?>">
									<?php echo $fila->especialidad ?></option>
								<?php } ?>
							</select>
						</div>
					</td>
					<td>
						<div class="form-group">
							<label for="cod_minsa">CÓDIGO:</label>
							<input name="cod_minsa" id="txtcod_minsa" placeholder="Código" class="form-control" />           
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
							<label for="nombres">NOMBRES:</label>
							<input name="nombres" id="txtnombres" placeholder="Nombres" class="form-control" />           
						</div>
					</td>
					<td>
						<div class="form-group">
							<label for="apellidos">APELLIDOS:</label>
							<input name="apellidos" id="txtapellidos" placeholder="Apellidos" class="form-control" />           
						</div>
					</td>
				</tr>			
			</tbody>				
		</table>
</div>
<div class="tab-pane" id="segundoAct">
		<table class="table table-hover">
			<tbody>					
				<tr>
					<td>
						<label for="sexo">SEXO:</label>
						  <select name="sexo" class="form-control" id="txtsexo">
						    <option>MASCULINO</option>
						    <option>FEMENINO</option>
						  </select>
					</td>
					<td>
						<label for="fecha_nacimiento">FECHA NACIMIENTO:</label>
							<div class="input-group date fj-date">
								<input id="txtFechaNacimiento" name="fecha_nacimiento" type="text" class="form-control">
								<span class="input-group-addon add-on">
								<span class="glyphicon glyphicon-calendar"></span>
								</span>
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
							<label for="cedula">CÉDULA:</label>
							<input id="txtcedula" name="cedula" placeholder="Cedula" class="form-control" />           
						</div>
					</td>
					<td>
						<label for="estado_civil">ESTADO CIVIL:</label>
							  <select name="estado_civil" class="form-control" id="txtestado_civil">
							    <option>SOLTERO</option>
							    <option>JUNTADO</option>
							    <option>CASADO</option>
							    <option>DIVORSIADO</option>
							  </select>
					</td>
				</tr>			
			</tbody>				
		</table>				
</div>
<div class="tab-pane" id="terceroAct">	
<table class="table table-hover">
			<tbody>					
				<tr>				
					<td>
						<div class="form-group">
							<label for="email">CORREO:</label>
							<input name="email" id="txtemail" placeholder="Correo" class="form-control" />           
						</div>
					</td>
					<td>
						<div class="form-group">
							<label for="celular">CELULAR:</label>
							<input name="celular" id="txtcelular" placeholder="Número Celular" class="form-control" />           
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
							<label for="telefono">TÉLEFONO:</label>
							<input name="telefono" id="txttelefono" placeholder=" Número Telefono" class="form-control" />           
						</div>
					</td>
					<td>
						<div class="form-group">
							<label for="nacionalidad">NACIONALIDAD:</label>
							<input name="nacionalidad" id="txtnacionalidad" placeholder="Nacionalidad" class="form-control" />           
						</div>
					</td>
				</tr>			
			</tbody>				
		</table>
	</div>
</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>          
							<button type="submit" class="btn btn-primary">Actualizar</button>
						</div>
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
				<form method="post" action="<?php echo site_url('PersonalDispensario/cambiarEstado') ?>">
					<input type="text" name="estado_personalDispensario_id" id="estado_personalDispensario_id" class="hide" />
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
	  var lista_PersonalDispensario = <?php echo json_encode($lista_PersonalDispensario) ?>;
	  console.log(lista_PersonalDispensario);

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
		$('#ModalPersonalDispensario').modal("show");
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
			}).datepicker("setDate", "0");
  </script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/personalDispensario.js') ?>"></script>