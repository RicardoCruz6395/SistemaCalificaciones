<!-- BEGIN JAVASCRIPT -->
<script>var base_url = '<?=base_url()?>';</script>
<script src="<?= base_url() ?>assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
<script src="<?= base_url() ?>assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/libs/bootstrap/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/libs/spin.js/spin.min.js"></script>
<script src="<?= base_url() ?>assets/js/libs/autosize/jquery.autosize.min.js"></script>
<script src="<?= base_url() ?>assets/js/libs/DataTables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/libs/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/js/libs/jquery-knob/jquery.knob.min.js"></script>
<script src="<?= base_url() ?>assets/js/libs/sparkline/jquery.sparkline.min.js"></script>
<script src="<?= base_url() ?>assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
<script src="<?= base_url() ?>assets/js/libs/jquery-validation/dist/jquery.validate.js"></script>
<script src="<?= base_url() ?>assets/js/libs/jquery-validation/dist/additional-methods.min.js"></script>
<script src="<?= base_url() ?>assets/js/libs/toastr/toastr.js"></script>
<script src="<?= base_url() ?>assets/js/libs/d3/d3.min.js"></script>
<script src="<?= base_url() ?>assets/js/libs/d3/d3.v3.js"></script>
<script src="<?= base_url() ?>assets/js/libs/rickshaw/rickshaw.min.js"></script>
<script src="<?= base_url() ?>assets/js/core/source/App.js"></script>
<script src="<?= base_url() ?>assets/js/core/source/AppNavigation.js"></script>
<script src="<?= base_url() ?>assets/js/core/source/AppOffcanvas.js"></script>
<script src="<?= base_url() ?>assets/js/core/source/AppCard.js"></script>
<script src="<?= base_url() ?>assets/js/core/source/AppForm.js"></script>
<script src="<?= base_url() ?>assets/js/core/source/AppNavSearch.js"></script>
<script src="<?= base_url() ?>assets/js/core/demo/Demo.js"></script>
<script src="<?= base_url() ?>assets/js/core/main.js"></script>
<!-- END JAVASCRIPT -->
<script>
  toastr.options.positionClass = 'toast-bottom-left';

  $(".btn-alumnos").click(function (e) {
    e.preventDefault();
    console.log($(this).data('id'));

    $(".modal-content").html('<div class="modal-body">' +
      '<h3><i class="fa fa-spin fa-spinner"></i> Cargando...</h3>' +
      '</div>');

    postAjax(base_url + 'docente/getAlumnosByGrupo',
      {grupo: $(this).data('id')},

      function (response) {
        $(".modal-content").html(response);
      });
  });

  $("#tabla-cal").dataTable();


  $("#tabla-cal td.cal").dblclick(function () {
    var original = $.trim($(this).text());
    $(this).addClass('cellEditing');
    $(this).html('<input type="text" maxlength="3"  minlength="2" class="form-control" value="'+original+'">');

    $(this).children().first().focus();
    $(this).children().first().keypress(function (e) {
      if (e.which == 13) {

        var newContent = parseInt($(this).val());
        console.log(newContent);
        if(newContent > 100 || isNaN(newContent)){
          console.log("Calificación inválida");
          toastr.error('Calificación inválida, intenta de nuevo', '');
          $(this).children().first().focus();
        }else {
          var cell = $(this).parent();
          cell.text(newContent);
          if ($.trim(newContent) != original)
            calculaPromedio(cell);
          //saveChanges(cell);
        }
      }
    });

    $(".form-validate").on('submit', function (e) {
      e.preventDefault();
      console.log("form cancelado");
    });

    $(this).children().first().blur(function () {
      var cell = $(this).parent();
      cell.text(original);
      cell.removeClass('cellEditing');
    });

  });

  var getData = function (cell) {

    return {
      "id": $.trim(cell.parent().data('id')),
      "name": $.trim(cell.data('name')),
      "value": $.trim(cell.html())
    };
  };

  var saveChanges = function (cell) {
    console.log("datas");
    console.log(getData(cell));
    postAjax(base_url + 'docente/test', getData(cell), function (data) {
      console.log(data);
    });
  };

  var calculaPromedio = function (cell) {
    var fila = cell.parent();
    var suma = 0;
    var c = 0;
    $(fila).find('.cal').each(function () {
      suma+=parseInt($.trim($(this).text()));
      c++;
    });
    var promedio = suma/c;
    var clase = "success";
    if(promedio < 70){
      clase = "danger";
    }
    $(fila).find('.promedio b').addClass('no-bg alert-'+clase).text(promedio);

  }


    $('.openBtn').click(function (e) {
        e.preventDefault();
        
        $('#myModal').html('<div class="modal-body">' +
        '<h3><i class="fa fa-spin fa-spinner"></i> Cargando...</h3>' +
        '</div>');

        grupo = this.getAttribute('data-g');

        postAjax(base_url + 'alumno/getCalificacionesGrupo', { grupo : grupo }, function (response) {
            $('#myModal').html(response);
        });
    });

</script>
</body>
</html>