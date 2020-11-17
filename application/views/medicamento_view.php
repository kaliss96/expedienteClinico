<div class="page-content">
	<div class="page-header">
		<h1>Medicamentos</h1>
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

<table class="table">
	<tbody>					
		<tr>
			<td>
				<div class="form-group">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalFabricante">
						<i class="fa fa-plus"></i>
						Fabricante
					</button>
				</div>
			</td>

	<table id="fabricante" class="table table-hover table-bordered table-striped table-condensed">
		<thead>
			<tr>
				<th>Fecha Registro</th>
				<th>Fabricante</th>
				<th>Estado</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>	

				<?php foreach ($lista_fabricante as $fila) { ?>
				<tr class="<?php echo $fila->estado == 'INACTIVO' ? 'danger' : '' ?>">
				<td><?= $fila->fecha_registro;?></td>
				<td><?= $fila->fabricante;?></td>
				<td>
			  <?php if ($fila->estado == 'ACTIVO') {
				  echo '<label class="label label-success">activo</label>';
				}
				else {
				  echo '<label class="label label-danger">inactivo</label>';
				}?>
			  </td>
			<td>
			  <button class="btn btn-info btn-xs" onclick="editarFabricante(<?php echo $fila->id_fabricante ?>)"><span class="fa fa-pencil"></span></button>
			  </td>
				</tr>
				<?php } ?>
		  </tbody>
	</table>			
			<td>
				<div class="form-group">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalLaboratorio">
						<i class="fa fa-plus"></i>
						Laboratorio
					</button>
				</div>
			</td>

<table id="laboratorio" class="table table-hover table-bordered table-striped table-condensed">
	<thead>
		<tr>
			<th>Fecha Registro</th>
			<th>Laboratorio</th>
			<th>Estado</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>	

			<?php foreach ($lista_laboratorio as $fila) { ?>
			<tr class="<?php echo $fila->estado == 'INACTIVO' ? 'danger' : '' ?>">
			<td><?= $fila->fecha_registro;?></td>
			<td><?= $fila->laboratorio;?></td>
			<td>
		  <?php if ($fila->estado == 'ACTIVO') {
			  echo '<label class="label label-success">activo</label>';
			}
			else {
			  echo '<label class="label label-danger">inactivo</label>';
			}?>
		  </td>
			<td>
		  <button class="btn btn-info btn-xs" onclick="editarLaboratorio(<?php echo $fila->id_laboratorio ?>)"><span class="fa fa-pencil"></span></button>
		  </td>
			</tr>
			<?php } ?>
	  </tbody>
</table>			
		</tr>			
	</tbody>				
</table>


	<div class="form-group">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalMarca">
			<i class="fa fa-plus"></i>
			Marca
		</button>
	</div>
			
<table id="marca" class="table table-hover table-bordered table-striped table-condensed">
	<thead>
		<tr>
			<th>Fecha Registro</th>
			<th>Marca</th>
			<th>Estado</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>	

			<?php foreach ($lista_marca as $fila) { ?>
			<tr class="<?php echo $fila->estado == 'INACTIVO' ? 'danger' : '' ?>">
			<td><?= $fila->fecha_registro;?></td>
			<td><?= $fila->marca;?></td>
			<td>
		  <?php if ($fila->estado == 'ACTIVO') {
			  echo '<label class="label label-success">activo</label>';
			}
			else {
			  echo '<label class="label label-danger">inactivo</label>';
			}?>
		  </td>
			<td>
		  		<button class="btn btn-info btn-xs" onclick="editarMarca(<?php echo $fila->id_marca ?>)"><span class="fa fa-pencil"></span></button>
		  </td>
			</tr>
			<?php } ?>
	  </tbody>
</table>			
				<div class="form-group">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalUnidadMedida">
						<i class="fa fa-plus"></i>
					Unidad Medida
					</button>
				</div>

<table id="unidadMedida" class="table table-hover table-bordered table-striped table-condensed">
	<thead>
		<tr>
			<th>Fecha Registro</th>
			<th>Unidad Medida</th>
			<th>Estado</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>	

			<?php foreach ($lista_unidadMedida as $fila) { ?>
			<tr class="<?php echo $fila->estado == 'INACTIVO' ? 'danger' : '' ?>">
			<td><?= $fila->fecha_registro;?></td>
			<td><?= $fila->unidad_medida;?></td>
			<td>
		  <?php if ($fila->estado == 'ACTIVO') {
			  echo '<label class="label label-success">activo</label>';
			}
			else {
			  echo '<label class="label label-danger">inactivo</label>';
			}?>
		  </td>
			<td>
		  <button class="btn btn-info btn-xs" onclick="editarUnidadMedida(<?php echo $fila->id_unidad_medida ?>)"><span class="fa fa-pencil"></span></button>
		  </td>
			</tr>
			<?php } ?>
	  </tbody>
