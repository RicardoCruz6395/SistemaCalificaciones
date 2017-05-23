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
                  FRAMEWORKS
              </a>

              <div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="panel panel-primary">
                       <div class="panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <span><h2 style= "font-size: 20px;" class="panel-title panel-primary" id="modalConfirmLabel">FRAMEWORKS</h2></span>
                    </div>

                    <form class="form">
                        <div class="card" style="margin-bottom: 0px;">
                            <div class="card-body floating-label">

                              <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;"> 
                                <label style= "font-size: 15px;">Materia:</label>
                                <input class="form-control" name="framework" placeholder="Frameworks" type="text" readonly="readonly" />
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                 <label style= "font-size: 15px;" >Semestre:</label>
                                    <input class="form-control" name="semestre" placeholder="8" id ="semestre" type="text" readonly="readonly" />
                                </div> <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                 <label style= "font-size: 15px;">Docente:</label>
                                    <input class="form-control" name="docente" placeholder="Carlos E. Azueta Leon" id ="docente" type="text" readonly="readonly" />
                                </div> <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                 <label  style= "font-size: 15px;">Periodo:</label>
                                    <input class="form-control" name="periodo" placeholder="Ene-Jun 2017" id ="periodo" type="text" readonly="readonly" />
                                </div>
                        </div><!--end .card-body -->
                      <table class="table table-condensed no-margin" style="vertical-align:middle;" id="tblGrid">
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
                    </div><!--end .card -->
                    <div class="card-actionbar-row">
                     <div class="btn-group">
                        <button class="btn btn-primary"  onclick="success('A Terminado Su Consulta Exitosamente.')"><span class="glyphicon glyphicon-check"></span> AGREGAR</button>
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