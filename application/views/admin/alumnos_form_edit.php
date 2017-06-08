<form class="form floating-label form-validate" id="form-alumno">
	<input type="hidden" name="id" value="<?=$alumno->ALUM_ALUMNO?>">
	<div class="form-group">
		<input type="text" class="form-control dirty" disabled="disabled" id="matricula" value="<?=$alumno->ALUM_MATRICULA?>">
		<label for="matricula">Matrícula</label>
	</div>
	<div class="form-group">
		<input type="text" class="form-control dirty" id="nombre" name="nombre" data-rule-minlenght="1" maxlength="50" required="" aria-required="true" aria-describedby="nombre-error" aria-invalid="true" value="<?=$alumno->ALUM_NOMBRE?>"><span id="nombre-error" class="help-block">Información requerida</span>
		<label for="nombre">Nombre (s)</label>
	</div>
	<div class="form-group">
		<input type="text" class="form-control dirty" id="apellidos" name="apellidos" data-rule-minlenght="1" maxlength="50" required="" aria-required="true" aria-describedby="apellidos-error" aria-invalid="true" value="<?=$alumno->ALUM_APELLIDOS?>"><span id="apellidos-error" class="help-block">Información requerida</span>
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
					url : base_url + 'admin/editAlumno',
					data : form.serialize(),
					success : function(data){
						toastr.options.positionClass = 'toast-bottom-right';
						if( data.edited ){
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