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
    <!-- BEGIN OFFCANVAS LEFT -->
    <div class="offcanvas">
    </div><!--end .offcanvas-->
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
                         <span><h2 style= "font-size: 20px;" class="panel-title panel-primary" id="modalConfirmLabel"></span> Agregar Materias</h2>
                    </div>
                    <form action="#" method="post" accept-charset="utf-8">
                    <div class="modal-body" style="padding: 5px;">
                          <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;"> 
                                <label for="exampleInputEmail1">Clave</label>
                                <input class="form-control" name="clave" placeholder="Clave De Materia" type="text" required autofocus />
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                 <label for="exampleInputEmail1">Materia</label>
                                    <input class="form-control" name="materia" placeholder="Nombre De Materias" id ="materia" type="text" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                 <label for="example-number-input">Unidad</label> 
                                     <div class="col-10">
                                        <input class="form-control" type="number" value="0" id="numero_unidades">
                                    </div>
                                </div>
                            </div>
                           
                        </div>  
                        </form>
                        <div class="panel-footer" style="margin-bottom:-14px;">
                            <input type="submit" class="btn btn-success"  value="Agregar"/>
                            <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>

    </div>
</div>

</section>
</div><!--end #content-->
    <!-- END CONTENT -->