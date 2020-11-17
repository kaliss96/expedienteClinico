<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title><?php echo isset($titulo) ? $titulo : 'Recursos Humanos' ?></title>
	
	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="<?php echo base_url('assets/libraries/bootstrap/css/bootstrap.min.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/libraries/font-awesome/4.5.0/css/font-awesome.min.css') ?>" />

	<!-- page specific plugin styles -->

	<!-- text fonts -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/fonts.googleapis.com.css') ?>" />
	<!-- Botones export-->
	<link rel="stylesheet" href="<?php echo base_url('assets/libraries/datatables/css/tableexport.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/libraries/datatables/css/tableexport.min.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/libraries/datatables/css/buttons.dataTables.min.css') ?>" />

	<!-- ace styles -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/ace.min.css') ?>" class="ace-main-stylesheet" id="main-ace-style" />
	
	<link rel="stylesheet" href="<?php echo base_url('assets/css/ace-skins.min.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/ace-rtl.min.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/my_style.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/libraries/bootstrap/css/bootstrap-timepicker.min.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/libraries/select2-master/dist/css/select2.min.css') ?>" />

	<!-- inline styles related to this page -->

	<!-- ace settings handler -->
	<script src="<?php echo base_url('assets/js/ace-extra.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery-1.10.2.js') ?>"></script>
	<!-- <script src="<?php #echo base_url('assets/js/jquery.PrintArea.js') ?>"></script> -->

	<script src="<?php echo base_url('assets/libraries/jQuery/jquery-2.1.4.min.js') ?>"></script>	
	<script src="<?php echo base_url('assets/libraries/bootstrap/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/libraries/select2-master/dist/js/select2.min.js') ?>"></script>

	<script src="<?php echo base_url('assets/libraries/jQuery/jquery-ui.custom.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/libraries/jQuery/jquery.ui.touch-punch.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/libraries/jQuery/jquery.easypiechart.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/libraries/jQuery/jquery.sparkline.index.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/libraries/jQuery/jquery.flot.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/libraries/jQuery/jquery.flot.pie.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/libraries/jQuery/jquery.flot.resize.min.js') ?>"></script>
	<!-- <script src="<?php #echo base_url('assets/libraries/jQuery/FileSaver.js') ?>"></script> -->
	<!-- <script src="<?php #echo base_url('assets/libraries/jQuery/tableexport.min.js') ?>"></script> -->
<!--	<script src="<?php echo base_url('assets/libraries/jQueryUI/css/jquery-ui.css') ?>"></script>
<script src="<?php echo base_url('assets/libraries/jQueryUI/js/jquery-ui.js') ?>"></script>
<script src="<?php echo base_url('assets/libraries/jQueryUI/js/jquery.js') ?>"></script> -->

	<!-- ace scripts -->
	<script src="<?php echo base_url('assets/libraries/bootstrap/js/moment.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/ace-elements.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/ace.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/libraries/bootstrap/js/bootstrap-datepicker.js') ?>"></script>
	<script src="<?php echo base_url('assets/libraries/bootstrap/js/bootstrap-datepicker.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/libraries/bootstrap/js/bootstrap-datetimepicker.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/libraries/bootstrap/js/bootstrap-timepicker.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/libraries/datatables/js/jquery.dataTables.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/libraries/datatables/js/jquery.dataTables.bootstrap.min.js') ?>"></script>
	
	<!-- Butones export-->
	<script src="<?php echo base_url('assets/libraries/datatables/js/buttons.print.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/libraries/datatables/js/buttons.html5.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/libraries/datatables/js/dataTables.buttons.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/libraries/datatables/js/tableexport.js') ?>"></script>
	<script src="<?php echo base_url('assets/libraries/datatables/js/buttons.flash.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/libraries/datatables/js/jszip.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/libraries/datatables/js/pdfmake.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/libraries/datatables/js/vfs_fonts.js') ?>"></script>
	<script src="<?php echo base_url('assets/libraries/datatables/js/buttons.colVis.min.js') ?>"></script>

	<script src="<?php echo base_url('assets/js/conf.js') ?>"></script>
	
</head>
<body class="no-skin">
	
	<div id="navbar" class="navbar navbar-default ace-save-state">
		<div class="navbar-container ace-save-state" id="navbar-container">
			<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
				<span class="sr-only">Toggle sidebar</span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>
			</button>

			<div class="navbar-header pull-left">
				<a href="index.html" class="navbar-brand">
					<small>
						<i class="fa fa-leaf"></i>
						Expediente Clínico
					</small>
				</a>
			</div>

			<div class="navbar-buttons navbar-header pull-right" role="navigation">
				<ul class="nav ace-nav">
					<li class="light-blue dropdown-modal">
						<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<img class="nav-user-photo" src="<?php echo base_url('assets/images/avatars/user.jpg') ?>" alt="Jason's Photo" />
							<span class="user-info">
								<small>Bienvenido</small>
								<?php echo $usuario_nombre ?>
							</span>

							<i class="ace-icon fa fa-caret-down"></i>
						</a>

						<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							<li>
								<a href="#">
									<i class="ace-icon fa fa-cog"></i>
									Settings
								</a>
							</li>

							<!-- <li>
								<a href="profile.html">
									<i class="ace-icon fa fa-user"></i>
									Profile
								</a>
							</li> -->

							<li class="divider"></li>

							<li>
								<!-- <a href="http://localhost/apphhrr/index.php/Login/logout"> -->
								<!-- Ruta dinamica para deslogearse -->
								<a href="<?php echo site_url('Logout'); ?>">
									<i class="ace-icon fa fa-power-off"></i>
									Logout
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.navbar-container -->
	</div>

	<div class="main-container ace-save-state" id="main-container">
		<script type="text/javascript">
			try{ace.settings.loadState('main-container')}catch(e){}
		</script>

		<div id="sidebar" class="sidebar responsive ace-save-state">
			<script type="text/javascript">
				try{ace.settings.loadState('sidebar')}catch(e){}
			</script>

			<?php echo $menu; ?>

			<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
				<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
			</div>
		</div>

		<div class="main-content">
			<div class="main-content-inner">

			<div class="breadcrumbs ace-save-state" id="breadcrumbs">
				<ul class="breadcrumb">
					<li class="active">
						<i class="ace-icon fa fa-home home-icon"></i>
						<a href="#"><?php echo $titulo ?></a>
					</li>
				</ul><!-- /.breadcrumb -->
			</div>
