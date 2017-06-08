<form class="form floating-label form-validate" id="form-materia">
	<div class="form-group">
		<input type="text" class="form-control dirty" id="codigo" name="codigo" data-rule-minlength="3" maxlength="10" required="" aria-required="true" aria-describedby="codigo-error" aria-invalid="true"><span id="codigo-error" class="help-block">Información requerida</span>
		<label for="codigo">Código</label>
		<p class="help-block">Introduzca 3 a 10 caracteres</p>
	</div>
	<div class="form-group">
		<input type="number" min="1" max="9" class="form-control dirty" id="unidades" name="unidades" data-rule-number="true" required>
		<label for="number2">Nó. Unidades</label>
		<p class="help-block">Introduzca una cantidad</p>
	</div>
	<div class="form-group">
		<input type="text" class="form-control dirty" id="materia" name="materia" data-rule-minlenght="1" maxlength="70" required="" aria-required="true" aria-describedby="materia-error" aria-invalid="true"><span id="materia-error" class="help-block">Información requerida</span>
		<label for="materia">Nombre de la materia</label>
	</div>
</form>
<script type="text/javascript">

	var app = new function(){
		var $this = this
		var modal = $('#general-modal')
		var btnOk = $('#general-modal-ok', modal).off('click');
		var form  = $('#form-materia');


		this.init = function(){
			btnOk.click(function(e){
				$this.formSubmit( form )
			});
		};

		this.formSubmit = function( form ){
			if(form.valid()){
				postAjax({
					url : base_url + 'admin/addMateria',
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