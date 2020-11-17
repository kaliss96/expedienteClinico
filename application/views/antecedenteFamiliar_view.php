<div class="page-content">
	<div class="page-header">
		<h1>Antecedentes Familiares</h1>
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
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAntecedenteFamiliar">
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
						<th>Paciente</th> 
						<th>Familiar</th>
						<th>Padecimiento</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>	

			<?php foreach ($lista_antecedenteFamiliar as $fila) { ?>
			<tr class="<?php echo $fila->estado == 'INACTIVO' ? 'danger' : '' ?>">
			<td><?= $fila->fecha_registro;?></td>
			<td><?= $fila->num_expediente;?></td>
			<td><?= $fila->nombre_paciente;?> <?= $fila->apellido_paciente;?></td>
			<td><?= $fila->familiar;?></td>
			<td><?= $fila->padecimiento;?></td>
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
		  <button class="btn btn-info btn-xs" onclick="editarAntecedenteFamiliar(<?php echo $fila->id ?>)"><span class="fa fa-pencil"></span></button>
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
<div class="modal fade" id="ModalAntecedenteFamiliar" tabindex="-1" role="dialog" aria-labelledby="myModalAntecedenteFamiliar">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalAntecedenteFamiliar">Registro Antecedente Fmiliar</h4>
			</div>
			<?php echo form_open('AntecedenteFamiliar/registrar_AntecedenteFamiliar','class="myclass"');?>

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
					<label for="familiar">FAMILIAR:</label>
					<input name="familiar" placeholder="Familiar" class="form-control" />						
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
					<label for="padecimiento" class="control-label">PADECIMIENTO:</label>
					<textarea name="padecimiento" class="form-control" rows="4" name="message" placeholder="Padecimiento"></textarea>
				</div>
			</td>
		</tr>			
	</tbody>				
</table>
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
					<h4 class="modal-title" id="myModalActualizar">Actualizar Antecedente Familiar</h4>
				</div>
				<?php echo form_open('AntecedenteFamiliar/actualizar','class="myclass"');?>
					<input type="text" name="txtAntecedenteFamiliarId" id="txtAntecedenteFamiliarId" class="hide" />

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
					<label for="familiar">FAMILIAR:</label>
					<input name="familiar" id="txtfamiliar" placeholder="Familiar" class="form-control" />						
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
					<label for="padecimiento" class="control-label">PADECIMIENTO:</label>
					<textarea name="padecimiento" id="txtpadecimiento" class="form-control" rows="4" name="message" placeholder="Padecimiento"></textarea>
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
	<div class="modal fade" id="ModalEstado" tabindex="-1" role="dialog" aria-labelledby="lblModalEstado">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="lblModalEstado">Confirmar</h4>
				</div>
				<form method="post" action="<?php echo site_url('AntecedenteFamiliar/cambiarEstado') ?>">
					<input type="text" name="estado_antecedenteFamiliar_id" id="estado_antecedenteFamiliar_id" class="hide" />
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
	  var lista_antecedenteFamiliar = <?php echo json_encode($lista_antecedenteFamiliar) ?>;
	  console.log(lista_antecedenteFamiliar);

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
				$('#ModalAntecedenteFamiliar').modal("show");
			<?php } ?>			
		});

		
  </script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/antecedenteFamiliar.js') ?>"></script>