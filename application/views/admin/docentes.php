<div id="base">
    <div id="content">
        <section>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-underline">
                            <div class="card-head">
                                <header><span class="text-primary">DOCENTES</span></header>
                            </div><!--end .card-head -->
                            <div class="card-body">
                                <div class="col-md-12">
                                    <table class="table datatable table-bordered table-hover" id="table-docentes">
                                        <thead>
                                            <tr>
                                                <th>MATR&Iacute;CULA</th>
                                                <th>NOMBRE COMPLETO</th>
                                                <th>FECHA ALTA</th>
                                                <th>STATUS</th>
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
            var table = $('#table-docentes').DataTable({
                'ajax': {
                    'url' : '<?= base_url() ?>admin/postDocentes',
                    'type' : 'POST'
                },
                'columnDefs' : [{
                    className : 'text-center',
                    'targets' : [2,3,4]     
                }],
                'order': [[ 1, 'asc' ]]
            });


            $('#recargar').click(function(e){
                table.ajax.reload();
            });

        });


    </script>