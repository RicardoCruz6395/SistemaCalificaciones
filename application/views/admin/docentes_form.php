<form class="form floating-label form-validate" id="form-docente">
	<div class="form-group">
		<input type="text" class="form-control dirty" id="matricula" name="matricula" data-rule-minlength="3" maxlength="10" required="" aria-required="true" aria-describedby="matricula-error" aria-invalid="true"><span id="matricula-error" class="help-block">Información requerida</span>
		<label for="matricula">Matrícula</label>
		<p class="help-block">Introduzca 3 a 10 caracteres</p>
	</div>
	<div class="form-group">
		<input type="text" class="form-control dirty" id="nombre" name="nombre" data-rule-minlenght="1" required="" aria-required="true" aria-describedby="nombre-error" aria-invalid="true"><span id="nombre-error" class="help-block">Información requerida</span>
		<label for="nombre">Nombre (s)</label>
	</div>
	<div class="form-group">
		<input type="text" class="form-control dirty" id="apellidos" name="apellidos" data-rule-minlenght="1" required="" aria-required="true" aria-describedby="apellidos-error" aria-invalid="true"><span id="apellidos-error" class="help-block">Información requerida</span>
		<label for="apellidos">Apellidos</label>
	</div>
</form>
<script src="<?=base_url()?>assets/CryptoJS/components/core.js"></script>
<script src="<?=base_url()?>assets/CryptoJS/rollups/sha512.js"></script>
<script type="text/javascript">

	var app = new function(){
		var $this = this
		var modal = $('#general-modal')
		var btnOk = $('#general-modal-ok', modal).off('click');
		var form  = $('#form-docente');


		this.init = function(){
			btnOk.click(function(e){
				$this.formSubmit( form )
			});
		};

		this.formSubmit = function( form ){
			if(form.valid()){

				var data = form.serializeArray();
          		data[3] = { name : 'matricula_hash', value : CryptoJS.SHA512(data[0].value) }
				
				postAjax({
					url : base_url + 'admin/addDocente',
					data : data,
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