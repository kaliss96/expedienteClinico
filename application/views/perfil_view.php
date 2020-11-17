<div class="page-content">
	<div class="page-header">
		<h1>Perfiles de Usuarios</h1>
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
			
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalPerfil">
				<i class="fa fa-plus"></i>
				Nuevo
			</button>
			<br><br>

			<table id="grid" class="table table-hover table-bordered table-striped table-condensed">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Fecha</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>	
					<?php foreach ($lista_perfiles as $fila) { ?>
						<tr class="<?php echo $fila->estado == 'INACTIVO' ? 'danger' : '' ?>">            
							<td><?php echo $fila->nombre;?></td>
							<td><?php echo $fila->descripcion;?></td>
							<td><?php echo $fila->fecha;?></td>
							<td>
							<?php if($fila->estado == 'ACTIVO') {	
									echo '<label class="label label-success">activo</label>';
								}
								else {
									echo '<label class="label label-danger">inactivo</label>';
									}?>		
							</td>
							<td>
							<button class="btn btn-info btn-xs" onclick="editarPerfil(<?php echo $fila->id ?>)"><span class="fa fa-pencil"></span></button>
							<?php  if($fila->estado == 'ACTIVO') {	
									echo '<button class="btn btn-danger btn-xs" onclick="desactivar('. $fila->id .')"><span class="fa fa-power-off"></span></button>';
								}
								else {
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
	<div class="modal fade" id="ModalPerfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Registro de Perfil</h4>
				</div>

				<?php echo form_open('Perfil/registrar_perfil','class="myclass"');?>

					<div class="modal-body">
						<?php if(validation_errors()) { ?>
							<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong><?php echo validation_errors(); ?></strong>
							</div>
						<?php } ?>

						<div class="form-group">
							<label for="message" class="control-label">Nombre</label>
							<input name="nombre" placeholder="Nombre" class="form-control" />
						</div>

						<div class="form-group">
							<label for="message" class="control-label">Descripción</label>
							<textarea name="descripcion" class="form-control" rows="4" name="message" placeholder="Descripcion"></textarea>
						</div>					
						
						<br><br>
						
						<table class="table table-hover">
							<thead>
								<tr>
									<th></th>
									<th>Nombre</th>
									<th>Descripcion</th>
									<th>Lectura</th> 
									<th>Escritura</th>
									<th>Actualiza</th>
									<th>Elimina</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($lista_formularios as $fila) { ?>
									<tr>            
										<td><input type="checkbox" name="pxfId[]" value="<?php echo $fila->id;?>"></td>
										<td><?php echo $fila->nombre;?></td>
										<td><?php echo $fila->descripcion;?></td>					
										<td><input type="checkbox" class="pxf_l" name="pxf_l<?php echo $fila->id;?>" value="<?php echo $fila->id;?>"></td>
										<td><input type="checkbox" class="pxf_e" name="pxf_e<?php echo $fila->id;?>" value="<?php echo $fila->id;?>"></td>
										<td><input type="checkbox" class="pxf_a" name="pxf_a<?php echo $fila->id;?>" value="<?php echo $fila->id;?>"></td>
										<td><input type="checkbox" class="pxf_b" name="pxf_b<?php echo $fila->id;?>" value="<?php echo $fila->id;?>"></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>	

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Guardar Cambios</button>
					</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>
	
			<!-- Modal Actualizar Perfil -->
	<div class="modal fade" id="ModalActualizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Actualizar Perfil</h4>
				</div>

				<?php echo form_open('Perfil/actualizar');?>				
					<input type="text" name="txtPerfilId" id="txtPerfilId" class="hide" />

					<div class="modal-body">
						<?php if(validation_errors()) { ?>
							<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong><?php echo validation_errors(); ?></strong>
							</div>
						<?php } ?>

						<div class="form-group">
							<label for="message" class="control-label">Nombre</label>
							<input name="nombre" id="txtnombre" placeholder="Nombre" class="form-control" />
						</div>

						<div class="form-group">
							<label for="message" class="control-label">Descripción</label>
							<textarea name="descripcion" id="txtdescripcion" class="form-control" rows="4" name="message" placeholder="Descripcion"></textarea>
						</div>
						
						<br><br>
						
						<table id="grid-act" class="table table-hover">
							<thead>
								<tr>
									<th></th>
									<th>Nombre</th>
									<th>Descripcion</th>
									<th>Lectura</th> 
									<th>Escritura</th>
									<th>Actualiza</th>
									<th>Elimina</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($lista_formularios as $fila) { ?>
									<tr>            
										<td><input type="checkbox" class="select-all" name="pxfId[]" id="chkForm<?php echo $fila->id;?>" value="<?php echo $fila->id;?>"></td>
										<td><?php echo $fila->nombre;?></td>
										<td><?php echo $fila->descripcion;?></td>					
										<td><input type="checkbox" class="pxf_l" name="pxf_l<?php echo $fila->id;?>" id="chkFormLectura<?php echo $fila->id;?>" value="<?php echo $fila->id;?>"></td>
										<td><input type="checkbox" class="pxf_e" name="pxf_e<?php echo $fila->id;?>" id="chkFormEscritura<?php echo $fila->id;?>" value="<?php echo $fila->id;?>"></td>
										<td><input type="checkbox" class="pxf_a" name="pxf_a<?php echo $fila->id;?>" id="chkFormActualizar<?php echo $fila->id;?>" value="<?php echo $fila->id;?>"></td>
										<td><input type="checkbox" class="pxf_b" name="pxf_b<?php echo $fila->id;?>" id="chkFormBorrar<?php echo $fila->id;?>" value="<?php echo $fila->id;?>"></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
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
				<form method="post" action="<?php echo site_url('Perfil/cambiarEstado') ?>">
					<input type="text" name="estado_perfil_id" id="estado_perfil_id" class="hide" />
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
	  var lista_perfiles = <?php echo json_encode($lista_perfiles) ?>;
	  console.log(lista_perfiles);

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
		$('#ModalPerfil').modal("show");
	  <?php } ?>
	});
  </script>

<script type="text/javascript" src="<?php echo base_url('assets/js/perfil.js') ?>"></script>