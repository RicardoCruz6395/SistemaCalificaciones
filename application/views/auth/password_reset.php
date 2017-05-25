<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Sistema de cursos - Reestablecer mi contraseña</title>

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
		<script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed ">

		<!-- BEGIN LOCKED SECTION -->
		<section class="section-account">
			<div class="img-backdrop" style="background-image: url('<?=base_url();?>assets/img/buldingbanner.jpg'); background-size: cover;"></div>
			<div class="spacer"></div>
			<div class="card contain-xs style-transparent">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-12">
							<img class="img-circle" src="<?=base_url();?>assets/img/lock.png" alt="" />
							<span class="text-lg text-bold text-primary">REESTABLECER CONTRASEÑA</span>
							<form class="form form-validate" id="form_password_reset" action="<?=base_url('auth/postPassword_reset')?>" accept-charset="utf-8" method="post">
								<div class="form-group">
									
									<input type="hidden" id="id_usuario" name="id_usuario" value="<?=$id_usuario;?>">
									<input type="hidden" id="token" name="token" value="<?=$token;?>">

									<input type="password" class="form-control" id="password" name="password" required data-rule-minlength="6" >
									<label for="password">Contraseña nueva</label>
									<p class="help-block">Mínimo 6 caracteres</p>
								</div>
								<div class="form-group">
									<input type="password" class="form-control" id="password_repeat" name="password_repeat" required data-rule-minlength="6" data-rule-equalto="#password">
									<label for="password">Repite la nueva contraseña</label>
									<p class="help-block">Mínimo 6 caracteres</p>
								</div>
								<div class="form-group">
										<div class="input-group-btn">
											<button class="btn btn-primary btn-submit" type="submit"><i class="fa fa-unlock"></i> Cambiar contraseña</button>
											<a class="btn btn-primary pull-right" href="<?=base_url()?>"><i class="fa fa-home"></i> Página principal</a>
										</div>
									</div><!--end .input-group -->
											<span class="loading" style="display: none">
											<i style="display: none" class="fa fa-spinner loading fa-spin fa-1x fa-fw"></i> Loading...
                                    		</span>
                                    		<span class="info"></span>
								</div><!--end .form-group -->
							</form>
						</div><!--end .col -->
					</div><!--end .row -->
				</div><!--end .card-body -->
			</div><!--end .card -->
		</section>
		<!-- END LOCKED SECTION -->

		<!-- BEGIN JAVASCRIPT -->
		<script>var base_url = '<?=base_url()?>';</script>
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
		$('#form_password_reset').submit(function(e) {
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
	        	toastr.options.positionClass = 'toast-bottom-left';
	        	console.log(data);
                if(data.includes("Error")){
                	end();
					toastr.error(data, '');
                }else{
					toastr.success(data, '');
                	setTimeout(function(){
                		location.href = base_url;
                	},2000);
                	end();
                }
	        });
	        return false;
		});
			
		</script>

	</body>
</html>
