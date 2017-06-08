<div class="row">
    <div class="col-lg-7 col-md-7" style="padding-bottom: 10px;"> 
        <label style= "font-size: 15px;">Materia:</label>
        <input class="form-control" name="framework" placeholder="<?=$nombre_materia?>" type="text" readonly="readonly" />
    </div>
    <div class="col-lg-5 col-md-5" style="padding-bottom: 10px;">
        <label style= "font-size: 15px;" >Semestre:</label>
        <input class="form-control" name="semestre" placeholder="<?=$nombre_semestre?>" id ="semestre" type="text" readonly="readonly" />
    </div>
    <div class="col-lg-7 col-md-7" style="padding-bottom: 10px;">
        <label style= "font-size: 15px;">Docente:</label>
        <input class="form-control" name="docente" placeholder="<?=$nombre_docente?>" id ="docente" type="text" readonly="readonly" />
    </div>
    <div class="col-lg-5 col-md-5" style="padding-bottom: 10px;">
        <label  style= "font-size: 15px;">Periodo:</label>
        <input class="form-control" name="periodo" placeholder="<?=$nombre_periodo?>" id ="periodo" type="text" readonly="readonly" />
    </div>
</div>
<hr>
<table class="table table-bordered">
    <thead>
        <tr class="text-center">
            <?php foreach ($unidades as $u) {
                echo '<th>' . $u->UNID_NOMBRE . '</th>';
             } ?>
            <th>PROMEDIO</th>
        </tr>
    </thead>
    <tbody>
        <tr class="text-center">
            <?php foreach ($unidades as $u) {
                echo '<td>';
                
                $calificacion = null;
                if( array_key_exists($u->UNID_NUMERO, $calificaciones) ){
                    $calificacion = $calificaciones[ $u->UNID_NUMERO ][0];
                    $obtencion    = $calificaciones[ $u->UNID_NUMERO ][1];

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

                echo '</td>';

            }

            echo '<td>';

            switch (true) {
                case ( $promedio == -1 ):
                    echo '<button type="button" class="btn ink-reaction btn-floating-action btn-default text-center" disabled> . . . </button>';
                    break;
                case ( $promedio == 0 ):
                    echo '<button type="button" class="btn ink-reaction btn-floating-action btn-danger text-center">N/A</button>';
                    break;
                default:
                    echo '<button type="button" class="btn ink-reaction btn-floating-action btn-warning text-center">'. $promedio .'</button>';
                    break;
            }

            echo '</td>';

            ?>
        </tr>
    </tbody>
</table>
<script type="text/javascript">
    var modal = $('#general-modal')
    var btnOk = $('#general-modal-ok', modal).off('click');
      
    btnOk.click(function(e){
        $('#general-modal-cancel', modal).click();
    });
</script>