<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Sistema de Cursos - Register</title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
		<link rel="icon" type="image/png" href="<?=base_url()?>assets/img/inscripcion.png" />
		<link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/theme-1/bootstrap.css?1422792965" />
		<link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/theme-1/materialadmin.css?1425466319" />
		<link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/theme-1/font-awesome.min.css?1422529194" />
		<link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/theme-1/material-design-iconic-font.min.css?1421434286" />
		<link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/theme-1/libs/toastr/toastr.css?1425466569" />
		<link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/custom.css" />


		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed ">

		<!-- BEGIN LOGIN SECTION -->
		<section class="section-account">
			<div class="img-backdrop" style="background-image: url('<?=base_url()?>assets/img/buldingbanner.jpg'); background-size: cover;"></div>
			<div class="spacer"></div>
			<div class="card contain-sm style-transparent">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-6">
							<br/>
							<span class="text-lg text-bold text-primary">REGISTRO AL SISTEMA</span>
							<br/><br/>
							<form class="form floating-label form-validate" novalidate="novalidate"" action="<?=base_url('auth/postRegister')?>" autocomplete id="form_register" accept-charset="utf-8" method="post">
								<div class="form-group"> 
									<input type="email" class="form-control" required data-rule-minlength="2" id="email" name="email">
									<label for="email">Correo electrónico</label>
								</div>
								<div class="form-group">
									<input type="password" class="form-control" id="password" name="password" required data-rule-minlength="6" >
									<label for="password">Contraseña</label>
									<p class="help-block">Mínimo 6 caracteres</p>
								</div>
								<div class="form-group">
									<input type="password" class="form-control" id="password_repeat" name="password_repeat" required data-rule-minlength="6" data-rule-equalto="#password">
									<label for="password">Repite la contraseña</label>
									<p class="help-block">Mínimo 6 caracteres</p>
								</div>
								<br/>
								<div class="form-group">
									<div class="checkbox checkbox-styled">
										<label>
											<input type="checkbox" name="terms1" required>
											<span>Acepto los términos de uso.</span>
										</label>
									</div>
								</div>
								<div class="row">
									<p>Te enviaremos un correo con los pasos para activar tu cuenta</p>
									<div class="col-xs-6 text-left">
										
									</div><!--end .col -->
									<div class="col-xs-6 text-right">
										<button class="btn btn-primary btn-submit register btn-raised" type="submit">Registrarme</button>
									</div><!--end .col -->
										<span class="loading" style="display: none">
											<i style="display: none" class="fa fa-spinner loading fa-spin fa-1x fa-fw"></i> Loading...
                                    	</span>

								</div><!--end .row -->
							</form>
						</div><!--end .col -->
						<div class="col-sm-5 col-sm-offset-1 text-center">
							<br><br>
								<h3 class="text-light">
									¿Ya tienes cuenta?
								</h3>
								<a class="btn btn-block btn-raised btn-primary btn-loading-state" data-loading-text="<i class='fa fa-spinner fa-spin'></i>" href="<?=base_url('auth/login')?>">¡Inicia sesión!</a>
								<br>
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
				<script src="<?=base_url()?>assets/js/libs/jquery-validation/dist/jquery.validate.js"></script>
				<script src="<?=base_url()?>assets/js/libs/jquery-validation/dist/additional-methods.min.js"></script>
				<script src="<?=base_url()?>assets/js/libs/toastr/toastr.js"></script>
				<script src="<?=base_url()?>assets/js/core/source/App.js"></script>
				<script src="<?=base_url()?>assets/js/core/source/AppNavigation.js"></script>
				<script src="<?=base_url()?>assets/js/core/source/AppOffcanvas.js"></script>
				<script src="<?=base_url()?>assets/js/core/source/AppCard.js"></script>
				<script src="<?=base_url()?>assets/js/core/source/AppForm.js"></script>
				<script src="<?=base_url()?>assets/js/core/source/AppNavSearch.js"></script>
				<script src="<?=base_url()?>assets/js/core/source/AppVendor.js"></script>
				<script src="<?=base_url()?>assets/js/core/demo/Demo.js"></script>
				<script src="<?=base_url()?>assets/js/core/main.js"></script>
				<!-- END JAVASCRIPT -->
				<script>
				$('#form_register').submit(function(e) {

					var $this = $(this);
					e.preventDefault();
					
					start();
					
					if (!$this.valid()) {   // checks form for validity
	                	e.preventDefault();
	                	end();
	                	return false;
	                }

					$.post($(this).attr('action'), $(this).serialize()) 
			        .done(function(data) {
			        	console.log(data);
			        	toastr.options.positionClass = 'toast-bottom-left';
		                if(data.includes("Error")){
		                	end();
							toastr.error(data, '');
		                }
		                if(data.includes("Exito")){
		                	toastr.success(data, '');
		                	//end();
		                	setTimeout(function(){
		                		location.href = base_url;
		                	},1000);
		                	end();
		                }
			        });
			        return false;
				});
				</script>

			</body>
		</html>
