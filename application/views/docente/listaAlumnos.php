<div class="row">
    <div class="col-md-12">
        <div class="card card-underline m-b-0">
            <div class="card-head">
                <header>LISTA DE ALUMNOS </header>
                <div class="tools">
                    <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>
                    <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
                    <a class="btn btn-icon-toggle btn-close" data-dismiss="modal"><i class="md md-close"></i></a>
                </div>
            </div><!--end .card-head -->
            <div class="card-body">
                <table class="table datatable table-bordered table-hover" id="mytable">
                    <thead>
                        <tr>
                            <th>MATRICULA</th>
                            <th>NOMBRE</th>
                            <th>SEMESTRE</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    if(sizeof($alumnos)!=null){

                        foreach ($alumnos as $alum) {
                            ?>
                            <tr>
                                <td> <?=$alum->ALUM_MATRICULA?> </td>
                                <td> <?=$alum->ALUM_NOMBRE." ".$alum->ALUM_APELLIDOS?> </td>
                                <td> <?=$alum->ALUM_SEMESTRE?> </td>
                            </tr>
                            <?php

                        }
                    }else{
                        echo "no Hay ALUMNOS";
                    }
                    ?>
                    </tbody>
                </table>
            </div><!--end .card-body -->
        </div><!--end .card -->
    </div><!--end .col -->
</div>