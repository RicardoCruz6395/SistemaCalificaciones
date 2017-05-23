
    $(document).ready(function() {
     
        $('#mytablemat').DataTable( {
            "oLanguage": {
                "sSearch": "Materia: ",
                "sLengthMenu": "Muestrar _MENU_ Filas"
            }
        } );
       $("[data-toggle=tooltip]").tooltip();
    } );

	$(document).ready(function() {
		$('#mytable').DataTable( {
			"oLanguage": {
				"sSearch": "Period: ",
				"sLengthMenu": "Muestrar _MENU_ Filas"
			}
		} );
		 $("[data-toggle=tooltip]").tooltip();
	} );

	$(document).ready(function() {
		$('#mytablem').DataTable( {
			"oLanguage": {
				"sSearch": "Semestre: ",
				"sLengthMenu": "Muestrar _MENU_ Filas"
			}
		} );
	} );

