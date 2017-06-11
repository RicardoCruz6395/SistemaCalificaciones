<form class="form floating-label form-validate" id="form-grupo">
	<input type="hidden" name="id" value="<?=$grupo?>">
	<div class="form-group">
		<input id="periodo" class="form-control dirty" value="<?=$nombre_periodo?>" disabled="" />
		<label for="periodo">Periodo</label>
	</div>
	<div class="form-group">
		<select id="semestre" name="semestre" class="form-control dirty" required="" aria-required="true">
			<option value="">SELECCIONE UNA OPCIÓN...</option>
			<?=$semestres?>
			<option value="0">NO ESPECIFICADO</option>	
		</select>
		<label for="semestre">Semestre</label>
	</div>
	<div class="form-group">
		<input id="materia" class="form-control dirty" value="<?=$nombre_materia?>" disabled="" />
		<label for="materia">Materia</label>
	</div>
	<div class="form-group">
		<input id="docente" class="form-control dirty" value="<?=$nombre_docente?>" disabled="" />
		<label for="docente">Docente</label>
	</div>
	<div class="form-group">
		<select id="carrera" name="carrera" class="form-control dirty" required="" aria-required="true">
			<option value="">SELECCIONE UNA OPCIÓN...</option>
			<?=$carreras?>
		</select>
		<label for="carrera">Carrera</label>
	</div>
	<div class="form-group">
		<select id="aula" name="aula" class="form-control dirty" required="" aria-required="true">
			<option value="">SELECCIONE UNA OPCIÓN...</option>
			<?=$aulas?>
		</select>
		<label for="aula">Aula</label>
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
					url : base_url + 'admin/editGrupo',
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