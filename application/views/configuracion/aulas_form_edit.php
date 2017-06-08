<form class="form floating-label form-validate" id="form-aula">
	<input type="hidden" name="id" value="<?=$aula->AULA_AULA?>">
	<div class="form-group">
		<input type="text" class="form-control dirty" id="aula" name="aula" data-rule-minlenght="1" maxlength="10" required="" aria-required="true" aria-describedby="aula-error" aria-invalid="true" value="<?=$aula->AULA_NOMBRE?>"><span id="aula-error" class="help-block">Información requerida</span>
		<label for="aula">Nombre del aula</label>
	</div>
</form>
<script type="text/javascript">

	var app = new function(){
		var $this = this
		var modal = $('#general-modal')
		var btnOk = $('#general-modal-ok', modal).off('click');
		var form  = $('#form-aula');


		this.init = function(){
			btnOk.click(function(e){
				$this.formSubmit( form )
			});
		};

		this.formSubmit = function( form ){
			if(form.valid()){
				postAjax({
					url : base_url + 'configuracion/editAula',
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