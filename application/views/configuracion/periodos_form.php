<form class="form floating-label form-validate" id="form-carrera">
	<div class="form-group">
		<select id="tipo_periodo" name="tipo_periodo" class="form-control" required="" aria-required="true">
			<option value="">SELECCIONE UN TIPO DE PERIODO...</option>
			<?=$tipos_periodos?>
		</select>
		<label for="tipo_periodo">TIPO DE PERIODO</label>
	</div>
	<div class="form-group">
		<select id="ciclo_escolar" name="ciclo_escolar" class="form-control" required="" aria-required="true">
			<option value="">SELECCIONE UN CICLO ESCOLAR...</option>
			<?=$ciclos_escolares?>
		</select>
		<label for="tipo_periodo">CICLO ESCOLAR</label>
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
					url : base_url + 'configuracion/addPeriodo',
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