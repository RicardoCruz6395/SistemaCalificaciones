<div class="card style-primary">
    <div class="card-head card-head-xs">
        <header><i class="fa fa-book"></i> NUEVA MATERIA</header>
        <div class="tools">
			<a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
		</div>
    </div><!--end .card-head -->
    <div class="card-body style-default-bright">
        <form class="form form-validate floating-label" novalidate="novalidate" id="form-materia">
			<div class="form-group has-error">
				<input type="text" class="form-control" id="clave" name="clave" data-rule-minlength="3" maxlength="10" required="" aria-required="true" aria-describedby="clave-error" aria-invalid="true"><span id="clave-error" class="help-block">Información requerida</span>
				<label for="clave">Clave</label>
				<p class="help-block">Introduzca 3 a 10 caracteres</p>
			</div>
			<div class="form-group has-error">
				<input type="text" class="form-control" id="materia" name="materia" data-rule-minlength="1" required="" aria-required="true" aria-describedby="materia-error" aria-invalid="true"><span id="materia-error" class="help-block">Información requerida</span>
				<label for="materia">Nombre de la materia</label>
			</div>
			<div class="card-actionbar">
				<div class="card-actionbar-row">
					<button type="submit" class="btn btn-primary ink-reaction"><i class="fa fa-floppy-o"></i> GUARDAR</button>
				</div>
			</div>
		</form>
    </div>
</div>
<script type="text/javascript">
	$('#form-materia').submit(function(e){
		var $this = $(this);
		e.preventDefault();
		start();
		
		if (!$this.valid()) {   // checks form for validity
        	e.preventDefault();
        	end();
        	return false;
        }
    });
</script>