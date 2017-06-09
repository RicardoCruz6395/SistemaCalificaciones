<div id="base">
    <div id="content">
        <section>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-underline">
                            <div class="card-head">
                                <header><span class="text-primary">PANEL DE CALIFICACIONES ::</span> <?=$nombre_periodo?>
                                </header>
                                <div class="tools">
                                    <div class="btn-group">
                                        <a class="btn btn-floating-action btn-primary" href="javascript:void(0);" onclick="javascript:window.print();"><i class="md md-print"></i></a>
                                    </div>
                                </div>
                            </div><!--end .card-head -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="padding-bottom: 10px;"> 
                                        <label style= "font-size: 15px;">Matrícula:</label>
                                        <input class="form-control" name="framework" placeholder="<?=$matricula?>" type="text" readonly="readonly" />
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" style="padding-bottom: 10px;">
                                        <label style= "font-size: 15px;" >Nombre completo:</label>
                                        <input class="form-control" name="semestre" placeholder="<?=$nombre_completo?>" id ="semestre" type="text" readonly="readonly" />
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="padding-bottom: 10px;">
                                        <label style= "font-size: 15px;">Semestre:</label>
                                        <input class="form-control" name="docente" placeholder="<?=$nombre_semestre?>" id ="docente" type="text" readonly="readonly" />
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" style="padding-bottom: 10px;">
                                        <label  style= "font-size: 15px;">Carrera:</label>
                                        <input class="form-control" name="periodo" placeholder="<?=$nombre_carrera?>" id ="periodo" type="text" readonly="readonly" />
                                    </div>
                                </div>

                                <div class="form-group col-md-4 col-md-offset-8" id="no-imprimir">
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
                                        <table class="table datatable table-bordered table-hover" id="table-calificaciones">
                                            <thead>
                                                <tr>
                                                    <th>MATERIA</th>
                                                    <?php foreach($unidades as $unidad){
                                                        echo '<th class="text-center">' . $unidad . '</th>';
                                                    } ?>
                                                    <th class="text-center">PROMEDIO</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    foreach ($materias as $keyM => $m){
                                                    echo '<tr>
                                                            <td>
                                                                <a href="#" class="reporte" data-g="'.$keyM.'">'.$m[0].'</a>
                                                            </td>';
                                                        foreach ($unidades as $keyU => $u){
                                                            echo '<td class="text-center">';
                                                            if( $keyU <= $m[1] ){
                                                                $calificacion = null;
                                                                if(array_key_exists($keyU, $calificaciones[$keyM])){
                                                                    $datos = $calificaciones[ $keyM ][ $keyU ];

                                                                    $calificacion = $datos[0];
                                                                    $obtencion = $datos[1];

                                                                    if( $obtencion == 1 ){
                                                                        $obtencion = '<sup class="badge style-success" title="Curso Normal"> CN </sup>' ;
                                                                    }else{
                                                                        $obtencion = '<sup class="badge style-warning" title="Curso Complementario"> CC </sup>';
                                                                    } 

                                                                }
                                                                switch (true) {
                                                                    case ( $calificacion == null ):
                                                                        echo '<button type="button" class="btn ink-reaction btn-floating-action btn-default text-center" disabled> . . . </button><sup class="badge style-default" title="Sin capturar">&nbsp;&nbsp;&nbsp;&nbsp;</sup>';
                                                                        break;
                                                                    case ( $calificacion < 70 ):
                                                                        echo '<button type="button" class="btn ink-reaction btn-floating-action btn-danger text-center">N/A</button>' . $obtencion;
                                                                        break;
                                                                    case ( $calificacion >= 70 ):
                                                                        echo '<button type="button" class="btn ink-reaction btn-floating-action btn-primary text-center">'. $calificacion .'</button>' . $obtencion;
                                                                        break;
                                                                    default: break;
                                                                }
                                                            }
                                                            
                                                        echo '</td>';
                                                        } // foreach unidades

                                                        echo '<td class="text-center">';

                                                        switch (true) {
                                                            case ( $m[2] == -1 ):
                                                                echo '<button type="button" class="btn ink-reaction btn-floating-action btn-default text-center" disabled> . . . </button>';
                                                                break;
                                                            case ( $m[2] == 0 ):
                                                                echo '<button type="button" class="btn ink-reaction btn-floating-action btn-danger text-center">N/A</button>';
                                                                break;
                                                            default:
                                                                echo '<button type="button" class="btn ink-reaction btn-floating-action btn-warning text-center">'. $m[2] .'</button>';
                                                                break;
                                                        }

                                                        echo '</td>';

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
    <script src="<?=base_url()?>assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
    <script type="text/javascript">

        $('#periodos').change(function(){
            location.href = this.value;
        });

        $('.reporte', '#table-calificaciones').on('click',function(e){
            id = this.getAttribute('data-g');
            e.preventDefault();

            SCModals.openModal({
                title : 'REPORTE DE CALIFICACIONES',
                url : base_url + 'alumno/postGrupoReporteCalificaciones',
                data : { id : id }
            });
        });
        
    </script>