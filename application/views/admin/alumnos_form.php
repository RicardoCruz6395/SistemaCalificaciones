<form class="form floating-label form-validate" id="form-alumno">
	<div class="form-group">
		<input type="text" class="form-control dirty" id="matricula" name="matricula" data-rule-minlength="3" maxlength="10" required="" aria-required="true" aria-describedby="matricula-error" aria-invalid="true"><span id="matricula-error" class="help-block">Información requerida</span>
		<label for="matricula">Matrícula</label>
		<p class="help-block">Introduzca 3 a 10 caracteres</p>
	</div>
	<div class="form-group">
		<input type="text" class="form-control dirty" id="nombre" name="nombre" data-rule-minlenght="1" maxlength="50" required="" aria-required="true" aria-describedby="nombre-error" aria-invalid="true"><span id="nombre-error" class="help-block">Información requerida</span>
		<label for="nombre">Nombre (s)</label>
	</div>
	<div class="form-group">
		<input type="text" class="form-control dirty" id="apellidos" name="apellidos" data-rule-minlenght="1" maxlength="50" required="" aria-required="true" aria-describedby="apellidos-error" aria-invalid="true"><span id="apellidos-error" class="help-block">Información requerida</span>
		<label for="apellidos">Apellidos</label>
	</div>
	<div class="form-group">
		<select id="semestre" name="semestre" class="form-control dirty" required="" aria-required="true">
			<option value="">SELECCIONE UNA OPCIÓN...</option>
			<?=$semestres?>
		</select>
		<label for="semestre">Semestre</label>
	</div>
	<div class="form-group">
		<select id="carrera" name="carrera" class="form-control dirty" required="" aria-required="true">
			<option value="">SELECCIONE UNA OPCIÓN...</option>
			<?=$carreras?>
		</select>
		<label for="carrera">Carrera</label>
	</div>
</form>
<script type="text/javascript">

	var app = new function(){
		var $this = this
		var modal = $('#general-modal')
		var btnOk = $('#general-modal-ok', modal).off('click');
		var form  = $('#form-alumno');


		this.init = function(){
			btnOk.click(function(e){
				$this.formSubmit( form )
			});
		};

		this.formSubmit = function( form ){
			if(form.valid()){
				postAjax({
					url : base_url + 'admin/addAlumno',
					data : form.serialize(),
					success : function(data){
						toastr.options.positionClass = 'toast-bottom-right';
						if( data.insert ){
							toastr.success(data.message,'');
							modal.modal('hide');
							table.ajax.reload();
						}else{
							toastr.error(data.message,'');
						}
					}
				});
			}
		};

	};
	app.init();
</script>