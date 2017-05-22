$(document).on("ready",inicio);

var c = '';

//console.log(sesion);

function inicio() {
    buscar = '';
	valorhref = 1;
    //if(sesion!=undefined)
      //  valorhref = sesion;
	valorOpcion = $("#cantidad").val();
    
	mostrarDatos("", valorhref, 5,'');

	$("#buscar").keyup(function() {
		buscar = $("#buscar").val();
		valorOpcion = $("#cantidad").val();
		mostrarDatos(buscar,1,valorOpcion,c);
	});
	
	$("#btnMostrarTodos").click(function() {
		valorOpcion = $("#cantidad").val();
		$("#buscar").val('');
		c='';
		mostrarDatos("",1, valorOpcion,'');
	});

	$(".btn-app").click(function() {
		valorOpcion = $("#cantidad").val();
		buscar = $("#buscar").val();
		c = $(this).attr("id");
		mostrarDatos(buscar, 1, valorOpcion, c);
	});	

	$("body").on("click", ".pagination li a",function(e) {
		e.preventDefault();
		buscar = $("#buscar").val();
		valorhref = $(this).attr("href");
		valorOpcion = $("#cantidad").val();

		mostrarDatos(buscar, valorhref, valorOpcion, c);

        $.post(base_url+'admin/sesion', {sesion: valorhref});


	});

	$("#cantidad").change(function() {
		buscar = $("#buscar").val();
		valorOpcion = $(this).val();
		mostrarDatos(buscar, 1, valorOpcion,c);
	});


	$("#formBuscar").submit(function(event) {
		event.preventDefault();

		$.ajax({
			url: $("#formBuscar").attr("action"),
			type: $("#formBuscar").attr("method"),
			data: $("#formBuscar").serialize()+'&carrera='+c,

			success:function(respuesta){
				//alert(respuesta);
			}
		});
	});
    
    $("#btnActualizar").click(actualizar);
    
     // BOTON eliminar
  	$("body").on("click", "#contentLista button.btn-delete", function(e) {
    e.preventDefault();
    idsel = $(this).attr("value");

    swal({ title: "AVISO",   text: "Está apunto de eliminar un curso, ¿Está completamente seguro(a)?.",   type: "warning",   showCancelButton: true,   cancelButtonText: "Cancelar",   confirmButtonColor: "#2196f3",   confirmButtonText: "Aceptar",   closeOnConfirm: true },
        function(isConfirm){
           if (isConfirm){
             eliminar(idsel);
            } else {
            }
          });
    //$.post(base_url+'admin/sesion', {sesion: valorhref});
  	});


    // BOTON conceptos
    $("body").on("click", "#lista_conceptos button.btn-borrar-concepto", function(e) {
        e.preventDefault();

        idsel = $(this).attr("value");
		console.log(idsel);

        swal({ title: "AVISO",   text: "Está apunto de eliminar un concepto, ¿Está completamente seguro(a)?.",   type: "warning",   showCancelButton: true,   cancelButtonText: "Cancelar",   confirmButtonColor: "#2196f3",   confirmButtonText: "Aceptar",   closeOnConfirm: true },
            function(isConfirm){
                if (isConfirm){
                    $.post(base_url+"admin/borrar_concepto", { id_concepto:idsel })
                        .done(function(data) {

                            swal("Eliminado!", "Concepto elimnado correctamente!", "success");
                            $('#formModalConceptos').modal('toggle');
                        });
                } else {
                }
            });
		});


    // BOTON conceptos
    $("body").on("click", "#contentLista button.btn-conceptos", function(e) {
        $('#lista_conceptos tbody').empty();
        $('.result').html('');
        $('#form_conceptos')[0].reset();
        e.preventDefault();
        idsel = $(this).attr("value");

        $('#id_curso').val(idsel);

        $.post(base_url+"admin/conceptos", { id_curso:idsel })
            .done(function(data) {
                // convert string to JSON
                response = $.parseJSON(data);
                console.log(response);
                if(response!=null){

                    $(function() {
                        $.each(response, function(i, item) {
                            var $tr = $('<tr>').append(
                                $('<td>').text(item.descripcion),
                                $('<td>').text('$ '+item.precio),
								$('<button type="button" value='+item.id+' class="btn btn-sm btn-danger btn-borrar-concepto">').text('Borrar')
                            ) //
                                .appendTo('#lista_conceptos');
                        });
                    });
                }else{
                    console.log('sep');
                    var $tr = $('<tr>').append(
                        $('<td colspan="3" class="text-center">').text('No conceptos registrados')
                    ) //
                        .appendTo('#lista_conceptos');
                }
            });

    });

  	// BOTON ver lista
  	$("body").on("click", "#contentLista button.btn-lista-cursos", function(e) {
    e.preventDefault();
        $('#lista tbody').empty();
        $('.result').html('');
    	var id  = $(this).attr("value");

    	$.post("listaCursos", { id_participante:id })
	        .done(function(data) {
	        	// convert string to JSON
				response = $.parseJSON(data);
				console.log(response);
	        	if(response!=null){
				$(function() {
				    $.each(response.result, function(i, item) {
				        var $tr = $('<tr>').append(
                            $('<td >').text(item.nombre),
                            $('<td >').text(item.sede),
                            $('<td>').text(item.fecha),
				            $('<td>').html('<button class="btn btn-sm btn-primary btn-raised" data-toggle="modal" data-target="#listaModal2" id="btn_lista_conceptos_inscrito">Conceptos</button>'+
                                '<a target="_blank" href="'+base_url+'cursos/ficha/'+item.id_curso+'?id_participante='+id+'" class="btn btn-sm btn-default btn-raised">Ficha</a>')
				            ) //
				        .appendTo('#lista');

				    });
				});

				$(function() {
                    $("#lista_conceptos_inscrito tbody").empty();
					$.each(response.conceptos, function(i, item) {
						var $tr = $('<tr>').append(
							$('<td>').text(item.descripcion),
							$('<td>').text('$ '+item.precio)
						) //
							.appendTo('#lista_conceptos_inscrito tbody');

					});
				});
				}else{
					var $tr = $('<tr>').append(
				            $('<td colspan="4" class="text-center">').text('No hay cursos inscritos')
				        ) //
				        .appendTo('#lista');
				}
	        });
  	});
    
    // BOTON EDITAR
	$("body").on("click", "#contentLista button.btn-edit", function(e) {
        $('.result').html('');
	    e.preventDefault();
	    var id  = $(this).attr("value");
        console.log(id);

	    $.ajax({
	      url:base_url+"admin/select_curso",
	      type: "POST",
	      data: {id:id},
	      dataType: "json",
	      success:function(respuesta){
            registro = eval(respuesta);
            console.log(registro);

	        //$("#idEdit").val(registro["id"]);
	        $("#id_curso_edit").val(registro["id_curso"]);
            $("#nombre_edit").val(registro["nombre"]);

            $("#tipo_edit").val(registro["tipo"]);

            $("#descripcion_edit").val(registro["descripcion"]);
            $("#horas_edit").val(registro["horas"]);
            $("#sede_edit").val(registro["sede"]);
            $("#instructor_edit").val(registro["instructor"]);
            $("#fecha_edit").val(registro["fecha"]);
            $("#descuento_edit").val(registro["descuento"]);
	        //$("#semestreEdit").val(registro["semestre"]);
	      }
	    });
	});
}

