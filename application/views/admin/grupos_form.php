<form class="form floating-label form-validate" id="form-grupo">
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
		var form  = $('#form-grupo');


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