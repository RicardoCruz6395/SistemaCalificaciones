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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
            <button href="#myModal"  id="openBtn" data-toggle="modal" class="btn btn-primary">Frameworks</button>
                                                
                                            </td>
                                            <td>90</td>
                                            <td>21</td>
                                            <td>89</td>
                                            <td>69</td>
                                        </tr>
                                        <tr>
                                            <td>Programacion web</td>
                                            <td>90</td>
                                            <td>21</td>
                                            <td>89</td>
                                            <td>69</td>
                                        </tr>
                                        <tr>
                                            <td>Programacion web</td>
                                            <td>90</td>
                                            <td>21</td>
                                            <td>89</td>
                                            <td>69</td>
                                        </tr>
                                        <tr>
                                            <td>Programacion web</td>
                                            <td>90</td>
                                            <td>21</td>
                                            <td>89</td>
                                            <td>69</td>
                                        </tr>
                                        <tr>
                                            <td>Programacion web</td>
                                            <td>90</td>
                                            <td>21</td>
                                            <td>89</td>
                                            <td>69</td>
                                        </tr>
                                        <tr>
                                            <td>Programacion web</td>
                                            <td>90</td>
                                            <td>21</td>
                                            <td>89</td>
                                            <td>69</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div><!--end .col -->
                </div>
            </div><!--end .section-body -->
        </section>

        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="panel-heading panel-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                        <h2 style= "font-size: 20px;" class="panel-title " id="modalConfirmLabel">Info. Sobre Frameworks</h2>
                    </div> 
                    <div class="modal-body" style="padding: 5px;">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;"> 
                                <label style= "font-size: 15px;">Materia:</label>
                                <input class="form-control" name="framework" placeholder="Frameworks" type="text" readonly="readonly" />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                <label style= "font-size: 15px;" >Semestre:</label>
                                <input class="form-control" name="semestre" placeholder="8" id ="semestre" type="text" readonly="readonly" />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                <label style= "font-size: 15px;">Docente:</label>
                                <input class="form-control" name="docente" placeholder="Carlos E. Azueta Leon" id ="docente" type="text" readonly="readonly" />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                <label  style= "font-size: 15px;">Periodo:</label>
                                <input class="form-control" name="periodo" placeholder="Ene-Jun 2017" id ="periodo" type="text" readonly="readonly" />
                            </div>
                        </div>
                        <hr>
                        <table class="table table-striped" id="tblGrid">
                            <thead id="tblHead">
                                <tr>
                                    <th style= "font-size: 15px;">Unidad 1</th>
                                    <th style= "font-size: 15px;">Unidad 2</th>
                                    <th style= "font-size: 15px;">Unidad 3</th>
                                    <th style= "font-size: 15px;">Unidad 4</th>
                                    <th style= "font-size: 15px;" class="text-right">Promedio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>89</td>
                                    <td>56</td>
                                    <td>89</td>
                                    <td>70</td>
                                    <td class="text-right">79</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer"  >
                        <button type="button"  class="btn btn-primary  pull-right" data-dismiss="modal">Cerrar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </div><!--end #content-->
    <!-- END CONTENT -->