function mostrarDatos(valor, pagina, cantidad) {

	$.ajax({
			url: base_url+"admin/participantes_ajax",
			type: "POST",
			data: {buscar:valor, numPagina:pagina, cantidad:cantidad},
			dataType: "json",

			success:function(respuesta){
				var registros = eval(respuesta.participantes);
				html = "<table class='table table-striped table-hover table-responsive'><thead>"+
						"<tr>"+
							"<th>NOMBRE</th>"+
							"<th>EMAIL</th>"+
							"<th>ESTUDIOS</th>"+
							"<th>CIUDAD</th>"+
							"<th>MUNICIPIO</th>"+
							"<th>ENTIDAD</th>"+
							"<th>TELEFONO</th>"+
							"<th class='text-right'>OPCIONES</th>"+
						"</tr>"+
					"</thead><tbody>";
				if(registros.length>=1){
				for (var i = registros.length - 1; i >= 0; i--) {
                    html+="<tr><td> "+registros[i]["nombre"]+"</td>";
                    html+="<td> "+registros[i]["nombre"]+"</td>";
                    html+="<td> "+registros[i]["email"]+"</td>";
					html+="<td> "+registros[i]["estudios"]+"</td>";
					html+="<td> "+registros[i]["ciudad"]+"</td>";
					html+="<td> "+registros[i]["municipio"]+"</td>";
					html+="<td> "+registros[i]["entidad"]+"</td>";
					html+="<td> "+registros[i]["telefono"]+"</td>";
					html+=""+
						"<td class='text-right'>"+
                        	"<button type='button' class='btn btn-icon-toggle btn-lista-cursos' value="+registros[i]["id_participante"]+" data-toggle='modal' data-target='#cursosModal'>"+
                                    "<i class='fa fa-list' data-toggle='tooltip' data-placement='top' data-original-title='Lista de participantes'></i>"+
                                    "</button>"+
                            "<button type='button' class='btn btn-icon-toggle btn-delete' data-toggle='tooltip' data-placement='top' value="+registros[i]["id_participante"]+" data-original-title='Borar'>"+
                            "<i class='fa fa-trash-o'></i></button>"+
                    	"</td>";
                  	html +="</tr>";
				}
				}else{
					html += "<tr><td colspan='9' align='center'>No se encontraron coincidencias con la búsqueda!</td></tr>";
				}
				html +="</tbody></table></div>";

            	$("#contentLista").html(html);

            	linkSelect = Number(pagina);

            	totalRegistros = respuesta.totalRegistros;
            	cantidad = respuesta.cantidad;

            	numeroLinks = Math.ceil(totalRegistros / cantidad);
            	if(numeroLinks>20)
            		numeroLinks = 20;


            	paginador = "<ul class='pagination'>";

            	if(linkSelect > 1){
            		paginador += "<li><a href='1'>&laquo;</a></li>";
            		paginador += "<li><a href='"+(linkSelect-1)+"'>&lsaquo;</a></li>";
            	}else{
            		paginador += "<li class='disabled'><a href='#'>&laquo;</a></li>";
            		paginador += "<li class='disabled'><a href='#'>&lsaquo;</a></li>";
            	}
            	for (var i = 1; i <= numeroLinks; i++) {
            		if(i==linkSelect)
            			paginador += "<li class='active'><a href='javascript:;' >"+i+"</a></li>";
        			else
            		paginador += "<li><a href='"+i+"' >"+i+"</a></li>";
            	}

            	if(linkSelect < numeroLinks){
            		paginador += "<li><a href='"+(linkSelect+1)+"'>&rsaquo;</a></li>";
            		paginador += "<li><a href='"+numeroLinks+"'>&raquo;</a></li>";
            	}else{
            		paginador += "<li class='disabled'><a href='#'>&rsaquo;</a></li>";
            		paginador += "<li class='disabled'><a href='#'>&raquo;</a></li>";
            	}
            	paginador += "</ul>";
            	$(".paginacion").html(paginador);
			}
		});
}

function actualizar() {
	// data= $("#formEdit").serialize();
 //    alert(data);
  $.ajax({
    url:"actualizar",
    type: "POST",
    data: $("#formEdit").serialize(),
    success:function(respuesta){
      // alert('actualizado');
      swal("Exito!", "Registro actualizado correctamente!", "success");
      buscar = $("#buscar").val();
      valorOpcion = $("#cantidad").val();
      mostrarDatos(buscar, valorhref,valorOpcion);

    }
  });
}

function eliminar(idsel) {
  $.ajax({
    url:base_url+"admin/eliminar_curso",
    type: "POST",
    data: {id:idsel},
    success:function(respuesta){
      buscar = $("#buscar").val();
      valorhref = $(".")
      valorOpcion = $("#cantidad").val();
      mostrarDatos(buscar, valorhref, valorOpcion);
      swal("Eliminado!", "Curso elimnado correctamente!", "success");
    }
  });
}