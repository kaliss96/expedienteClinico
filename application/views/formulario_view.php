<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
<div class="page-content">
	<div class="page-header">
		<h1>Formularios del sistema</h1>
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
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalFormulario">
				<i class="fa fa-plus"></i>
				Nuevo
			</button>
			<?php } ?>
			<br><br>

			<table id="grid" class="table table-hover table-bordered table-striped table-condensed">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Estado</th>
						<th>Controlador</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
						<?php foreach ($lista_formularios as $fila) { ?>
					
						<tr class="<?php echo $fila->estado == 'INACTIVO' ? 'danger' : '' ?>">          
							<td><?php echo $fila->nombre;?></td>
							<td><?php echo $fila->descripcion;?></td>
							<td>
								<?php if ($fila->estado == 'ACTIVO') {
									echo '<label class="label label-success">activo</label>';
								}
								else {
									echo '<label class="label label-danger">inactivo</label>';
								}?>
							</td>
							<td><?php echo $fila->controlador;?></td>					
							<td>
							<?php if ($prfm_actualiza == 1){ ?>
							<button class="btn btn-info btn-xs" onclick="editarFormulario(<?php echo $fila->id ?>)"><span class="fa fa-pencil"></span></button>
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
	<div class="modal fade" id="ModalFormulario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Registro de Formulario</h4>
				</div>
				<?php echo form_open('formulario/registrar_formulario','class="myclass"');?>

				<div class="modal-body">
					<?php if(validation_errors()) { ?>
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong><?php echo validation_errors(); ?></strong>
						</div>
					<?php } ?>

					<div class="form-group">
						<label for="slc_menu">Menu</label>
						<select name="slc_menu" class="form-control">
							<?php foreach ($lista_menus as $fila) { ?>
								<option value="<?php echo $fila->id ?>">
								<?php echo $fila->nombre ?></option>
							<?php } 
								?>
						</select>
					</div>

					<div class="form-group">
						<label for="nombre">Nombre:</label>
						<input name="nombre" placeholder="Nombre" class="form-control" />						
					</div>

					<div class="form-group">
						<label for="message" class="control-label">Descripción:</label>
						<textarea name="descripcion" class="form-control" rows="4" name="message" placeholder="Descripcion"></textarea>
					</div>
					
					<div class="form-group">
						<label for="message" class="control-label">Controlador:</label>
						<input name="controlador" placeholder="Controlador" class="form-control" />
					</div>
			
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Registrar</button>
				</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>

	<!-- Modal Actualizar Formulario -->
	<div class="modal fade" id="ModalActualizar" tabindex="-1" role="dialog" aria-labelledby="lblModalActualizar">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="lblModalActualizar">Actualizar de Formulario</h4>
				</div>

				<?php echo form_open('Formulario/actualizar');?>				
					<input type="text" name="txtFormularioId" id="txtFormularioId" class="hide" />

				<div class="modal-body">
					<div class="form-group">
						<label for="slc_menu">Menu</label>
						<select name="slc_menu" id="slc_menu" class="form-control">
							<?php foreach ($lista_menus as $fila) { ?>
								<option value="<?php echo $fila->id ?>">
								<?php echo $fila->nombre ?></option>
							<?php } 
								?>
						</select>
					</div>

					<div class="form-group">
						<label for="nombre">Nombre:</label>
						<input name="nombre" id="txtNombre" placeholder="Nombre" class="form-control" />
					</div>

					<div class="form-group">
						<label for="message" class="control-label">Descripción:</label>
						<textarea name="descripcion" id="txtDescripcion" class="form-control" rows="4" name="message" placeholder="Descripcion"></textarea>
					</div>

					<div class="form-group">
						<label for="message" class="control-label">Controlador:</label>
						<input name="controlador" id="txtControlador" placeholder="Controlador" class="form-control" />
					</div>
				</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Guardar Cambios</button>
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
				<form method="post" action="<?php echo site_url('Formulario/cambiarEstado') ?>">
					<input type="text" name="estado_formulario_id" id="estado_formulario_id" class="hide" />
					<input type="text" name="cambio_estado" id="cambio_estado" class="hide" />

					<div class="modal-body">
						<div class="form-group">
							<h4 id="lblMensajeEstado" class="text-warning text-center"></h4>							
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cacelar</button>
						<button type="submit" class="btn" id="btnConfirmarEstado">Confirmar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript">

		var lista_formularios = <?php echo json_encode($lista_formularios) ?>;
		console.log(lista_formularios);

		$(document).on('ready', function(){
			<?php if(validation_errors()) { ?>
				$('#ModalFormulario').modal("show");
			<?php } ?>

			$('#grid').DataTable();
		});
	</script>

	<script type="text/javascript" src="<?php echo base_url('assets/js/formulario.js') ?>"></script>
