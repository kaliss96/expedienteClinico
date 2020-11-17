<div class="page-content">
	<div class="page-header">
		<h1>Proveedores Existentes</h1>
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
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalProveedorMedicamento">
				<i class="fa fa-plus"></i>
				Nuevo
			</button>
		<?php } ?>	
			<br><br>

			<table id="grid" class="table table-hover table-bordered table-striped table-condensed">
				<thead>
					<tr>
						<th>Fecha Registro</th>
						<th>Proveedor</th>
						<th>Cédula</th>
						<th>celular Cita</th>
						<th>Convencional</th>
						<th>Correo</th>
						<th>Direccion</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>	

			<?php foreach ($lista_proveedorMedicamento as $fila) { ?>
			<tr class="<?php echo $fila->estado == 'INACTIVO' ? 'danger' : '' ?>">
			<td><?= $fila->fecha_registro;?></td>
			<td><?= $fila->nombre;?> <?= $fila->apellido;?></td>
			<td><?= $fila->cedula;?></td>
			<td><?= $fila->celular;?></td>
			<td><?= $fila->telefono;?></td>
			<td><?= $fila->correo;?></td>
			<td><?= $fila->direccion;?></td>
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
		  <button class="btn btn-info btn-xs" onclick="editarProveedorMedicamento(<?php echo $fila->id ?>)"><span class="fa fa-pencil"></span></button>
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
<div class="modal fade" id="ModalProveedorMedicamento" tabindex="-1" role="dialog" aria-labelledby="myModalProveedorMedicamento">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalProveedorMedicamento">Registro de Proveedor de Medicamento</h4>
			</div>
			<?php echo form_open('ProveedorMedicamento/registrar_ProveedorMedicamento','class="myclass"');?>

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
					<label for="nombre">Nombres:</label>
					<input name="nombre" placeholder="Nombres Proveedor" class="form-control" />						
				</div>
			</td>
			<td>
				<div class="form-group">
					<label for="apellido">Apellidos:</label>
					<input name="apellido" placeholder="Apellidos Proveedor" class="form-control" />						
				</div>
			</td>
			<td>					
				<div class="form-group">
					<label for="cedula">Cedula:</label>
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
				<div class="form-group">
					<label for="celular">Celular:</label>
					<input name="celular" placeholder="Celular" class="form-control" />						
				</div>
			</td>
			<td>
				<div class="form-group">
					<label for="telefono">Telefono Convencional:</label>
					<input name="telefono" placeholder="Telefono Convencional" class="form-control" />						
				</div>
			</td>
			<td>
				<div class="form-group">
					<label for="correo">Correo:</label>
					<input name="correo" placeholder="Correo" class="form-control" />						
				</div>
			</td>
		</tr>			
	</tbody>				
</table>
			        <div class="form-group">
						<label for="direccion" class="control-label">Direccion:</label>
						<textarea name="direccion" class="form-control" rows="4" name="message" placeholder="Direccion"></textarea>
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
					<h4 class="modal-title" id="myModalActualizar">Actualizar Proveedor de Medicamento</h4>
				</div>
				<?php echo form_open('ProveedorMedicamento/actualizar','class="myclass"');?>
					<input type="text" name="txtProveedorMedicamentoId" id="txtProveedorMedicamentoId" class="hide" />

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
					<label for="nombre">Nombres:</label>
					<input name="nombre" id="txtnombre" placeholder="Nombres Proveedor" class="form-control" />						
				</div>
			</td>
			<td>
				<div class="form-group">
					<label for="apellido">Apellidos:</label>
					<input name="apellido" id="txtapellido" placeholder="Apellidos Proveedor" class="form-control" />						
				</div>
			</td>
			<td>					
				<div class="form-group">
					<label for="cedula">Cedula:</label>
					<input name="cedula" id="txtcedula" placeholder="Cedula" class="form-control" />						
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
					<label for="celular">Celular:</label>
					<input name="celular" id="txtcelular" placeholder="Celular" class="form-control" />						
				</div>
			</td>
			<td>
				<div class="form-group">
					<label for="telefono">Telefono Convencional:</label>
					<input name="telefono" id="txttelefono" placeholder="Telefono Convencional" class="form-control" />						
				</div>
			</td>
			<td>
				<div class="form-group">
					<label for="correo">Correo:</label>
					<input name="correo" id="txtcorreo" placeholder="Correo" class="form-control" />						
				</div>
			</td>
		</tr>			
	</tbody>				
</table>

<div class="form-group">
	<label for="direccion" class="control-label">Direccion:</label>
	<textarea name="direccion" id="txtdireccion" class="form-control" rows="4" name="message" placeholder="Direccion"></textarea>
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
				<form method="post" action="<?php echo site_url('ProveedorMedicamento/cambiarEstado') ?>">
					<input type="text" name="estado_proveedorMedicamento_id" id="estado_proveedorMedicamento_id" class="hide" />
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
	  var lista_proveedorMedicamento = <?php echo json_encode($lista_proveedorMedicamento) ?>;
	  console.log(lista_proveedorMedicamento);

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
				$('#ModalProveedorMedicamento').modal("show");
			<?php } ?>			
		});

  </script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/proveedorMedicamento.js') ?>"></script>