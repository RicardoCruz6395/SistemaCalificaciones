<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 14/05/2017
 * Time: 04:01 PM
 */
?>
<!-- BEGIN BASE-->
<div id="base">
<script src="HTTPS://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?=base_url()?>assets/js/prueba/panel.js"></script>
<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/prueba/panel.css" />
    <!-- BEGIN OFFCANVAS LEFT -->
    <div class="offcanvas">
    </div><!--end .offcanvas-->
    <!-- END OFFCANVAS LEFT -->
    <!-- BEGIN CONTENT-->
    <div id="content">
        <section>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-underline">
                            <div class="card-head">
                                <header>LISTA DE MATERIAS </header>
                                <div class="tools">
                                    <div class="btn-group">
                                        <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
                                    </div>
                                </div>
                            </div><!--end .card-head -->
                            <div class="card-body">

                                <table class="table datatable table-bordered table-hover" id="mytablem">
                                   <thead>
                                        <tr>
                                            <th>Materia</th>
                                            <th>Unidad 1</th>
                                            <th>Unidad 2</th>
                                            <th>Unidad 3</th>
                                            <th>Unidad 4</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Programacion web</td>
                                            <td>90</td>
                                            <td>21</td>
                                            <td>89</td>
                                            <td>69</td>
                                            <td><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>
                                           <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr><tr>
                                            <td>Programacion web</td>
                                            <td>90</td>
                                            <td>21</td>
                                            <td>89</td>
                                            <td>69</td>
                                            <td><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>
                                           <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr><tr>
                                            <td>Programacion web</td>
                                            <td>90</td>
                                            <td>21</td>
                                            <td>89</td>
                                            <td>69</td>
                                            <td><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>
                                           <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr><tr>
                                            <td>Programacion web</td>
                                            <td>90</td>
                                            <td>21</td>
                                            <td>89</td>
                                            <td>69</td>
                                            <td><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>
                                           <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr><tr>
                                            <td>Programacion web</td>
                                            <td>90</td>
                                            <td>21</td>
                                            <td>89</td>
                                            <td>69</td>
                                            <td><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>
                                           <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr><tr>
                                            <td>Programacion web</td>
                                            <td>90</td>
                                            <td>21</td>
                                            <td>89</td>
                                            <td>69</td>
                                            <td><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>
                                           <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr><tr>
                                            <td>Programacion web</td>
                                            <td>90</td>
                                            <td>21</td>
                                            <td>89</td>
                                            <td>69</td>
                                            <td><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>
                                           <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr><tr>
                                            <td>Programacion web</td>
                                            <td>90</td>
                                            <td>21</td>
                                            <td>89</td>
                                            <td>69</td>
                                            <td><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>
                                           <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr><tr>
                                            <td>Programacion web</td>
                                            <td>90</td>
                                            <td>21</td>
                                            <td>89</td>
                                            <td>69</td>
                                            <td><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>
                                           <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr><tr>
                                            <td>Programacion web</td>
                                            <td>90</td>
                                            <td>21</td>
                                            <td>89</td>
                                            <td>69</td>
                                            <td><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>
                                           <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr><tr>
                                            <td>Programacion web</td>
                                            <td>90</td>
                                            <td>21</td>
                                            <td>89</td>
                                            <td>69</td>
                                            <td><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>
                                           <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr><tr>
                                            <td>Programacion web</td>
                                            <td>90</td>
                                            <td>21</td>
                                            <td>89</td>
                                            <td>69</td>
                                            <td><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>
                                           <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr><tr>
                                            <td>Programacion web</td>
                                            <td>90</td>
                                            <td>21</td>
                                            <td>89</td>
                                            <td>69</td>
                                            <td><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>
                                           <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr><tr>
                                            <td>Programacion web</td>
                                            <td>90</td>
                                            <td>21</td>
                                            <td>89</td>
                                            <td>69</td>
                                            <td><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>
                                           <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr><tr>
                                            <td>Programacion web</td>
                                            <td>90</td>
                                            <td>21</td>
                                            <td>89</td>
                                            <td>69</td>
                                            <td><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>
                                           <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr>
                                       
                                    </tbody>

                                </table>

                            </div><!--end .card-body -->
                        </div><!--end .card -->
<!--                        <em class="text-caption">Basic Card</em>-->
                    </div><!--end .col -->
                </div>

            </div><!--end .section-body -->
        </section>
    </div><!--end #content-->
    <!-- END CONTENT -->