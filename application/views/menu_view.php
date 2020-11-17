<div class="page-content">
	<div class="page-header">
		<h1>Menús del Sistema</h1>
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
			
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalMenu">
				<i class="fa fa-plus"></i>
				Nuevo
			</button>
			<br><br>

			<table id="grid" class="table table-hover table-bordered table-striped table-condensed">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>	
					<!-- Recorrer el arreglo de menu y crear las filas correspondientes -->
					<?php foreach ($lista_menus as $fila) { ?>
						<tr class="<?php echo $fila->estado == 'INACTIVO' ? 'danger' : '' ?>">          
							<td><?php echo $fila->nombre;?></td>
							<td>
								<?php if ($fila->estado == 'ACTIVO'){
									echo '<label class="label label-success">activo</label>';
								}
								else {
									echo '<label class="label label-danger">inactivo</label>';
								}?>
							</td>
							<td>
								<button class="btn btn-info btn-xs" onclick="editarMenu(<?php echo $fila->id ?>)"><span class="fa fa-pencil"></span></button>
								<?php if ($fila->estado == 'ACTIVO'){
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

	
<!-- Modal Nuevo Menu -->
<div class="modal fade" id="ModalMenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Registro de Menu</h4>
			</div>
			<?php echo form_open('Menu/registrar_menu','class="myclass"');?>

			<div class="modal-body">
				<?php if(validation_errors()) { ?>
					<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong><?php echo validation_errors(); ?></strong>
					</div>
				<?php } ?>

				<div class="form-group">
					<label for="nombre">Nombre:</label>
					<input name="nombre" placeholder="Nombre" class="form-control" />						
				</div>

				<div class="form-group">
					<label for="imagen">Imagen:</label>
					<!-- <input name="imagen" placeholder="Nombre" class="form-control" />	 -->
					 <select id="imagen" name="imagen" class="form-control">
					 <?php
 					 $dir = '../assets/icons/';
 					 //echo file_exists(BASEPATH.$dir); exit;

        			 $dh = opendir(BASEPATH.$dir);
        			 while (false !== ($f = readdir($dh))) {
                     //src="'. $dir.$f .'" 
                     //img src="assets/icons/calendar.png" border="0" />        			 	
					 //echo '<option value=\"'. $f .'\"> '. $f .' </option>';					 	
        			 	// echo '<option value="'. $f .'">';
        			 	// echo '<img src="assets/icons/calendar.png" border="0" />';	
        			 	// echo '</option>';					 	
					 }?>					 
					 </select>					
				</div>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Close</button>
				<button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Registrar</button>
			</div>
			<?php echo form_close() ?>
		</div>
	</div>
</div>

<!-- Modal Actualizar Menu -->
<div class="modal fade" id="ModalActualizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Actualizar de Menu</h4>
			</div>
			<?php echo form_open('Menu/actualizar');?>				
				<input type="text" name="txtMenuId" id="txtMenuId" class="hide" />

				<div class="modal-body">
					<div class="form-group">
						<label for="nombre">Nombre:</label>
						<input name="nombre" id="txtNombre" placeholder="Nombre" class="form-control" />
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
			<form method="post" action="<?php echo site_url('Menu/cambiarEstado') ?>">
				<input type="text" name="estado_menu_id" id="estado_menu_id" class="hide" />
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
	var lista_menus = <?php echo json_encode($lista_menus) ?>;
	console.log(lista_menus);

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
			$('#ModalMenu').modal("show");
			$('select').select2();
		<?php } ?>
	});	

	function formatState (state) {
	  if (!state.id) { return state.text; }
	  var $state = $(
	    '<span><img src="asset/icons/' + state.element.value.toLowerCase() + '.png" class="img-flag" /> ' + state.text + '</span>'
	  );
	  return $state;
	};

	$("select").select2({
	  templateResult: formatState
	});

</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/menu.js') ?>"></script>