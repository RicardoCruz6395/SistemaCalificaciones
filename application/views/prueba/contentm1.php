<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 14/05/2017
 * Time: 04:01 PM
 */
?>
<script src="HTTPS://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?=base_url()?>assets/js/prueba/modal_validation1.js"></script>
<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/prueba/prueba_modal1.css" />
<!-- BEGIN BASE-->
<div id="base">
    <!-- END OFFCANVAS LEFT -->
    <!-- BEGIN CONTENT-->
    <div id="content">
      <section>

        <div class="container">
            <div class="row">
                <br/>

                <a class="btn btn-primary btn-lg" data-toggle="modal" id="btnConfirm" data-target="#modalConfirm" data-original-title>
                  Agregar Materias
              </a>

              <div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="panel panel-primary">
                       <div class="panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <span><h2 style= "font-size: 20px;" class="panel-title panel-primary" id="modalConfirmLabel"> AGREGAR MATERIAS</h2></span>
                    </div>

                    <form class="form">
                        <div class="card" style="margin-bottom: 0px;">
                            <div class="card-body floating-label">

                                <div class="row">
                                    <dt>El usuario debe agregar una materia rellenado los campos mostrados abajo con su información de la materia valida. Al terminar presión el botón de agregar o cancelar encaso que se desee.</dt>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="Password2">
                                            <label for="Password2">Clave de Materia</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Lastname2">
                                            <label for="Lastname2">Nombre de Materia</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 ">
                                     <label for="example-number-input">Numero de Unidades</label> 
                                     <div class="col-10">
                                        <input class="form-control" type="number" value="0" id="numero_unidades">
                                    </div>
                                </div> 
                            </div>
                        </div><!--end .card-body -->

                    </div><!--end .card -->
                    <div class="card-actionbar-row">
                     <div class="btn-group">
                        <button class="btn btn-danger" data-dismiss="modal" onclick="error('Cancelo Su Ingreso De Datos.')"><span class="glyphicon glyphicon-remove"></span> CANCELAR</button>
                        <button class="btn btn-primary"  onclick="success('Se Ha Agregado Exitosamente')"><span class="glyphicon glyphicon-check"></span> AGREGAR</button>
                    </div>

                </div>
            </form> 
        </div>
    </div>
</div>
</div>
</div>

</section>
</div>
</div><!--end #content-->
    <!-- END CONTENT -->