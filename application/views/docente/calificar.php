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
                    <input type="hidden" class="form-control" value=" <?= $grupo->GRUP_GRUPO ?> " readonly id="grupo">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="form-control-label">Materia</label>
                    <input type="text" class="form-control" value=" <?= $grupo->MATE_NOMBRE ?> " readonly>
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
                  <button class="btn btn-primary btn-save-cali">
                    <span class="loader" style="display:none"> <i class="fa fa-spin fa-spinner"></i> </span>
                    <i class="fa fa-save loader-hide"></i>
                     GUARDAR</button>
                </div>

              </div><!--end .card-head -->
              <div class="card-body">
                <div class="alert alert-callout alert-info" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×</button>
                  <b>Nota:</b> Ingrese calificaciones en un rango de [0 - 100].
                  Haga doble clic en la calificación que desee modificar, "enter" para guardar calificación.<br>
                  Al finalizar haga clic en "Guardar" para confirmar las calificaciones.
                </div>
                <div class="row">
                  <table class="table table-bordered table-hover" id="tabla-calificaciones">
                    <thead>
                      <tr>
                        <th>MATRICULA</th>
                        <th>NOMBRE</th>
                        <th>UNIDAD I</th>
                        <th>UNIDAD II</th>
                        <th>UNIDAD III</th>
                        <th>UNIDAD IV</th>
                        <th><b>PROMEDIO</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        if($alumnos!=null){
                        foreach ($alumnos as $alum){
                      ?>
                      <tr class="alumno" data-id="<?= $alum->ALUM_ALUMNO ?>">
                        <td> <?= $alum->ALUM_MATRICULA ?> </td>
                        <td> <?= $alum->ALUM_NOMBRE." ".$alum->ALUM_APELLIDOS ?> </td>
                          <?php
                          $promedio = 0;
                          foreach ($alum->CALIFICACIONES as $cali){
                            echo " <td class='cal' data-name='u".$cali->CALI_UNIDAD."'>".$cali->CALI_PUNTAJE."</td>";
                            $promedio += $cali->CALI_PUNTAJE;
                          }
                          $promedio = $promedio / 4;
                          $clase = ($promedio > 70)?"succcess":"danger";
                          echo "<td class='promedio'><b class='no-bg alert-".$clase."'>".$promedio."</b></td>";
                        echo "</tr>";
                        }
                        }else{
                          echo "NO HAY ALUMNOS";
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
              <div class="card-body " style="display: none">
                <pre class="debug">
                  <?php print_r($alumnos);   ?>
                </pre>
              </div><!--end .card-body -->
            </div>
          </div><!--end .col -->
        </div>
      </div><!--end .section-body -->
    </section>
  </div>

