<div class="modal-dialog">
    <div class="modal-content">
        <div class="panel-heading panel-primary">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </button>
            <h2 style= "font-size: 20px;" class="panel-title " id="modalConfirmLabel">Reporte de calificaciones</h2>
        </div> 
        <div class="modal-body" style="padding: 1em;">
            <div class="row">
                <div class="col-md-12" style="padding-bottom: 10px;"> 
                    <label style= "font-size: 15px;">Materia:</label>
                    <input class="form-control" name="framework" placeholder="<?=$nombre_materia?>" type="text" readonly="readonly" />
                </div>
                <!--div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                    <label style= "font-size: 15px;" >Semestre:</label>
                    <input class="form-control" name="semestre" placeholder="8" id ="semestre" type="text" readonly="readonly" />
                </div-->
                <div class="col-lg-8 col-md-8" style="padding-bottom: 10px;">
                    <label style= "font-size: 15px;">Docente:</label>
                    <input class="form-control" name="docente" placeholder="<?=$nombre_docente?>" id ="docente" type="text" readonly="readonly" />
                </div>
                <div class="col-lg-4 col-md-4" style="padding-bottom: 10px;">
                    <label  style= "font-size: 15px;">Periodo:</label>
                    <input class="form-control" name="periodo" placeholder="<?=$nombre_periodo?>" id ="periodo" type="text" readonly="readonly" />
                </div>
            </div>
            <hr>
            <table class="table table-striped" id="tblGrid">
                <thead id="tblHead">
                    <tr>
                        <th style= "font-size: 15px;">Unidad 1</th>
                        <th style= "font-size: 15px;">Unidad 2</th>
                        <th style= "font-size: 15px;">Unidad 3</th>
                        <th style= "font-size: 15px;">Unidad 4</th>
                        <th style= "font-size: 15px;" class="text-right">Promedio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>89</td>
                        <td>56</td>
                        <td>89</td>
                        <td>70</td>
                        <td class="text-right">79</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>