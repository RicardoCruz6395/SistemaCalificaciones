<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 14/05/2017
 * Time: 04:01 PM
 */
?>
<script src="HTTPS://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?=base_url()?>assets/js/prueba/modal_validation3.js"></script>
<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/prueba/prueba_modal3.css" />
<!-- BEGIN BASE-->
<div id="base">
    <!-- BEGIN OFFCANVAS LEFT -->
    <div class="offcanvas">
    </div><!--end .offcanvas-->
    <!-- END OFFCANVAS LEFT -->
    <!-- BEGIN CONTENT-->
    <div id="content">
        <section>
            <button href="#myModal"  id="openBtn" data-toggle="modal" class="btn btn-primary">Frameworks</button>

            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="panel-heading panel-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <span><h2 style= "font-size: 20px;" class="panel-title " id="modalConfirmLabel"></span> Info. Sobre Frameworks</h2>
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
                                </div> <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                 <label style= "font-size: 15px;">Docente:</label>
                                    <input class="form-control" name="docente" placeholder="Carlos E. Azueta Leon" id ="docente" type="text" readonly="readonly" />
                                </div> <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
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
                  <button type="button"  class="btn btn-primary  pull-right" data-dismiss="modal">Close</button>

              </div>

          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</section>
</div>

</div><!--end #content-->
    <!-- END CONTENT -->