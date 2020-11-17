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
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalDetalleFactura">
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
						<th>Paciente</th> 
						<th>Especialidad Consulta</th>  
						<th>Contado</th>
						<th>Precio Consulta</th>
						<th>Cambio</th>
						<th>Total</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>	

			<?php foreach ($lista_detalleFactura as $fila) { ?>
			<tr class="<?php echo $fila->estado == 'INACTIVO' ? 'danger' : '' ?>">
			<td><?= $fila->fecha_registro;?></td>
			<td><?= $fila->id;?></td>
			<td><?= $fila->nombre_paciente;?> <?= $fila->apellido_paciente;?></td> 
			<td><?= $fila->especialidad_consulta;?></td> 
			<td><?= $fila->contado;?></td> 
			<td><?= $fila->precio_consulta;?></td>
			<td><?= $fila->cambio;?></td> 
			<td><?= $fila->total;?></td>
			<td>
				<?php if ($fila->estado == 'ACTIVO') {
						echo '<label class="label label-default">pendiente</label>';
				}
				?>
				<?php if ($fila->estado == 'RECHAZADO') {
						echo '<label class="label label-danger">rechazado</label>';
				}
				?>
				<?php if ($fila->estado == 'AUTORIZADO') {
						echo '<label class="label label-info">autorizado</label>';
				}
				?>
			</td>
		  <td>	
			<?php if ($fila->estado == 'ACTIVO') {
				/*echo '<button class="btn btn-info btn-xs" onclick="editarDetalleFactura('. $fila->id .')"><span class="fa fa-pencil"></span></button>';*/
				echo '<button class="btn btn-success btn-xs" onclick="autorizar('. $fila->id .')"><span class="fa fa-thumbs-o-up"></span></button>';
				echo '<button class="btn btn-warning btn-xs" onclick="cancelar('. $fila->id .')"><span class="fa fa-power-off"></span></button>';
				echo '<button class="active btn btn-primary btn-xs" onclick="VerReporte('. $fila->id .')"><span class="fa fa-chevron-circle-down"></span></button>';
				/*echo '<button class="btn btn-info btn-xs" onclick="editarDetalleFactura('. $fila->id .')"><span class="fa fa-pencil"></span></button>';*/
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
 									<td>
										<div class="form-group">
											<label for="slc_num_exp">NÚMERO EXPEDIENTE</label>
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
											<label for="slc_tip_cst">TÍPO DE CONSULTA</label>
											<select name="slc_tip_cst" class="form-control">
												<?php foreach ($lista_tiposConsultas as $fila) { ?>
													<option value="<?php echo $fila->id_tipo_consulta ?>">
													<?php echo $fila->especialidad_consulta ?></option>
												<?php } ?>
											</select>
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
											<label for="contado">CONTADO:</label>
											<input name="contado" placeholder="contado" class="form-control" />						
										</div>
									</td>
									<td>
										<div class="form-group">
											<label for="precio_consulta">PRECIO CONSULTA:</label>
											<input name="precio_consulta" placeholder="PRECIO" class="form-control" />						
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
	<div class="modal fade" id="ModalActualizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Actualizar Detalle Factura</h4>
				</div>
				<?php echo form_open('DetalleFactura/actualizar','class="myclass"');?>
					<input type="text" name="txtDetallefacturaId" id="txtDetallefacturaId" class="hide" />

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
													<label for="slc_num_exp">NÚMERO</label>
													<select name="slc_num_exp" id="slc_num_exp"  class="form-control" disabled>
														<?php foreach ($lista_Paciente as $fila) { ?>
															<option value="<?php echo $fila->id_Paciente ?>" disabled>
															<?php echo $fila->num_expediente ?></option>
														<?php } ?>
													</select>
												</div>
											</td>  
											<td>
												<div class="form-group">
													<label for="slc_tip_cst">TÍPO DE CONSULTA</label>
													<select name="slc_tip_cst" id="slc_tip_cst" class="form-control">
														<?php foreach ($lista_tiposConsultas as $fila) { ?>
															<option value="<?php echo $fila->id_tipo_consulta ?>">
															<?php echo $fila->especialidad_consulta ?></option>
														<?php } ?>
													</select>
												</div>
											</td> 
											<td>
												<div class="form-group">
													<label for="precio">PRECIO:</label>
													<input name="precio" id="txtprecio" placeholder="Precio" class="form-control" />						
												</div>
											</td>
										</tr>			
									</tbody>				
								</table>

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
<!-- 	<div class="modal fade" id="ModalEstado" tabindex="-1" role="dialog" aria-labelledby="lblModalEstado">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="lblModalEstado">Confirmar</h4>
				</div>
				<form method="post" action="<?php echo site_url('DetalleFactura/CancelarDetalle') ?>">
					<input type="text" name="estado_detalle_id" id="estado_detalle_id" class="hide" />

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
	</div> -->

<!-- Modal Autorizar Estado -->
	<div class="modal fade" id="ModalAutorizar" tabindex="-1" role="dialog" aria-labelledby="lblModalAutorizar" style="display:none;">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="lblModalAutorizar">Confirmar</h4>
				</div>
				<form method="post" action="<?php echo site_url('DetalleFactura/otorgarDetalleFactura') ?>">
					<input type="text" name="detallefactura_id" id="detallefactura_id" class="hide" />
					<input type="text" name="autorizar_estado" id="autorizar_estado" class="hide" />

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
				<h4 class="modal-title" id="lblVistaImprimir">Recibo Factura</h4>
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
	  var lista_detalleFactura = <?php echo json_encode($lista_detalleFactura) ?>;
	  console.log(lista_detalleFactura);

	  var lista_reportefactura_Existente = <?php echo json_encode($lista_reportefactura_Existente) ?>;
	console.log(lista_reportefactura_Existente);

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
				$('#ModalDetalleFactura').modal("show");
			<?php } ?>			
		});		
  </script>

<script type="text/javascript" src="<?php echo base_url('assets/js/detalleFactura.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/reporte_factura.js') ?>"></script>