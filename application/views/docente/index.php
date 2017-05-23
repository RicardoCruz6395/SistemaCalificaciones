<div id="base">
  <div id="content">
    <section>
      <div class="section-body">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-underline">
              <div class="card-head">
                <header>LISTA DE MATERIAS</header>
                <div class="tools">
                  <div class="btn-group">
                    <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
                  </div>
                </div>
              </div><!--end .card-head -->
              <div class="card-body">
                <table class="table datatable table-bordered table-hover" id="mytable">
                  <thead>
                  <tr>
                    <th>CLAVE</th>
                    <th>MATERIA</th>
                    <th>SEMESTRE</th>
                    <th>ALUMNOS</th>
                    <th>AULA</th>
                    <th>CARRERA</th>
                    <th>CALIFICAR</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                  if ($grupos != null) {
                    foreach ($grupos as $grupo) {
                        ?>
                      <tr>
                        <td> <?= $grupo->MATE_CLAVE ?> </td>
                        <td> <?= $grupo->MATE_NOMBRE ?> </td>
                        <td> <?= $grupo->SEME_NOMBRE ?> </td>
                        <td>
                          <button type="button" class="btn btn-primary btn-alumnos" title="Ver lista"
                                  data-id="<?= $grupo->GRUP_GRUPO ?>" data-toggle="modal"
                                  data-target="#modal"> <?= $grupo->NUM_ALUMNOS ?> </button>
                        </td>
                        <td> <?= $grupo->AULA_NOMBRE ?> </td>
                        <td> <?= $grupo->CARR_NOMBRE ?> </td>
                        <td>
                          <a href="<?= base_url() ?>docente/calificar/<?= $grupo->GRUP_GRUPO ?>" class="btn btn-primary btn"
                             title="Lista de alumnos"><span
                              class="glyphicon glyphicon-pencil"></span></a>
                          <button class="btn btn-danger btn" data-title="Delete"
                                  data-toggle="modal" data-target="#delete"><span
                              class="glyphicon glyphicon-trash"></span></button>
                        </td>
                      </tr>
                      <?php

                    }
                  } else {
                    echo "no Hay materias";
                  }
                  ?>
                  </tbody>
                </table>
              </div><!--end .card-body -->
            </div><!--end .card -->
          </div><!--end .col -->
        </div>
      </div><!--end .section-body -->
    </section>


    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title custom_align" id="Heading">Eliminar Este Campo</h4>
          </div>
          <div class="modal-body">
            <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Estas segura que
              quieres eliminar este Compo?
            </div>
          </div>
          <div class="modal-footer ">
            <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Si</button>
            <button type="button" class="btn btn-default" data-dismiss="modal"><span
                class="glyphicon glyphicon-remove"></span> No
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

