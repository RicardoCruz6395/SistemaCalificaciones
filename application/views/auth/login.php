<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Sistema de Calificaciones :: Iniciar Sesión</title>

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
			<div class="img-backdrop" style="background-image: url('<?=base_url()?>assets/img/banner.png'); background-size: cover;"></div>
			<div class="spacer"></div>
			<div class="card contain-sm style-transparent">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-6">
							<br/>
							<span class="text-lg text-bold text-primary">INICIO DE SESIÓN</span>
							<br/><br/>
							<form class="form floating-label form-validate" action="<?=base_url('auth/postLogin')?>" id="form_login" accept-charset="utf-8" method="post">
								<div class="form-group">
									<input type="text" class="form-control" id="matricula" name="matricula" required data-rule-minlength="6" data-rule-maxlength="12">
									<label for="matricula">Matricula</label>
								</div>
								<div class="form-group">
									<input type="password" class="form-control" id="password" name="password" required data-rule-minlength="6" 	>
									<label for="password">Contraseña</label>
								</div>
									<p class="help-block"><a href="<?=base_url('auth/password_forgot')?>">Olvidé mi contraseña</a></p>
								<br/>
								<div class="row">
									<div class="col-xs-6 text-left">
										<div class="checkbox checkbox-inline checkbox-styled">
											<label>
												<input type="checkbox"> <span>Recordarme</span>
											</label>
										</div>
									</div><!--end .col -->
									<div class="col-xs-6 text-right">
										<button class="btn btn-submit login btn-primary btn-raised" type="submit"> <i class="fa fa-sign-in"> </i> Iniciar sesión</button>
									</div><!--end .col -->
										<span class="loading" style="display: none">
											<i style="display: none" class="fa fa-spinner loading fa-spin fa-1x fa-fw"></i> Loading...
                                    	</span>
								</div><!--end .row -->
							</form>
						</div><!--end .col -->
						<div class="col-sm-5 col-sm-offset-1 text-center">
              <img src="<?=base_url('assets/img/itch/logo.png')?>" style="width: 80%;" alt="">
            </div><!--end .col -->
							</div><!--end .row -->
						</div><!--end .card-body -->
					</div><!--end .card -->
				</section>
				<!-- END LOGIN SECTION -->

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
				<script src="<?=base_url()?>assets/CryptoJS/components/core.js"></script>
				<script src="<?=base_url()?>assets/CryptoJS/rollups/sha512.js"></script>
				<!-- END JAVASCRIPT -->

				<script>	
				$('#form_login').submit(function(e) {
					var $this = $(this);
					e.preventDefault();
					start();
					
					if (!$this.valid()) {   // checks form for validity
	                	e.preventDefault();
	                	end();
	                	return false;
	                }

          var data = $(this).serializeArray();
					console.log(data);
					console.log(data[1].value);
					console.log(CryptoJS.SHA512(data[1].value));

					data[1].value = CryptoJS.SHA512(data[1].value);
          toastr.options.positionClass = 'toast-bottom-left';

					$.post($(this).attr('action'), data)
			        .done(function(data) {
                console.log(data);
                  if(data.success){
							        toastr.success('Bienvenido: '+data.rol, '');
                      setTimeout(function(){
                        redirect("../home/");
                        //window.location.href = "../home/";
                      },500);
                  }else{
                    toastr.error('Error: '+data.message, '');
                  }
			        })
					    .fail(function (xhr) {
					      console.log("Error de ejecución: "+xhr);
                toastr.error(xhr, '');
              })
					    .complete(function () {
                end();
              });
			        return false;
				});

				function redirect(url) {
				    if(navigator.userAgent.match(/Android/i)){
				        document.location=url;
                    }else{
				        window.location.replace(url);
                    }

                }
					
				</script>

			</body>
		</html>
