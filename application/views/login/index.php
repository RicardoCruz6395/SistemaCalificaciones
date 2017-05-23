
<!DOCTYPE html>
<html lang="en">



	<head>
		<title>Sistema de Calificaciones</title>
		
		<!-- BEGIN META -->
		<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
				<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
			<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/theme-1/bootstrap.css?1422823238" />

			<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/theme-1/materialadmin.css?1422823243" />

			<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/theme-1/font-awesome.min.css?1422823239" />

			<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/theme-1/material-design-iconic-font.min.css?1422823240" />

	
		<!-- END STYLESHEETS -->


		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
	<script type="text/javascript" src="<?=base_url()?>/assets/js/libs/utils/html5shiv.js?1422823601"></script>
	<script type="text/javascript" src="<?=base_url()?>/assets/js/libs/utils/respond.min.js?1422823601"></script>
    <![endif]-->
	</head>

	
				
				
	

	<body class="menubar-hoverable header-fixed ">
	
	<!-- BEGIN LOGIN SECTION -->
	<section class="section-account">
		<div class="img-backdrop" style="background-image: url('<?=base_url()?>assets/img/img16.jpg')"></div>
		<div class="spacer"></div>
		<div class="card contain-sm style-transparent">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-6">
						<br/>
						<span class="text-lg text-bold text-primary">Inicio de Sesión</span>
						<br/><br/>
						<form class="form floating-label" action="<?=base_url()?>materialadmin/dashboards/dashboard" accept-charset="utf-8" method="post">
							<div class="form-group">
								<input type="text" class="form-control" id="username" name="username">
								<label for="username">Número de Control</label>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="password" name="password">
								<label for="password">Contraseña</label>
								<p class="help-block"><a href="#">¿Olvidaste tu contraseña?</a></p>
							</div>
							<br/>
							<div class="row">
								<div class="col-xs-6 text-left">
									<div class="checkbox checkbox-inline checkbox-styled">
										<label>
											<input type="checkbox"> <span>Recordar</span>
										</label>
									</div>
								</div><!--end .col -->
								<div class="col-xs-6 text-right">
									<button class="btn btn-primary btn-raised" type="submit">Entrar</button>
								</div><!--end .col -->
							</div><!--end .row -->
						</form>
					</div><!--end .col -->
				</div><!--end .row -->
			</div><!--end .card-body -->
		</div><!--end .card -->
	</section>
	<!-- END LOGIN SECTION -->


	<!-- BEGIN JAVASCRIPT -->
				<script src="<?=base_url()?>assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
<script src="<?=base_url()?>assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="<?=base_url()?>assets/js/libs/bootstrap/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/libs/spin.js/spin.min.js"></script>
<script src="<?=base_url()?>assets/js/libs/autosize/jquery.autosize.min.js"></script>
<script src="<?=base_url()?>assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
<script src="<?=base_url()?>assets/js/core/cache/63d0445130d69b2868a8d28c93309746.js"></script>
<script src="<?=base_url()?>assets/js/core/demo/Demo.js"></script>

	
	<!-- END JAVASCRIPT -->

	
	
	</body>
</html>