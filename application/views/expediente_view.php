<div class="page-content">
	<div class="page-header">
		<h1>CONSULTAS</h1>
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
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalExpediente">
				<i class="fa fa-plus"></i>
				Nuevo
			</button>
		<?php } ?>	
			<br><br>

			<table id="grid" class="table table-hover table-bordered table-striped table-condensed">
				<thead>
					<tr>
						<th>Fecha Registro</th>
						<th>Número Expediente</th>
						<th>Nombre Paciente</th>
						<th>Sintomas</th>
						<th>Enfermedad</th>
						<th>Detalle de enfermedad</th>
						<th>Tratamiento</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>	

		<?php foreach ($lista_expediente as $fila) { ?>
			<tr class="<?php echo $fila->estado == 'INACTIVO' ? 'danger' : '' ?>">
			<td><?= $fila->fecha_registro;?></td>
			<td><?php echo $fila->num_expediente;?></td>
			<td><?php echo $fila->nombre_paciente;?> <?php echo $fila->apellido_paciente;?></td> 			
			<td><?php echo $fila->sintomas;?></td> 
			<td><?= $fila->enfermedad;?></td>
			<td><?= $fila->detalle_enfermedad;?></td>
			<td><?= $fila->tratamiento;?></td>
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
		  <button class="btn btn-info btn-xs" onclick="editarExpediente(<?php echo $fila->id ?>)"><span class="fa fa-pencil"></span></button>
		<?php } ?>
		  
		  <?php if ($fila->estado == 'ACTIVO') {
			echo '<button class="btn btn-danger btn-xs" onclick="desactivar('. $fila->id .')"><span class="fa fa-power-off"></span></button>';
		  	echo '<button class="active btn btn-primary btn-xs" onclick="VerReporte('. $fila->id .')"><span class="fa fa-chevron-circle-down"></span></button>';
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
	<div class="modal fade" id="ModalExpediente" tabindex="-1" role="dialog" aria-labelledby="myModalExpediente">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalExpediente">Registro de Consulta</h4>
				</div>
				<?php echo form_open('Expediente/registrar_Expediente','class="myclass"');?>

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
								<label for="slc_num_exp">Número</label>
								<select name="slc_num_exp" class="form-control">
									<?php foreach ($lista_Paciente as $fila) { ?>
										<option value="<?php echo $fila->id_Paciente ?>">
										<?php echo $fila->num_expediente ?></option>
									<?php } ?>
								</select>
							</div> 
						</td>   
						<td>
							<div class="form-group">
								<label for="pulso">Pulso:</label>
								<input name="pulso" placeholder="Pulso" class="form-control" />						
							</div>
						</td>
						<td>
							<div class="form-group">
								<label for="tension_arterial">Tensión Arterial:</label>
								<input name="tension_arterial" placeholder="Tensión Arterial" class="form-control" />						
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
								<label for="frecuencia_cardiaca">Frecuencia Cardiaca:</label>
								<input name="frecuencia_cardiaca" placeholder="Frecuencia Cardiaca" class="form-control" />						
							</div>
						</td> 
						<td>
							<div class="form-group">
								<label for="frecuencia_reumatoide">Frecuencia Reumatoide:</label>
								<input name="frecuencia_reumatoide" placeholder="Frecuencia Reumatoide" class="form-control" />						
							</div>
						</td>
						<td>
							<div class="form-group">
								<label for="estatura">Estatura:</label>
								<input name="estatura" placeholder="Estatura" class="form-control" />						
							</div>
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
								<label for="peso">Peso</label>
								<input name="peso" placeholder="Peso" class="form-control" />						
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

		<!-- Modal Actualizar-->
<div class="modal fade" id="ModalActualizar" tabindex="-1" role="dialog" aria-labelledby="myModalActualizar">
	<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalActualizar">Regisitrar Consulta</h4>
				</div>
				<?php echo form_open('Expediente/actualizar','class="myclass"');?>
					<input type="text" name="txtExpedienteId" id="txtExpedienteId" class="hide" />

					<div class="modal-body">
						<?php if(validation_errors()) { ?>
							<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong><?php echo validation_errors(); ?></strong>
							</div>
						<?php } ?>

						<ul class="nav nav-tabs" id="tabContent">
						    <li class="active"><a href="#primero" data-toggle="tab">Detalle 1</a></li>
						    <li><a href="#segundo" data-toggle="tab">Detalle / 2</a></li>
						    <li><a href="#tercero" data-toggle="tab">Detalle / 3</a></li>
						    <li><a href="#cuarto" data-toggle="tab">Detalle / 4</a></li>
						</ul>				

							<div class="tab-content">
								<div class="tab-pane active" id="primero">
									<table class="table table-hover">
										<tbody>					
											<tr>
												<td>
													<div class="form-group">
														<label for="slc_num_exp">Número</label>
														<select name="slc_num_exp" id="slc_num_exp" class="form-control" disabled>
															<?php foreach ($lista_Paciente as $fila) { ?>
																<option value="<?php echo $fila->id_Paciente ?>" disabled>
																<?php echo $fila->num_expediente ?></option>
															<?php } ?>
														</select>
													</div>
												</td>
												<td>
													<div class="form-group">
														<label for="pulso">Pulso:</label>
														<input name="pulso" id="txtpulso" placeholder="Pulso" class="form-control" />						
													</div>
												</td>
												<td>
													<div class="form-group">
														<label for="tension_arterial">Tensión Arterial:</label>
														<input name="tension_arterial" id="txttension_arterial" placeholder="Tensión Arterial" class="form-control" />						
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
														<label for="frecuencia_cardiaca">Frecuencia Cardiaca:</label>
														<input name="frecuencia_cardiaca" id="txtfrecuencia_cardiaca" placeholder="Frecuencia Cardiaca" class="form-control" />						
													</div>
												</td> 
												<td>
													<div class="form-group">
														<label for="frecuencia_reumatoide">Frecuencia Reumatoide:</label>
														<input name="frecuencia_reumatoide" id="txtfrecuencia_reumatoide" placeholder="Frecuencia Reumatoide" class="form-control" />						
													</div>
												</td>
												<td>
													<div class="form-group">
														<label for="estatura">Estatura:</label>
														<input name="estatura" id="txtestatura" placeholder="Estatura" class="form-control" />						
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
														<label for="peso">Peso</label>
														<input name="peso" id="txtpeso" placeholder="Peso" class="form-control" />						
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
													<div class="form-group">
														<label for="sintomas" class="control-label">Sintomas:</label>
														<textarea name="sintomas" id="txtsintomas" class="form-control" rows="4" name="message" placeholder="Sintomas"></textarea>
													</div>
												</td> 
												<td>
													<div class="form-group">
														<label for="enfermedad">Enfermedad:</label>
														<input name="enfermedad" id="txtenfermedad" placeholder="Enfermedad" class="form-control" />						
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
														<label for="detalle_enfermedad" class="control-label">Detalle Enfermedad:</label>
														<textarea name="detalle_enfermedad" id="txtdetalle_enfermedad" class="form-control" rows="4" name="message" placeholder="Detalle Enfermedad"></textarea>
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
														<label for="evolucion" class="control-label">Evolución:</label>
														<textarea name="evolucion" id="txtevolucion" class="form-control" rows="4" name="message" placeholder="Evolución"></textarea>
													</div>
												</td>
											</tr>			
										</tbody>				
									</table>
								</div>

								<div class="tab-pane" id="cuarto">
									<table class="table table-hover">
										<tbody>					
											<tr>
												<td>
													<label for="orden_examen">Orden del Examen:</label>
													  <select name="orden_examen" class="form-control">
													    <option>SI</option>
													    <option>NO</option>
													  </select>
												</td>
												<td>
													<div class="form-group">
														<label for="detalle_orden" class="control-label">Detalle Orden Examen:</label>
														<textarea name="detalle_orden" id="txtdetalle_orden" class="form-control" rows="4" name="message" placeholder="Detalle Orden"></textarea>
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
														<label for="tratamiento" class="control-label">Tratamiento:</label>
														<textarea name="tratamiento" id="txttratamiento" class="form-control" rows="4" name="message" placeholder="Tratamiento"></textarea>
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
				<form method="post" action="<?php echo site_url('Expediente/cambiarEstado') ?>">
					<input type="text" name="estado_expediente_id" id="estado_expediente_id" class="hide" />
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

<!-- Imprimir Reporte-->
<div class="modal fade" id="reporte_imprimir" tabindex="-1" role="dialog" aria-labelledby="lblVistaImprimir">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="lblVistaImprimir">Gestión de Consultas Médicas</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn" onclick="ImprimirReporte()">Imprimir</button>
			</div>
			<form method="post">
				<div class="modal-body" class="hide">
					<?php echo $reporte_html ?>
				</div>
				
			</form>	
		</div>
	</div>
</div>

	<script type="text/javascript">

		var lista_expediente = <?php echo json_encode($lista_expediente) ?>;
		console.log(lista_expediente);

		var lista_reporteConsulta_Existente = <?php echo json_encode($lista_reporteConsulta_Existente) ?>;
		console.log(lista_reporteConsulta_Existente);

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
				$('#ModalExpediente').modal("show");
			<?php } ?>
		});		
	</script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/expediente.js') ?>"></script>	
	<script type="text/javascript" src="<?php echo base_url('assets/js/reporteConsulta.js') ?>"></script>	