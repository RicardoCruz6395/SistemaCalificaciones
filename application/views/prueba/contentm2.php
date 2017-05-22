<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 14/05/2017
 * Time: 04:01 PM
 */
?>
<script src="HTTPS://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?=base_url()?>assets/js/prueba/modal_validation2.js"></script>
<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/prueba/prueba_modal2.css" />
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
                    <p class="text-left"><a href="#" class="btn btn-primary btn-lg" role="button" data-toggle="modal" data-target="#login-modal">Agregar Docente</a></p>
                </div>
            </div>


            <!-- BEGIN # MODAL LOGIN -->
            <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Begin # DIV Form -->
                        <div id="div-forms">

                            <!-- Begin # Login Form -->
                            <form id="login-form" >
                                <div class="modal-body">
                                    <div class="panel-heading panel-primary">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                        <span><h2 style= "font-size: 20px;" class="panel-title " id="modalConfirmLabel"></span> Benvenido Docente</h2>
                                    </div>
                                    <input id="login_username" class="form-control" type="text" placeholder="Nombre" required>
                                    <input id="login_password" class="form-control" type="password" placeholder="Contraseña" required>

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Recuerdeme
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div>
                                        <button  type="submit" class="btn btn-primary btn-lg btn-block">Ingresar</button>
                                    </div>
                                    <div class="text-center">
                                        <button id="login_lost_btn" type="button" class="btn btn-link">Olvide Contraseña?</button>
                                        <button id="login_register_btn" type="button" class="btn btn-link">Registrar</button>
                                    </div>
                                </div>
                            </form>
                            <!-- End # Login Form -->

                            <!-- Begin | Lost Password Form -->
                            <form id="lost-form" style="display:none;">
                                <div class="modal-body">
                                    <div class="panel-heading panel-primary">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                        <span><h4 class="panel-title " id="modalConfirmLabel"></span> Recuperar Contraseña </h4>
                                    </div>
                                    <input id="lost_matricula" class="form-control" type="text" placeholder="Escriba su Matricula" required>
                                </div>
                                <div class="modal-footer">
                                    <div>
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
                                    </div>
                                    <div class="text-center">
                                        <button id="lost_login_btn" type="button" class="btn btn-link">Ingresar
                                        </button>
                                        <button id="lost_register_btn" type="button" class="btn btn-link">Registar</button>

                                    </div>
                                </div>
                            </form>
                            <!-- End | Lost Password Form -->

                            <!-- Begin | Register Form -->
                            <form id="register-form" style="display:none;">
                                <div class="modal-body">
                                    <div class="panel-heading panel-primary">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                        <span><h4 class="panel-title" id="modalConfirmLabel"></span> Registrar Docente</h4>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input id="register_matricula" class="form-control" type="text" placeholder="Matricula" required>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input id="register_username" class="form-control" type="text" placeholder="Nombre" required>
                                    </div>
                                    <div class="col-8 col-md-8 col-sm-8" > 
                                    <input id="register_password" class="form-control" type="password" placeholder="Contraseña" required>
                                   </div>
                                   <div class="text-center" class="col-lg-4 col-md-4 col-sm-4" > 
                                    <button type="submit" class="btn btn-secondary" style= "margin-top: 13px; margin-right: 3px;" >Generar</button>
                                    </div>
                                   <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:7px" >
                                        <label>
                                            <input type="checkbox"> Crear Usuario
                                        </label>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                    <div>
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Registrar</button>
                                    </div>
                                    <div class="text-center">
                                        <button id="register_login_btn" type="button" class="btn btn-link">Ingresar</button>
                                        <button id="register_lost_btn" type="button" class="btn btn-link">Olvide Contraseña?</button>
                                    </div>
                                </div>
                            </form>
                            <!-- End | Register Form -->

                        </div>
                        <!-- End # DIV Form -->

                    </div>
                </div>
            </div>

        </section>
    </div>

</div><!--end #content-->
    <!-- END CONTENT -->