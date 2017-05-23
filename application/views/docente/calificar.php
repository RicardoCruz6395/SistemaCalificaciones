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
                </div>
              </div><!--end .card-head -->
              <div class="card-body">
                <div class="row">
                  <table class="table table-bordered table-hover" id="tabla-cal">
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
                      <tr data-id="<?= $alum->ALUM_ALUMNO ?>">
                        <td> <?= $alum->ALUM_MATRICULA ?> </td>
                        <td> <?= $alum->ALUM_NOMBRE." ".$alum->ALUM_APELLIDOS ?> </td>
                        <td class="cal" data-name="u1">100</td>
                        <td class="cal" data-name="u2">100</td>
                        <td class="cal" data-name="u3">100</td>
                        <td class="cal" data-name="u4">100</td>
                        <td><b data-name="promedio">100</b></td>
                      </tr>
                      <?php
                        }
                        }else{
                          echo "NO HAY ALUMNOS";
                        }
                      ?>
                    </tbody>

                  </table>
                  <button class="btn btn-primary btn-save-cali pull-right"> <i class="fa fa-save"></i> GUARDAR</button>
                </div>
              </div><!--end .card-body -->
            </div><!--end .card -->
            <div class="card card-underline">
              <div class="card-head">
                <header>DEBUG</header>
                <div class="tools">
                  <div class="btn-group">
                    <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
                  </div>
                </div>
              </div><!--end .card-head -->
              <div class="card-body">
                <pre>
                  <?php print_r($grupo);   ?>
                </pre>
              </div><!--end .card-body -->
            </div>
          </div><!--end .col -->
        </div>
      </div><!--end .section-body -->
    </section>
  </div>

