<form class="form floating-label form-validate" id="form-carrera">
	<input type="hidden" name="id" value="<?=$carrera->CARR_CARRERA?>">
	<div class="form-group">
		<input type="text" class="form-control dirty" disabled="disabled" value="<?=$carrera->CARR_CODIGO?>" id="codigo">
		<label for="codigo">Código</label>
	</div>
	<div class="form-group">
		<input type="text" class="form-control dirty" id="carrera" name="carrera" data-rule-minlenght="1"  maxlength="70" required="" aria-required="true" aria-describedby="carrera-error" aria-invalid="true" value="<?=$carrera->CARR_NOMBRE?>"><span id="carrera-error" class="help-block">Información requerida</span>
		<label for="carrera">Nombre de la carreras</label>
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
					url : base_url + 'configuracion/editCarrera',
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