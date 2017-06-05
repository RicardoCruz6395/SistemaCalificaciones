<div id="base">
    <div id="content">
        <section>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-bordered style-primary">
                            <div class="card-head">
                                <div class="tools">
                                    <div class="btn-group">
                                        <a class="btn btn-icon-toggle" id="agregar">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <a class="btn btn-icon-toggle btn-refresh" id="recargar">
                                            <i class="md md-refresh"></i>
                                        </a>
                                    </div>
                                </div>
                                <header><i class="fa fa-gears"></i> AULAS</header>
                            </div><!--end .card-head -->
                            <div class="card-body style-default-bright">
                                <div class="col-md-12">
                                    <table class="table datatable table-bordered table-hover" id="table-aulas">
                                        <thead>
                                        	<tr>
                                                <th>#</th>
                                                <th>NOMBRE</th>
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
    <script type="text/javascript">
        var table = $('#table-aulas').DataTable({
            'ajax': {
                'url' : '<?= base_url() ?>configuracion/postAulas',
                'type' : 'POST'
            },
            'columnDefs' : [{
                className : 'text-center',
                'targets' : [1,2]     
            }],
            'order': [[ 1, 'asc' ]]
        });


        $('#recargar').click(function(e){
            table.ajax.reload();
        });

        $('#agregar').click(function (e) {
            e.preventDefault();

            SCModals.openModal({
                title : 'NUEVA AULA',
                btnOk : '<i class="fa fa-floppy-o"></i> GUARDAR',
                url : base_url + 'configuracion/postAulaForm',
            });
            
        });

        $(document).ready(function() {
            $('.btn-danger', '#table-aulas').live('click',function(e){
                id = this.getAttribute('data-p');
                SCAlerts.confirmCancel({
                    title : 'Eliminar aula',
                    message : '¿Desea eliminarla?',
                    success : function(){
                        postAjax({
                            url : base_url + 'configuracion/deleteAula',
                            data : { id : id },
                            success : function(data){
                                toastr.options.positionClass = 'toast-bottom-right';
                                if( data.deleted )
                                    toastr.success( data.message )
                                else
                                    toastr.error( data.message )
                                table.ajax.reload();
                            }
                        });
                    }
                });
            });

            $('.btn-success', '#table-aulas').live('click',function(e){
                id = this.getAttribute('data-p');
                SCModals.openModal({
                    title : 'EDITAR AULA',
                    btnOk : '<i class="fa fa-floppy-o"></i> GUARDAR CAMBIOS',
                    url : base_url + 'configuracion/postAulaFormEdit',
                    data : { id : id }
                });
            });
        });


    </script>