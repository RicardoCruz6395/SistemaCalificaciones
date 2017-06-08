<div id="base">
  <div id="content">
    <section>
      <div class="section-body">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-underline">
              <div class="card-head">
                <header>INFORMACIÓN GENERAL</header>
                <div class="tools">
                  <div class="btn-group">
                    <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
                  </div>
                </div>
              </div><!--end .card-head -->
              <div class="card-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="form-control-label">Semestre</label>
                    <input type="text" class="form-control" value=" <?= $grupo->SEME_NOMBRE ?> " readonly>
                    <input type="hidden" id="grupo" class="form-control" value=" <?= $grupo->GRUP_GRUPO ?> " readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="form-control-label">Materia</label>
                    <input type="text" class="form-control" value=" <?= $grupo->MATE_NOMBRE ?> " readonly>
                    <input type="hidden" id="materia" class="form-control" value=" <?= $grupo->MATE_MATERIA ?> " readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="form-control-label">Aula</label>
                    <input type="text" class="form-control" value=" <?= $grupo->AULA_NOMBRE ?> " readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="form-control-label">Carrera</label>
                    <input type="text" class="form-control" value=" <?= $grupo->CARR_NOMBRE ?> " readonly>
                  </div>
                </div>
              </div><!--end .card-body -->
            </div>
            <div class="card card-underline">
              <div class="card-head">

                <header>PANEL DE CALIFICACIONES</header>
                <div class="tools">
                  <div class="btn-group">
                    <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
                  </div>
                  <span class="loading" style="display: none">
                    <i style="display: none" class="fa fa-spinner loading fa-spin fa-1x fa-fw"></i> Guardando...
                  </span>
                  <button class="btn btn-primary btn-save-cali btn-submit"> <i class="fa fa-save"></i> GUARDAR</button>
                </div>

              </div><!--end .card-head -->
              <div class="card-body">
                <div class="alert alert-callout alert-info" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button>
                    <b>Nota:</b> Ingrese calificaciones en un rango de [0 - 100].
                    Haga doble clic en la calificación que desee modificar, "enter" para guardar calificación.<br>
                    Al finalizar haga clic en "Guardar" para confirmar las calificaciones.<br>
                    Simbología: R = 1er Intento. 2R = Segunda Intención.
                  </div>
                  <div class="row">
                    <table class="table table-bordered table-hover" id="tabla-cal">
                      <thead>
                        <tr>
                          <th>MATRICULA</th>
                          <th>NOMBRE</th>
                          <?php foreach($unidades as $unidad){
                            echo '<th class="text-center">' . $unidad . '</th>';
                          } ?>
                          <th><b>PROMEDIO</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($alumnos as $keyA => $a){
                          echo '<tr data-id="'.$keyA.'" class="alumno">
                          <td>
                            <a href="#myModal" data-toggle="modal" class="openBtn text-primary" data-g="'.$keyA.'">'.$a["matricula"].'</a>
                          </td>';
                          echo  '<td>
                          '.$a["nombre"].'
                        </td>';
                        $n_unidades = 0;
                        $suma = 0;
                        foreach ($unidades as $keyU => $u){
                          echo '<td class="text-center calif" data-name="'.$keyU.'">';
                          $calificacion = null;
                          if(array_key_exists($keyU, $calificaciones[$keyA])){
                            $calificacion = $calificaciones[ $keyA ][ $keyU ][0];

                            $obte = $calificaciones[ $keyA ][ $keyU ][1];

                            $obtencion = $obte == 1 ? '<sup class="badge pointer style-danger">R</sup>' : 
                            '<sup class="badge pointer style-danger">2R</sup>';
                          }
                          switch (true) {
                            case ( $calificacion == null ):
                            $obtencion = '<sup class="badge pointer style-danger">R</sup>';
                            echo '<button type="button" class=" cal btn ink-reaction btn-floating-action btn-warning text-center" >0</button>'.$obtencion;
                            break;
                            case ( $calificacion < 70 ):
                            echo '<button type="button" class=" cal btn ink-reaction btn-floating-action btn-danger text-center">'. $calificacion .'</button>' .$obtencion;
                            break;
                            case ( $calificacion >= 70 ):
                            echo '<button type="button" class=" cal btn ink-reaction btn-floating-action btn-primary text-center">'. $calificacion .'</button>' . $obtencion;
                            break;
                            default: break;
                          }

                          $n_unidades++;
                          if($calificacion != null)
                            $suma+=$calificacion;
                          echo '</td>';
                        }
                        $promedio = number_format($suma/$n_unidades);

                        echo "<td class='text-center'>";
                        switch (true) {
                          case ( $promedio < 70 ):
                          echo '<button type="button" class="promedio btn ink-reaction btn-floating-action btn-danger text-center"> N/A </button>';
                          break;
                          case ( $promedio >= 70 ):
                          echo '<button type="button" class="promedio btn ink-reaction btn-floating-action btn-primary text-center">'. $promedio .'</button>';
                          break;
                          default: break;
                        }
                        echo "</td>";

                        echo '</tr>';
                      } 
                      ?> 
                    </tbody>
                  </table>

                </div>
              </div><!--end .card-body -->
            </div><!--end .card -->
            <div class="card card-underline card-collapsed">
              <div class="card-head">
                <header>DEBUG</header>
                <div class="tools">
                  <div class="btn-group">
                    <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
                  </div>
                </div>
              </div><!--end .card-head -->
              <div class="card-body" style="display: none">
                <pre>
                  <?php var_dump($alumnos2);   ?>
                  <?php var_dump($alumnos);   ?>
                  <?php var_dump($calificaciones);   ?>
                </pre>
              </div><!--end .card-body -->
            </div>
          </div><!--end .col -->
        </div>
      </div><!--end .section-body -->
    </section>
  </div>
  <script src="<?= base_url() ?>assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
  <script type="text/javascript">

  //toastr.options.positionClass = 'toast-bottom-left';

  $("#tabla-cal .cal").dblclick(function () {
    console.log("dblclick");
    var original = $.trim($(this).text());
    $(this).addClass('cellEditing');

    $(this).html('<input type="text" maxlength="3"  minlength="2" class="form-control form-cal" value="'+original+'">');

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
          clase = "cal btn ink-reaction btn-floating-action btn-primary text-center";
          if(newContent < 70)
            clase = "cal btn ink-reaction btn-floating-action btn-danger text-center";
          //   newContent = "N/A";
          var cell = $(this).parent();
          
          cell.removeClass().addClass(clase);

          cell.text(newContent);
          if ($.trim(newContent) != original)
            calculaPromedio(cell);
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


  $("#tabla-cal .pointer").dblclick(function () {
    console.log("dblclick");
    var original = $.trim($(this).text());
    $(this).addClass('cellEditing');
    $(this).html('<input type="text" maxlength="2"  minlength="1" class="form-control form-obt" value="'+original+'">');

    $(this).children().first().focus();
    $(this).children().first().keypress(function (e) {
      if (e.which == 13) {

        var newContent = $(this).val();
        console.log(newContent);
          var cell = $(this).parent();
          cell.text(newContent);
          //if ($.trim(newContent) != original)
            //calculaPromedio(cell);
            //saveChanges(cell);
        
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
      "name": $.trim(cell.first().data('name')),
      "value": $.trim(cell.children('.cal').html())
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
    console.log("Calculando promedio...");
    var fila = cell.parent().parent();
    console.log(fila);
    var suma = 0;
    var c = 0;
    var na = false;

    $(fila).find('.cal').each(function () {
      if($(this).text() < 70 ){
        na = true;
        suma+=0;
      }
      else{
        suma+=parseInt($.trim($(this).text()));
      }
      c++;
    });
    var promedio = suma/c;
    console.log(promedio);
    var clase = "btn-primary";
    if(na){
      clase = "promedio btn ink-reaction btn-floating-action btn-danger text-center";
      promedio = "N/A";
    }else{
      clase = "promedio btn ink-reaction btn-floating-action text-center btn-primary";
      promedio = parseInt(promedio);
    }
    $(fila).find('.promedio').removeClass().addClass(clase).text(promedio);

  }

  $(".btn-save-cali").click(function() {

    var $this = $(this);
    var data = [];
    var grupo = $("#grupo").val();
    var materia = $("#materia").val();

    $("#tabla-cal").find('.calif').each(function () {
      var element = {};
      dato = getData($(this));
      element.id = dato.id;
      element.unidad = dato.name;
      element.calificacion = dato.value;
      element.grupo = grupo;
      element.materia = materia;
      data.push({element:element});
      
    });
    
    postAjax({
      url: base_url+"docente/guardar_calificacion",
      data: JSON.stringify(data),
      contentType: 'application/json',
      dataType:  'json',
      success : function(response){

        console.log(response);

        if(response.success)
          toastr.success('Calificaciones guardadas', '');
        else
          toastr.error('Calificaciones no guardadas', '');

      }       

    });

  });



</script>

