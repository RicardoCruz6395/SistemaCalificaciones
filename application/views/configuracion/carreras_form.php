<form class="form floating-label form-validate" id="form-carrera">
	<div class="form-group">
		<input type="text" class="form-control dirty" id="codigo" name="codigo" data-rule-minlength="3" maxlength="10" required="" aria-required="true" aria-describedby="codigo-error" aria-invalid="true"><span id="codigo-error" class="help-block">Información requerida</span>
		<label for="codigo">Código</label>
		<p class="help-block">Introduzca 3 a 10 caracteres</p>
	</div>
	<div class="form-group">
		<input type="text" class="form-control dirty" id="carrera" name="carrera" data-rule-minlenght="1" maxlength="70" required="" aria-required="true" aria-describedby="carrera-error" aria-invalid="true"><span id="carrera-error" class="help-block">Información requerida</span>
		<label for="carrera">Nombre de la carrera</label>
	</div>
</form>
<script type="text/javascript">

	var app = new function(){
		var $this = this
		var modal = $('#general-modal')
		var btnOk = $('#general-modal-ok', modal).off('click');
		var form  = $('#form-carrera');


		this.init = function(){
			btnOk.click(function(e){
				$this.formSubmit( form )
			});
		};

		this.formSubmit = function( form ){
			if(form.valid()){
				postAjax({
					url : base_url + 'configuracion/addCarrera',
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