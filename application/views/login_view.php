<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Page - Ace Admin</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url('assets/libraries/bootstrap/css/bootstrap.min.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/libraries/font-awesome/4.5.0/css/font-awesome.min.css') ?>" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/fonts.googleapis.com.css') ?>" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/ace.min.css') ?>" class="ace-main-stylesheet" id="main-ace-style" />
		
		<link rel="stylesheet" href="<?php echo base_url('assets/css/ace-skins.min.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('assets/css/ace-rtl.min.css') ?>" />	

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?php echo base_url('assets/js/ace-extra.min.js') ?>"></script>
	</head>

	<body class="login-layout light-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="blue">Expediente Clínico</span>									
								</h1>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Inicio de Sesión
											</h4>	

											<div class="space-6"></div>
																						
											<form method="post" action="<?php echo site_url('Login/logeo') ?>" >
												<fieldset>
													<?php if(validation_errors()){ ?>
														<div class="alert alert-danger">
															<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
															<strong>
																<i class="ace-icon fa fa-times"></i>
																Error!
															</strong>
															<?php echo validation_errors(); ?>
															<br>
														</div>
													<?php } ?>

													<div class="space"></div>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="usu_username" placeholder="Username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" name="usu_contrasena" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">														
														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>											
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->								
							</div><!-- /.position-relative -->							
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->
		<script src="<?php echo base_url('assets/libraries/jQuery/jquery-2.1.4.min.js') ?>"></script>		
	</body>
</html>
