<form class="form floating-label form-validate" id="form-materia">
	<input type="hidden" name="id" value="<?=$materia->MATE_MATERIA?>">
	<div class="form-group">
		<input type="text" id="clave" class="form-control dirty" disabled="disabled" value="<?=$materia->MATE_CLAVE?>">
		<label for="clave">Clave</label>
	</div>
	<div class="form-group">
		<input type="text" id="unidades" class="form-control dirty" disabled="disabled" value="<?=$unidades?>">
		<label for="unidades">Nó. Unidades</label>
	</div>
	<div class="form-group">
		<input type="text" class="form-control dirty" id="materia" name="materia" data-rule-minlenght="1" required="" aria-required="true" aria-describedby="materia-error" aria-invalid="true" value="<?=$materia->MATE_NOMBRE?>"><span id="materia-error" class="help-block">Información requerida</span>
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
			btnOk.bind('click', function(e){
				$this.formSubmit( form )
			});
		};

		this.formSubmit = function( form ){
			if(form.valid()){
				postAjax({
					url : base_url + 'admin/editMateria',
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