</table>			

<table class="table">
	<tbody>					
		<tr>
			<td>
				<div class="form-group">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalPais">
						<i class="fa fa-plus"></i>
						Pais
					</button>
				</div>
			</td>

<table id="pais" class="table table-hover table-bordered table-striped table-condensed">
	<thead>
		<tr>
			<th>Fecha Registro</th>
			<th>Pais</th>
			<th>Estado</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>	

			<?php foreach ($lista_pais as $fila) { ?>
			<tr class="<?php echo $fila->estado == 'INACTIVO' ? 'danger' : '' ?>">
			<td><?= $fila->fecha_registro;?></td>
			<td><?= $fila->pais;?></td>
			<td>
		  <?php if ($fila->estado == 'ACTIVO') {
			  echo '<label class="label label-success">activo</label>';
			}
			else {
			  echo '<label class="label label-danger">inactivo</label>';
			}?>
		  </td>
			<td>
		  <button class="btn btn-info btn-xs" onclick="editarPais(<?php echo $fila->id_pais ?>)"><span class="fa fa-pencil"></span></button>

		  </td>
			</tr>
			<?php } ?>
	  </tbody>
</table>			
			<td>
				<div class="form-group">
				<?php if ($prfm_inserta == 1){ ?>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalMedicamento">
						<i class="fa fa-plus"></i>
					 Medicamento
					</button>
				<?php } ?>	
				</div> 
			</td>
		</tr>			
	</tbody>				
