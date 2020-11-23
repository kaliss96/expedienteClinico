<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
<div class="page-content">
	<div class="page-header">
		<h1>Reporte de Citas Médicas</h1>
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

			<br><br>
			<table id="grid" class="table table-hover table-bordered table-striped table-condensed">
				<thead>
					<tr>
						<th>Fecha Registro</th>
						<th>Número Expediente</th>
						<th>Paciente</th>
						<th>Cédula</th>
						<th>Medico</th>
						<th>Fecha Cita</th>
						<th>Hora</th>
						<th>Descripción</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>	

			<?php foreach ($lista_reporteCitaMedica_Existente as $fila) { ?>
			<tr class="<?php echo $fila->estado == 'INACTIVO' ? 'danger' : '' ?>">
			<td><?= $fila->fecha_cita_reserva;?></td>
			<td><?= $fila->num_expediente;?></td>
			<td><?= $fila->nombre_paciente;?> <?= $fila->apellido_paciente;?></td>
			<td><?= $fila->cedula;?></td>
			<td><?= $fila->especialidad;?></td>
			<td><?= $fila->fecha_cita_medica;?></td>
			<td><?= $fila->hora;?></td>
			<td><?= $fila->descripcion;?></td>
			<td>
		  <?php if ($fila->estado == 'ACTIVO') {
			  echo '<label class="label label-success">activo</label>';
			}
			else {
			  echo '<label class="label label-danger">inactivo</label>';
			}?>
		  </td>
			<td>		
				<?php if ($fila->estado == 'ACTIVO') {						
					echo '<button class="active btn btn-primary btn-xs" onclick="VerReporte('. $fila->id .')"><span class="fa fa-chevron-circle-down"></span></button>';
				}?>
			</td>
			</tr>
			<?php } ?>
	  </tbody>
</table>

<!-- Imprimir Reporte-->
<div class="modal fade" id="reporte_imprimir" tabindex="-1" role="dialog" aria-labelledby="lblVistaImprimir">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="lblVistaImprimir">Reporte de Citas Médicas</h4>
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
		var lista_reporteCitaMedica_Existente = <?php echo json_encode($lista_reporteCitaMedica_Existente) ?>;
		console.log(lista_reporteCitaMedica_Existente);

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
		});
  </script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/reporteCitaMedica.js') ?>"></script>