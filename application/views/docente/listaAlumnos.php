<div class="row">
    <div class="col-md-12">
        <div class="card card-underline">
            <div class="card-head">
                <header>LISTA DE ALUMNOS </header>
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
                            <th>MATRICULA</th>
                            <th>NOMBRE</th>
                            <th>SEMESTRE</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    if(sizeof($alumnos)!=null){

                        echo "<pre>";
                        print_r($alumnos);
                        echo "</pre>";

                        foreach ($alumnos as $alum) {
                            ?>
                            <tr>
                                <td> <?=$alum->ALUM_MATRICULA?> </td>
                                <td> <?=$alum->ALUM_NOMBRE?> </td>
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