</table>
			
			<br><br> 

			<table id="grid" class="table table-hover table-bordered table-striped table-condensed">
				<thead>
					<tr>
						<th>Fecha Registro</th>
						<th>Lote</th>
						<th>Nombre</th>
						<th>Fabricante</th>
						<th>Laboratorio</th>
						<th>Marca</th>
						<th>Unidad Medida</th>
						<th>Gramo</th>
						<th>Pais</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>	

			<?php foreach ($lista_medicamentos as $fila) { ?>
			<tr class="<?php echo $fila->estado == 'INACTIVO' ? 'danger' : '' ?>">
			<td><?= $fila->fecha_registro;?></td>
			<td><?= $fila->lote;?></td>
			<td><?= $fila->nombre;?></td>
			<td><?= $fila->fabricante;?></td>
			<td><?= $fila->laboratorio;?></td>
			<td><?= $fila->marca;?></td>
			<td><?= $fila->unidad_medida;?></td>
			<td><?= $fila->gramo;?></td>
			<td><?= $fila->pais;?></td>
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
		  <button class="btn btn-info btn-xs" onclick="editarMedicamento(<?php echo $fila->id ?>)"><span class="fa fa-pencil"></span></button>
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

<!-- Modal Fabricante -->
<div class="modal fade" id="ModalFabricante" tabindex="-1" role="dialog" aria-labelledby="myModalFabricante">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalFabricante">Registro de Fabricante</h4>
			</div>
			<?php echo form_open('Medicamento/registrar_Fabricante','class="myclass"');?>

			<div class="modal-body">
				<?php if(validation_errors()) { ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong><?php echo validation_errors(); ?></strong>
				</div>
				<?php } ?>

				<div class="form-group">
					<label for="fabricante">Fabricante:</label>
					<input name="fabricante" placeholder="Fabricante" class="form-control" />						
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

<!-- Modal Actualizar Fabricante-->
	<div class="modal fade" id="ModalActualizarFabricante" tabindex="-1" role="dialog" aria-labelledby="myModalActualizarFabricante">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalActualizarFabricante">Actualizar Fabricante</h4>
				</div>
				<?php echo form_open('Medicamento/actualizarFabricante','class="myclass"');?>
					<input type="text" name="txtFabricanteId" id="txtFabricanteId" class="hide" />

					<div class="modal-body">
						<?php if(validation_errors()) { ?>
							<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong><?php echo validation_errors(); ?></strong>
							</div>
						<?php } ?>

					<div class="form-group">
						<label for="fabricante">Fabricante:</label>
						<input name="fabricante" id="txtfabricante" placeholder="Fabricante" class="form-control" />						
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

<!-- Modal Cambio Estado Fabricante-->
<!-- 	<div class="modal fade" id="ModalEstadoFabricante" tabindex="-1" role="dialog" aria-labelledby="lblModalEstadoFabricante">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="lblModalEstadoFabricante">Confirmar</h4>
				</div>
				<form method="post" action="<?php echo site_url('Medicamento/cambiarEstadoFabricante') ?>">
					<input type="text" name="estado_Fabricante_id" id="estado_Fabricante_id" class="hide" />
					<input type="text" name="cambio_estado_fabricante" id="cambio_estado_fabricante" class="hide" />

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

<!-- Modal Laboratorio -->
<div class="modal fade" id="ModalLaboratorio" tabindex="-1" role="dialog" aria-labelledby="myModalLaboratorio">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLaboratorio">Registro de Laboratorio</h4>
			</div>
			<?php echo form_open('Medicamento/registrar_Laboratorio','class="myclass"');?>

			<div class="modal-body">
				<?php if(validation_errors()) { ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong><?php echo validation_errors(); ?></strong>
				</div>
				<?php } ?>

				<div class="form-group">
					<label for="laboratorio">Laboratorio:</label>
					<input name="laboratorio" placeholder="Laboratorio" class="form-control" />						
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

<!-- Modal Actualizar Laboratorio-->
	<div class="modal fade" id="ModalActualizarLaboratorio" tabindex="-1" role="dialog" aria-labelledby="myModalActualizarLaboratorio">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalActualizarLaboratorio">Actualizar Laboratorio</h4>
				</div>
				<?php echo form_open('Medicamento/actualizarLaboratorio','class="myclass"');?>
					<input type="text" name="txtLaboratorioId" id="txtLaboratorioId" class="hide" />

					<div class="modal-body">
						<?php if(validation_errors()) { ?>
							<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong><?php echo validation_errors(); ?></strong>
							</div>
						<?php } ?>

					<div class="form-group">
						<label for="laboratorio">Laboratorio:</label>
						<input name="laboratorio" id="txtlaboratorio" placeholder="Laboratorio" class="form-control" />						
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

<!-- Modal Cambio Estado Laboratorio-->
<!-- 	<div class="modal fade" id="ModalEstadoLaboratorio" tabindex="-1" role="dialog" aria-labelledby="lblModalEstadoLaboratorio">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="lblModalEstadoLaboratorio">Confirmar</h4>
				</div>
				<form method="post" action="<?php echo site_url('Medicamento/cambiarEstadoLaboratorio') ?>">
					<input type="text" name="estado_Laboratorio_id" id="estado_Laboratorio_id" class="hide" />
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
	</div> -->

<!-- Modal Marca -->
<div class="modal fade" id="ModalMarca" tabindex="-1" role="dialog" aria-labelledby="myModalMarca">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalMarca">Registro de Marca</h4>
			</div>
			<?php echo form_open('Medicamento/registrar_Marca','class="myclass"');?>

			<div class="modal-body">
				<?php if(validation_errors()) { ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong><?php echo validation_errors(); ?></strong>
				</div>
				<?php } ?>

				<div class="form-group">
					<label for="marca">Marca:</label>
					<input name="marca" placeholder="Marca" class="form-control" />						
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

<!-- Modal Actualizar Marca-->
	<div class="modal fade" id="ModalActualizarMarca" tabindex="-1" role="dialog" aria-labelledby="myModalActualizarMarca">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalActualizarMarca">Actualizar Marca</h4>
				</div>
				<?php echo form_open('Medicamento/actualizarMarca','class="myclass"');?>
					<input type="text" name="txtMarcaId" id="txtMarcaId" class="hide" />

					<div class="modal-body">
						<?php if(validation_errors()) { ?>
							<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong><?php echo validation_errors(); ?></strong>
							</div>
						<?php } ?>

					<div class="form-group">
						<label for="marca">Marca:</label>
						<input name="marca" id="txtMarca" placeholder="Marca" class="form-control" />						
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

<!-- Modal Cambio Estado Marca-->
<!-- 	<div class="modal fade" id="ModalEstadoMarca" tabindex="-1" role="dialog" aria-labelledby="lblModalEstadoMarca">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="lblModalEstadoMarca">Confirmar</h4>
				</div>
				<form method="post" action="<?php echo site_url('Medicamento/cambiarEstadoMarca') ?>">
					<input type="text" name="estado_marca_id" id="estado_marca_id" class="hide" />
					<input type="text" name="cambio_estado_marca" id="cambio_estado_marca" class="hide" />

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

<!-- Modal Unidad Medida -->
<div class="modal fade" id="ModalUnidadMedida" tabindex="-1" role="dialog" aria-labelledby="myModalUnidadMedida">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalUnidadMedida">Registro de Unidad Medida</h4>
			</div>
			<?php echo form_open('Medicamento/registrar_UnidadMedida','class="myclass"');?>

			<div class="modal-body">
				<?php if(validation_errors()) { ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong><?php echo validation_errors(); ?></strong>
				</div>
				<?php } ?>

				<div class="form-group">
					<label for="unidad_medida">Unidad Medida:</label>
					<input name="unidad_medida" placeholder="Unidad Medida" class="form-control" />						
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

<!-- Modal Actualizar UnidadMedida-->
	<div class="modal fade" id="ModalActualizarUnidadMedida" tabindex="-1" role="dialog" aria-labelledby="myModalActualizarUnidadMedida">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalActualizarUnidadMedida">Actualizar Unidad Medida</h4>
				</div>
				<?php echo form_open('Medicamento/actualizarUnidadMedida','class="myclass"');?>
					<input type="text" name="txtUnidadMedidaId" id="txtUnidadMedidaId" class="hide" />

					<div class="modal-body">
						<?php if(validation_errors()) { ?>
							<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong><?php echo validation_errors(); ?></strong>
							</div>
						<?php } ?>

					<div class="form-group">
						<label for="unidad_medida">UnidadMedida:</label>
						<input name="unidad_medida" id="txtunidad_medida" placeholder="UnidadMedida" class="form-control" />						
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

<!-- Modal Cambio Estado UnidadMedida-->
<!-- 	<div class="modal fade" id="ModalEstadoUnidadMedida" tabindex="-1" role="dialog" aria-labelledby="lblModalEstadoUnidadMedida">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="lblModalEstadoUnidadMedida">Confirmar</h4>
				</div>
				<form method="post" action="<?php echo site_url('Medicamento/cambiarEstadoUnidadMedida') ?>">
					<input type="text" name="estado_UnidadMedida_id" id="estado_UnidadMedida_id" class="hide" />
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
	</div> -->

<!-- Modal Pais -->
<div class="modal fade" id="ModalPais" tabindex="-1" role="dialog" aria-labelledby="myModalPais">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalPais">Registro de Pais</h4>
			</div>
			<?php echo form_open('Medicamento/registrar_Pais','class="myclass"');?>

			<div class="modal-body">
				<?php if(validation_errors()) { ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong><?php echo validation_errors(); ?></strong>
				</div>
				<?php } ?>

				<div class="form-group">
					<label for="pais">Pais:</label>
					<input name="pais" placeholder="Pais" class="form-control" />						
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

<!-- Modal Actualizar Pais-->
	<div class="modal fade" id="ModalActualizarPais" tabindex="-1" role="dialog" aria-labelledby="myModalActualizarPais">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalActualizarPais">Actualizar Pais</h4>
				</div>
				<?php echo form_open('Medicamento/actualizarPais','class="myclass"');?>
					<input type="text" name="txtPaisId" id="txtPaisId" class="hide" />

					<div class="modal-body">
						<?php if(validation_errors()) { ?>
							<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong><?php echo validation_errors(); ?></strong>
							</div>
						<?php } ?>

					<div class="form-group">
						<label for="pais">Pais:</label>
						<input name="pais" id="txtpais" placeholder="Pais" class="form-control" />						
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

<!-- Modal Cambio Estado Pais-->
<!-- 	<div class="modal fade" id="ModalEstadoPais" tabindex="-1" role="dialog" aria-labelledby="lblModalEstadoPais">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="lblModalEstadoPais">Confirmar</h4>
				</div>
				<form method="post" action="<?php echo site_url('Medicamento/cambiarEstadoPais') ?>">
					<input type="text" name="estado_pais_id" id="estado_pais_id" class="hide" />
					<input type="text" name="cambio_estado_pais" id="cambio_estado_pais" class="hide" />

					<div class="modal-body">
						<div class="form-group">
						<h4 id="lblMensajeEstadoPais" class="text-warning text-center"></h4>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn" id="btnConfirmarEstadoPais">Confirmar</button>
					</div>
				</form>	
			</div>
		</div>
	</div> -->
	
	<!-- Modal  Medicamento-->
<div class="modal fade" id="ModalMedicamento" tabindex="-1" role="dialog" aria-labelledby="myModalMedicamento">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalMedicamento">Registrar Medicamento</h4>
				</div>
				<?php echo form_open('Medicamento/registrar_Medicamento','class="myclass"');?>

					<div class="modal-body">
						<?php if(validation_errors()) { ?>
							<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong><?php echo validation_errors(); ?></strong>
							</div>
						<?php } ?>

						<ul class="nav nav-tabs" id="tabContent">
					        <li class="active"><a href="#medUno" data-toggle="tab">Detalle 1</a></li>
					        <li><a href="#medDos" data-toggle="tab">Detalle / 2</a></li>
						</ul>

<div class="tab-content">
	<div class="tab-pane active" id="medUno">						
		<table class="table table-hover">
			<tbody>					
				<tr>
					<td>					
						<div class="form-group">
							<label for="lote">LOTE:</label>
							<input name="lote" placeholder="Lote" class="form-control" />						
						</div>
					</td>
					<td>					
						<div class="form-group">
							<label for="nombre">NOMBRE:</label>
							<input name="nombre" placeholder="Nombre" class="form-control" />						
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
							<label for="gramo">GRAMO:</label>
							<input name="gramo" placeholder="Gramo" class="form-control" />						
						</div>
					</td>
				</tr>			
			</tbody>				
		</table>
	</div>

	<div class="tab-pane" id="medDos">
		<table class="table table-hover">
			<tbody>					
				<tr>		
					<td>
						<div class="form-group">
							<label for="slc_fabricante">FABRICANTE</label>
							<select name="slc_fabricante" class="form-control">
								<?php foreach ($lista_fabricante as $fila) { ?>
									<option value="<?php echo $fila->id_fabricante ?>">
									<?php echo $fila->fabricante ?></option>
								<?php } ?>
							</select>
						</div>
					</td>
					<td>
						<div class="form-group">
							<label for="slc_laboratorio">LABORATORIO</label>
							<select name="slc_laboratorio" class="form-control">
								<?php foreach ($lista_laboratorio as $fila) { ?>
									<option value="<?php echo $fila->id_laboratorio ?>">
									<?php echo $fila->laboratorio ?></option>
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
							<label for="slc_marca">MARCA</label>
							<select name="slc_marca" class="form-control">
								<?php foreach ($lista_marca as $fila) { ?>
									<option value="<?php echo $fila->id_marca ?>">
									<?php echo $fila->marca ?></option>
								<?php } ?>
							</select>
						</div>
					</td>
					<td>
						<div class="form-group">
							<label for="slc_unidad_medida">ÚNIDAD MEDIDA</label>
							<select name="slc_unidad_medida" class="form-control">
								<?php foreach ($lista_unidadMedida as $fila) { ?>
									<option value="<?php echo $fila->id_unidad_medida ?>">
									<?php echo $fila->unidad_medida ?></option>
								<?php } ?>
							</select>
						</div>
					</td>
					
				</tr>			
			</tbody>				
		</table>
			
		<div class="form-group">
			<label for="slc_pais">PAÍS</label>
			<select name="slc_pais" class="form-control">
				<?php foreach ($lista_pais as $fila) { ?>
					<option value="<?php echo $fila->id_pais ?>">
					<?php echo $fila->pais ?></option>
				<?php } ?>
			</select>
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

<!-- Modal Actualizar-->
	<div class="modal fade" id="ModalActualizar" tabindex="-1" role="dialog" aria-labelledby="myModalActualizar">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalActualizar">Actualizar Medicamento</h4>
				</div>
				<?php echo form_open('Medicamento/actualizar','class="myclass"');?>
					<input type="text" name="txtMedicamentoId" id="txtMedicamentoId" class="hide" />

					<div class="modal-body">
						<?php if(validation_errors()) { ?>
							<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong><?php echo validation_errors(); ?></strong>
							</div>
						<?php } ?>

						<ul class="nav nav-tabs" id="tabContent">
					        <li class="active"><a href="#UnoAct" data-toggle="tab">Detalle 1</a></li>
					        <li><a href="#DosAct" data-toggle="tab">Detalle / 2</a></li>
						</ul>

<div class="tab-content">
	<div class="tab-pane active" id="UnoAct">
		<table class="table table-hover">
			<tbody>					
				<tr>
					<td>					
						<div class="form-group">
							<label for="lote">LOTE:</label>
							<input name="lote" id="txtlote" placeholder="Lote" class="form-control" />						
						</div>
					</td>
					<td>					
						<div class="form-group">
							<label for="nombre">NOMBRE:</label>
							<input name="nombre" id="txtnombre" placeholder="Nombre" class="form-control" />						
						</div>
					</td>
					<td>					
						<div class="form-group">
							<label for="gramo">GRAMO:</label>
							<input name="gramo" id="txtgramo" placeholder="Gramo" class="form-control" />						
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
							<label for="slc_fabricante">FABRICANTE</label>
							<select name="slc_fabricante" id="slc_fabricante" class="form-control">
								<?php foreach ($lista_fabricante as $fila) { ?>
									<option value="<?php echo $fila->id_fabricante ?>">
									<?php echo $fila->fabricante ?></option>
								<?php } ?>
							</select>
						</div>
					</td>
					<td>
						<div class="form-group">
							<label for="slc_laboratorio">LABORATORIO</label>
							<select name="slc_laboratorio" id="slc_laboratorio" class="form-control">
								<?php foreach ($lista_laboratorio as $fila) { ?>
									<option value="<?php echo $fila->id_laboratorio ?>">
									<?php echo $fila->laboratorio ?></option>
								<?php } ?>
							</select>
						</div>
					</td>
				</tr>			
			</tbody>				
		</table>
	</div>

	<div class="tab-pane" id="DosAct">
		<table class="table table-hover">
			<tbody>					
				<tr>					
					<td>
						<div class="form-group">
							<label for="slc_marca">MARCA</label>
							<select name="slc_marca" id="slc_marca" class="form-control">
								<?php foreach ($lista_marca as $fila) { ?>
									<option value="<?php echo $fila->id_marca ?>">
									<?php echo $fila->marca ?></option>
								<?php } ?>
							</select>
						</div>
					</td>
					<td>
						<div class="form-group">
							<label for="slc_unidad_medida">ÚNIDAD MEDIDA</label>
							<select name="slc_unidad_medida" id="slc_unidad_medida" class="form-control">
								<?php foreach ($lista_unidadMedida as $fila) { ?>
									<option value="<?php echo $fila->id_unidad_medida ?>">
									<?php echo $fila->unidad_medida ?></option>
								<?php } ?>
							</select>
						</div>
					</td>				
				</tr>			
			</tbody>				
		</table>
			
		<div class="form-group">
			<label for="slc_pais">PAÍS</label>
			<select name="slc_pais" id="slc_pais" class="form-control">
				<?php foreach ($lista_pais as $fila) { ?>
					<option value="<?php echo $fila->id_pais ?>">
					<?php echo $fila->pais ?></option>
				<?php } ?>
			</select>
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
				<form method="post" action="<?php echo site_url('Medicamentos/cambiarEstadoMedicamento') ?>">
					<input type="text" name="estado_medicamento_id" id="estado_medicamento_id" class="hide" />
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
	  var lista_medicamentos = <?php echo json_encode($lista_medicamentos) ?>;
	  console.log(lista_medicamentos);

	  var lista_fabricante = <?php echo json_encode($lista_fabricante) ?>;
	  console.log(lista_fabricante);

	  var lista_laboratorio = <?php echo json_encode($lista_laboratorio) ?>;
	  console.log(lista_laboratorio);

	  var lista_marca = <?php echo json_encode($lista_marca) ?>;
	  console.log(lista_marca);

	  var lista_unidadMedida = <?php echo json_encode($lista_unidadMedida) ?>;
	  console.log(lista_unidadMedida);

	  var lista_pais = <?php echo json_encode($lista_pais) ?>;
	  console.log(lista_pais);

		$(document).ready(function () {
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
				$('#ModalFabricante').modal("show");
				$('#ModalLaboratorio').modal("show");
				$('#ModalMarca').modal("show");
				$('#ModalUnidadMedida').modal("show");
				$('#ModalPais').modal("show");
				$('#ModalMedicamento').modal("show");
			<?php } ?>			
		});
		
  </script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/medicamento.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/medicamentos.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/fabricante.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/laboratorio.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/marca.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/unidad_medida.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/pais.js') ?>"></script>