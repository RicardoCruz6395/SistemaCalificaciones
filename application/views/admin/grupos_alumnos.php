<link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/theme-1/libs/select2/select2.css" />
<div id="base">
    <div id="content">
        <section>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-bordered style-success">
                            <div class="card-head">
                                <div class="tools">
                                    <div class="btn-group">
                                        <a class="btn btn-icon-toggle btn-refresh" id="recargar">
                                            <i class="md md-refresh"></i>
                                        </a>
                                    </div>
                                </div>
                                <header><i class="fa fa-users"></i> GRUPO #<?=$grupo?></header>
                            </div><!--end .card-head -->
                            <div class="card-body style-default-bright">
                                <div class="col-md-6 alert alert-callout alert-success" role="alert">
                                    <table>
                                    <tr><td width="25%"><b>PERIODO:</b></td><td><?=$periodo?></td></tr>
                                    <tr><td><b>SEMESTRE:</b></td><td><?=$semestre?></td></tr>
                                    <tr><td><b>CARRERA:</b></td><td><?=$carrera?></td></tr>
                                    </table>
                                </div>
                                <div class="col-md-6 alert alert-callout alert-success" role="alert">
                                    <table>
                                    <tr><td width="25%"><b>DOCENTE:</b></td><td><?=$docente?></td></tr>
                                    <tr><td><b>MATERIA:</b></td><td><?=$materia?></td></tr>
                                    <tr><td><b>AULA:</b></td><td><?=$aula?></td></tr>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 col-md-offset-5">
                                        <h4>Alumno:</h4>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <select id="alumno" name="alumno" class="form-control dirty">
                                                <?=$alumnos?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-md btn-success" id="agregar">
                                            <i class="fa fa-plus"></i><i class="fa fa-graduation-cap"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-12 table-responsive">
                                    <table class="table datatable table-bordered table-hover" id="table-lista">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>SEMESTRE</th>
                                                <th>CARRERA</th>
                                                <th>ALUMNO</th>
                                                <th>OPCIONES</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div><!--end .col -->
                </div>
            </div><!--end .section-body -->
        </section>
    </div><!--end #content-->
    <!-- END CONTENT -->
    <script src="<?= base_url() ?>assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
    <script src="<?= base_url() ?>assets/js/libs/DataTables/jquery.dataTables.js"></script>
    <script src="<?= base_url() ?>assets/js/libs/select2/select2.min.js"></script>
    <script type="text/javascript">
        var table = $('#table-lista').DataTable({
            'ajax': {
                'url'  : '<?= base_url() ?>admin/postListaAlumnos',
                'type' : 'POST',
                'data' : { id : <?=$grupo?> }
            },
            'columnDefs' : [{
                className : 'text-center',
                'targets' : [0,1,4]
            }],
        });

        $('#recargar').click(function(e){
            table.ajax.reload();
        });


        selectAlumno = $('#alumno');
        selectAlumno.select2();

        $('#agregar').click(function (e) {
            id = selectAlumno.val();
            toastr.clear();
            if( id != '' ){
                postAjax({
                    url  : base_url + 'admin/postAddAlumnoToGrupo',
                    data : {
                        grupo : <?=$grupo?>,
                        id    : id
                    },
                    success : function(data){
                        if( data.insert )
                            toastr.success( data.message )
                        else
                            toastr.error( data.message )
                        table.ajax.reload();
                        selectAlumno.html( data.options ).val(null).trigger('change.select2');
                    }
                });
            }else{
                toastr.error( 'Debe seleccionar un alumno disponible de la lista' )
            }
        });

        $(document).ready(function(){

            toastr.options.positionClass = 'toast-bottom-right';


            $('.btn-danger').live('click',function(e){
                id = this.getAttribute('data-p');
                SCAlerts.confirmCancel({
                    title : 'Eliminar alumno del grupo',
                    message : '¿Desea eliminarlo?',
                    success : function(){
                        postAjax({
                            url : base_url + 'admin/deleteAlumnoFromGrupo',
                            data : { id : id },
                            success : function(data){
                                toastr.options.positionClass = 'toast-bottom-right';
                                if( data.deleted )
                                    toastr.success( data.message )
                                else
                                    toastr.error( data.message )
                                table.ajax.reload();
                                selectAlumno.html( data.options ).val(null).trigger('change.select2');
                            }
                        });
                    }
                });
            });
        });
    </script>