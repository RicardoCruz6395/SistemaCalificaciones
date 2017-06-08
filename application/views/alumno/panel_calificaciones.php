<div id="base">
    <div id="content">
        <section>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-underline">
                            <div class="card-head">
                                <header><span class="text-primary">PANEL DE CALIFICACIONES ::</span> <?=$nombre_periodo?> </header>
                            </div><!--end .card-head -->
                            <div class="card-body">
                                <div class="form-group col-md-4 col-md-offset-8">
                                    <label for="select13" class="col-sm-2 control-label"><i class="fa fa-search"></i></label>
                                    <div class="col-sm-10">
                                        <select id="periodos" class="form-control">
                                            <?=$periodos?>
                                        </select>
                                        <div class="form-control-line"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table datatable table-bordered table-hover" id="mytablem">
                                            <thead>
                                                <tr>
                                                    <th>MATERIA</th>
                                                    <?php foreach($unidades as $unidad){
                                                        echo '<th class="text-center">' . $unidad . '</th>';
                                                    } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    foreach ($materias as $keyM => $m){
                                                    echo '<tr>
                                                            <td>
                                                                <a href="#myModal" data-toggle="modal" class="openBtn text-primary" data-g="'.$keyM.'">'.$m.'</a>
                                                            </td>';
                                                        foreach ($unidades as $keyU => $u){
                                                            echo '<td class="text-center">';
                                                                $calificacion = null;
                                                                if(array_key_exists($keyU, $calificaciones[$keyM])){
                                                                    $calificacion = $calificaciones[ $keyM ][ $keyU ];

                                                                    $obtencion = $calificacion > 70 && $calificacion < 80 ? '<sup class="badge style-danger">R</sup>' : '';

                                                                }
                                                                switch (true) {
                                                                    case ( $calificacion == null ):
                                                                        echo '<button type="button" class="btn ink-reaction btn-floating-action btn-danger text-center" disabled> . . . </button>';
                                                                        break;
                                                                    case ( $calificacion < 70 ):
                                                                        echo '<button type="button" class="btn ink-reaction btn-floating-action btn-danger text-center">N/A</button>';
                                                                        break;
                                                                    case ( $calificacion >= 70 ):
                                                                        echo '<button type="button" class="btn ink-reaction btn-floating-action btn-primary text-center">'. $calificacion .'</button>' . $obtencion;
                                                                        break;
                                                                    default: break;
                                                                }
                                                            
                                                        echo '</td>';
                                                        }
                                                    echo '</tr>';
                                                    } 
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
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
    <script type="text/javascript">
        
    </script>