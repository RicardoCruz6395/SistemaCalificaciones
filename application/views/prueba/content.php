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


                                <table class="table datatable table-bordered table-hover" id="mytable">
                                    <thead>
                                        <tr>
                                            <th>Materias</th>
                                            <th>Semestre</th>
                                            <th>Alumnos</th>
                                            <th>Aula</th>
                                            <th>Carrera</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                  <tbody>
                                    <tr>
                                        <td>Programacion web</td>
                                        <td>8vo semestre</td>
                                        <td>21</td>
                                        <td>V2</td>
                                        <td>ISIC</td>
                                        <td>
                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                            
                                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr> <tr>
                                        <td>Programacion web</td>
                                        <td>8vo semestre</td>
                                        <td>21</td>
                                        <td>V2</td>
                                        <td>ISIC</td>
                                        <td>
                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                            
                                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr> <tr>
                                        <td>Programacion web</td>
                                        <td>8vo semestre</td>
                                        <td>21</td>
                                        <td>V2</td>
                                        <td>ISIC</td>
                                        <td>
                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                            
                                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr> <tr>
                                        <td>Programacion web</td>
                                        <td>8vo semestre</td>
                                        <td>21</td>
                                        <td>V2</td>
                                        <td>ISIC</td>
                                        <td>
                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                            
                                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr> <tr>
                                        <td>Programacion web</td>
                                        <td>8vo semestre</td>
                                        <td>21</td>
                                        <td>V2</td>
                                        <td>ISIC</td>
                                        <td>
                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                            
                                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr> <tr>
                                        <td>Programacion web</td>
                                        <td>8vo semestre</td>
                                        <td>21</td>
                                        <td>V2</td>
                                        <td>ISIC</td>
                                        <td>
                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                            
                                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr> <tr>
                                        <td>Programacion web</td>
                                        <td>8vo semestre</td>
                                        <td>21</td>
                                        <td>V2</td>
                                        <td>ISIC</td>
                                        <td>
                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                            
                                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr> <tr>
                                        <td>Programacion web</td>
                                        <td>8vo semestre</td>
                                        <td>21</td>
                                        <td>V2</td>
                                        <td>ISIC</td>
                                        <td>
                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                            
                                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr> <tr>
                                        <td>Programacion web</td>
                                        <td>8vo semestre</td>
                                        <td>21</td>
                                        <td>V2</td>
                                        <td>ISIC</td>
                                        <td>
                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                            
                                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr> <tr>
                                        <td>Programacion web</td>
                                        <td>8vo semestre</td>
                                        <td>21</td>
                                        <td>V2</td>
                                        <td>ISIC</td>
                                        <td>
                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                            
                                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr> <tr>
                                        <td>Programacion web</td>
                                        <td>8vo semestre</td>
                                        <td>21</td>
                                        <td>V2</td>
                                        <td>ISIC</td>
                                        <td>
                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                            
                                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr> <tr>
                                        <td>Programacion web</td>
                                        <td>8vo semestre</td>
                                        <td>21</td>
                                        <td>V2</td>
                                        <td>ISIC</td>
                                        <td>
                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                            
                                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr> <tr>
                                        <td>Programacion web</td>
                                        <td>8vo semestre</td>
                                        <td>21</td>
                                        <td>V2</td>
                                        <td>ISIC</td>
                                        <td>
                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                            
                                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr> <tr>
                                        <td>Programacion web</td>
                                        <td>8vo semestre</td>
                                        <td>21</td>
                                        <td>V2</td>
                                        <td>ISIC</td>
                                        <td>
                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                            
                                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr> <tr>
                                        <td>Programacion web</td>
                                        <td>8vo semestre</td>
                                        <td>21</td>
                                        <td>V2</td>
                                        <td>ISIC</td>
                                        <td>
                                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                            
                                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></td>
                                        </tr>                                       
                                    </tbody>
</table>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, adipisci asperiores consequatur cum dolorum, expedita harum illum impedit ipsa nostrum nulla obcaecati officia quas qui sint sit temporibus ut voluptatem? </p>

</div><!--end .card-body -->
</div><!--end .card -->
<!--                        <em class="text-caption">Basic Card</em>-->
</div><!--end .col -->
</div>

</div><!--end .section-body -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Actualizar los Datos</h4>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <input class="form-control " type="text" placeholder="ABC1">
    </div>
    <div class="form-group">
        <input class="form-control " type="text" placeholder="Calculo">
    </div>
    <div class="form-group">     
      <input class="form-control " type="text" placeholder="4">        
  </div>
  <div class="form-group">
      <input class="form-control " type="text" placeholder="Activo">

  </div>
</div>
<div class="modal-footer ">
    <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Actualizar</button>
</div>
</div>
<!-- /.modal-content --> 
</div>
<!-- /.modal-dialog --> 
</div>



<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Eliminar Este Campo</h4>
    </div>
    <div class="modal-body">

     <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Estas segura que quieres eliminar este Compo?</div>

 </div>
 <div class="modal-footer ">
    <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Si</button>
    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
</div>
</div>
<!-- /.modal-content --> 
</div>
<!-- /.modal-dialog --> 
</div>
</section>
</div><!--end #content-->
    <!-- END CONTENT -->



































