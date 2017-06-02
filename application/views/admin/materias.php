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
                                        <a class="btn btn-icon-toggle" data-toggle="modal" data-target="#general-modal" id="agregar">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <a class="btn btn-icon-toggle btn-refresh" id="recargar">
                                            <i class="md md-refresh"></i>
                                        </a>
                                    </div>
                                </div>
                                <header><i class="fa fa-book"></i> MATERIAS</header>
                            </div><!--end .card-head -->
                            <div class="card-body style-default-bright">
                                <div class="col-md-12">
                                    <table class="table datatable table-bordered table-hover" id="table-materias">
                                        <thead>
                                        	<tr>
                                                <th>CÓDIGO</th>
                                                <th>NOMBRE</th>
                                                <th>NÓ. UNIDADES</th>
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
        $(document).ready(function() {
            var table = $('#table-materias').DataTable({
                'ajax': {
                    'url' : '<?= base_url() ?>admin/postMaterias',
                    'type' : 'POST'
                },
                'columnDefs' : [{
                    className : 'text-center',
                    'targets' : [2,3]     
                }],
                'order': [[ 1, 'asc' ]]
            });


            $('#recargar').click(function(e){
                table.ajax.reload();
            });

            $('#agregar').click(function (e) {
                e.preventDefault();
                
                $('.modal-body', '#general-modal').html('<div class="text-center"><i class="fa fa-spin fa-spinner"></i></div>');

                postAjax({
                    url : base_url + 'admin/postMateriaForm',
                    data : { grupo : 1 },
                    success : function(response){
                        $('.modal-content', '#general-modal').html(response);
                    }
                });


            });

        });


    </script>