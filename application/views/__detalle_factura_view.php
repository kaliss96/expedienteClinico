<div class="page-content">
	<div class="page-header">
		<h1>Detalle de la Factura</h1>
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
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalEpicrisis">
				<i class="fa fa-plus"></i>
				Nuevo
			</button>
		<?php } ?>	
			<br><br>

			<table id="grid" class="table table-hover table-bordered table-striped table-condensed">
				<thead>
					<tr>
						<th>Fecha Registro</th>
						<th>Número Factura</th>
						<!-- <th>Paciente</th> -->
						<!-- <th>Especialidad</th> -->
						<th>Precio</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>	

			<?php foreach ($lista_detalleFactura as $fila) { ?>
			<tr class="<?php echo $fila->estado == 'INACTIVO' ? 'danger' : '' ?>">
			<td><?= $fila->fecha_registro;?></td>
			<td><?= $fila->id;?></td>
			<!-- <td><?= $fila->nombre_paciente;?> <?= $fila->apellido_paciente;?></td> -->
			<!-- <td><?= $fila->especialidad;?></td> -->
			<td><?= $fila->precio;?></td>
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
		  <button class="btn btn-info btn-xs" onclick="editarDetalleFactura(<?php echo $fila->id ?>)"><span class="fa fa-pencil"></span></button>
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

<!-- Modal -->
<div class="modal fade" id="ModalDetalleFactura" tabindex="-1" role="dialog" aria-labelledby="myModalDetalleFactura">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalDetalleFactura">Registro de DetalleFactura</h4>
			</div>
			<?php echo form_open('DetalleFactura/registrar_DetalleFactura','class="myclass"');?>

			<div class="modal-body">
				<?php if(validation_errors()) { ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong><?php echo validation_errors(); ?></strong>
				</div>
				<?php } ?>

				<ul class="nav nav-tabs" id="tabContent">
				        <li class="active"><a href="#primero" data-toggle="tab">INICIO</a></li>
				</ul>

				<div class="tab-content">

					<div class="tab-pane active" id="primero">
						<table class="table table-hover">
							<tbody>					
								<tr>
<!-- 									<td>
										<div class="form-group">
											<label for="slc_num_exp">NÚMERO</label>
											<select name="slc_num_exp" class="form-control">
												<?php foreach ($lista_Paciente as $fila) { ?>
													<option value="<?php echo $fila->id_Paciente ?>">
													<?php echo $fila->num_expediente ?></option>
												<?php } ?>
											</select>
										</div>
									</td>  --> 
<!-- 									<td>
										<div class="form-group">
											<label for="slc_num_exp">NÚMERO</label>
											<select name="slc_num_exp" class="form-control">
												<?php foreach ($lista_Paciente as $fila) { ?>
													<option value="<?php echo $fila->id_Paciente ?>">
													<?php echo $fila->num_expediente ?></option>
												<?php } ?>
											</select>
										</div>
									</td> -->
									<td>
										<div class="form-group">
											<label for="precio">PRECIO:</label>
											<input name="precio" placeholder="Precio" class="form-control" />						
										</div>
									</td>
								</tr>			
							</tbody>				
						</table>
							
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
</div>

	<!-- Modal Actualizar-->
	<div class="modal fade" id="ModalActualizar" tabindex="-1" role="dialog" aria-labelledby="myModalActualizar">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalActualizar">Actualizar DetalleFactura</h4>
				</div>
				<?php echo form_open('DetalleFactura/actualizar','class="myclass"');?>
					<input type="text" name="txtDetalleFacturaId" id="txtDetalleFacturaId" class="hide" />

					<div class="modal-body">
						<?php if(validation_errors()) { ?>
							<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong><?php echo validation_errors(); ?></strong>
							</div>
						<?php } ?>

						<ul class="nav nav-tabs" id="tabContent">
				        <li class="active"><a href="#act_primero" data-toggle="tab">INICIO</a></li>
				        <li><a href="#act_segundo" data-toggle="tab">ENFERMEDADES</a></li>
				        <li><a href="#act_tercero" data-toggle="tab">DIAGNOSTICOS</a></li>
				        <li><a href="#act_cuarto" data-toggle="tab">CIRUGÍAS</a></li>
				        <li><a href="#act_quinto" data-toggle="tab">DETALLE CIRUGÍA</a></li>
				</ul>

				<div class="tab-content">

					<div class="tab-pane active" id="act_primero">
						<table class="table table-hover">
							<tbody>					
								<tr>
									<td>
										<div class="form-group">
											<label for="slc_num_exp">NÚMERO</label>
											<select name="slc_num_exp" id="slc_num_exp"  class="form-control">
												<?php foreach ($lista_Paciente as $fila) { ?>
													<option value="<?php echo $fila->id_Paciente ?>">
													<?php echo $fila->num_expediente ?></option>
												<?php } ?>
											</select>
										</div>
									</td>  
									<td>
										<div class="form-group">
											<label for="clinica">CLÍNICA:</label>
											<input name="clinica" id="txtclinica" placeholder="Clínica" class="form-control" />						
										</div>
									</td>
									<td>
										<div class="form-group">
											<label for="sala">SALA:</label>
											<input name="sala"  id="txtsala" placeholder="Sala" class="form-control" />						
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
											<label for="no_cama">NO CAMA:</label>
											<input name="no_cama" id="txtno_cama" placeholder="Número de Cama" class="form-control" />						
										</div>
									</td>
									<td>
										<div class="form-group">
											<label for="enfermedad">ENFERMEDAD:</label>
											<textarea name="enfermedad" id="txtenfermedad" class="form-control" rows="4" name="message" placeholder="Enfermedad"></textarea>		
										</div>
									</td>					
								</tr>			
							</tbody>				
						</table>
					</div>

					<div class="tab-pane" id="act_segundo">
						<table class="table table-hover">
							<tbody>					
								<tr>
									<td>
										<div class="form-group">
											<label for="complicaciones" class="control-label">DETALLE ENFERMEDAD:</label>
											<textarea name="complicaciones" id="txtcomplicaciones" class="form-control" rows="4" name="message" placeholder="Detalle Enfermedad"></textarea>
										</div>
									</td>
									<td>
										<div class="form-group">
											<label for="examenes_realizados">EXAMENES REALIZADOS:</label>
											<textarea name="examenes_realizados" id="txtexamenes_realizados" class="form-control" rows="4" name="message" placeholder="Examenes Realizados"></textarea>					
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
											<label for="tratamientos_recibidos">TRATAMIENTOS RECIBIDOS:</label>
											<textarea name="tratamientos_recibidos" id="txttratamientos_recibidos" class="form-control" rows="4" name="message" placeholder="Examenes Realizados"></textarea>						
										</div>
									</td>					
								</tr>			
							</tbody>				
						</table>		
					</div>

					<div class="tab-pane" id="act_tercero">
						<table class="table table-hover">
							<tbody>					
								<tr>
									<td>
										<div class="form-group">
												<label for="diagnostico_ingreso" class="control-label">DIAGOSTÍCO INGRESO:</label>
												<textarea name="diagnostico_ingreso" id="txtdiagnostico_ingreso" class="form-control" rows="4" name="message" placeholder="Diagnostíco Ingreso"></textarea>
											</div>
									</td>
									</tr>
									<tr>
									<td>
										<div class="form-group">
											<label for="diagnostico_egreso" class="control-label">DIAGOSTÍCO EGRESO:</label>
											<textarea name="diagnostico_egreso" id="txtdiagnostico_egreso" class="form-control" rows="4" name="message" placeholder="Diagnostíco Egreso"></textarea>
										</div>
									</td>
								</tr>			
							</tbody>				
						</table>		
					</div>

					<div class="tab-pane" id="act_cuarto">
						<table class="table table-hover">
							<tbody>					
								<tr>
									<td>
										<div class="form-group">
											<label for="cirugia">CIRUGÍAS:</label>
											<textarea name="cirugia" id="txtcirugia" class="form-control" rows="4" name="message" placeholder="cirugías"></textarea>	
										</div>
									</td>
									<td>
										<div class="form-group">
												<label for="resultado_examen" class="control-label">RESULTADO EXAMEN:</label>
												<textarea name="resultado_examen" id="txtresultado_examen" class="form-control" rows="4" name="message" placeholder="Resultado Examen"></textarea>
											</div>
									</td>			
								</tr>			
							</tbody>				
						</table>	
					</div>

					<div class="tab-pane" id="act_quinto">
						<table class="table table-hover">
							<td>
								<div class="form-group">
									<label for="motivo_cirugia">MOTIVO DE CIRUGÍA:</label>
									<textarea name="motivo_cirugia" id="txtmotivo_cirugia" class="form-control" rows="4" name="message" placeholder="Motivo de Cirugía"></textarea>
								</div>
							</td>
						</table>
					</div>

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
				<form method="post" action="<?php echo site_url('DetalleFactura/cambiarEstado') ?>">
					<input type="text" name="estado_detalle_factura_id" id="estado_detalle_factura_id" class="hide" />
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
	  var lista_detalleFactura = <?php echo json_encode($lista_detalleFactura) ?>;
	  console.log(lista_detalleFactura);

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
				$('#ModalEpicrisis').modal("show");
			<?php } ?>			
		});

		
  </script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/epicrisis.js') ?>"></script>