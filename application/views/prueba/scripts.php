<!-- BEGIN JAVASCRIPT -->
<script src="<?=base_url()?>assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
<script src="<?=base_url()?>assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="<?=base_url()?>assets/js/libs/bootstrap/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/libs/spin.js/spin.min.js"></script>
<script src="<?=base_url()?>assets/js/libs/autosize/jquery.autosize.min.js"></script>
<script src="<?=base_url()?>assets/js/libs/DataTables/jquery.dataTables.js"></script>
<script src="<?=base_url()?>assets/js/libs/moment/moment.min.js"></script>
<script src="<?=base_url()?>assets/js/libs/flot/jquery.flot.min.js"></script>
<script src="<?=base_url()?>assets/js/libs/flot/jquery.flot.time.min.js"></script>
<script src="<?=base_url()?>assets/js/libs/flot/jquery.flot.resize.min.js"></script>
<script src="<?=base_url()?>assets/js/libs/flot/jquery.flot.orderBars.js"></script>
<script src="<?=base_url()?>assets/js/libs/flot/jquery.flot.pie.js"></script>
<script src="<?=base_url()?>assets/js/libs/flot/curvedLines.js"></script>
<script src="<?=base_url()?>assets/js/libs/jquery-knob/jquery.knob.min.js"></script>
<script src="<?=base_url()?>assets/js/libs/sparkline/jquery.sparkline.min.js"></script>
<script src="<?=base_url()?>assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
<script src="<?=base_url()?>assets/js/libs/jquery-validation/dist/jquery.validate.js"></script>
<script src="<?=base_url()?>assets/js/libs/jquery-validation/dist/additional-methods.min.js"></script>
<script src="<?=base_url()?>assets/js/libs/toastr/toastr.js"></script>
<script src="<?=base_url()?>assets/js/libs/d3/d3.min.js"></script>
<script src="<?=base_url()?>assets/js/libs/d3/d3.v3.js"></script>
<script src="<?=base_url()?>assets/js/libs/rickshaw/rickshaw.min.js"></script>
<script src="<?=base_url()?>assets/js/core/source/App.js"></script>
<script src="<?=base_url()?>assets/js/core/source/AppNavigation.js"></script>
<script src="<?=base_url()?>assets/js/core/source/AppOffcanvas.js"></script>
<script src="<?=base_url()?>assets/js/core/source/AppCard.js"></script>
<script src="<?=base_url()?>assets/js/core/source/AppForm.js"></script>
<script src="<?=base_url()?>assets/js/core/source/AppNavSearch.js"></script>
<script src="<?=base_url()?>assets/js/core/source/AppVendor.js"></script>
<script src="<?=base_url()?>assets/js/core/demo/Demo.js"></script>
<script src="<?=base_url()?>assets/js/core/main.js"></script>
<script language="JavaScript" src="https://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
<!-- END JAVASCRIPT -->
<script type="text/javascript">

	$(document).ready(function() {
		$('#mytable').DataTable( {
			"oLanguage": {
				"sSearch": "Period: ",
				"sLengthMenu": "Muestrar _MENU_ Filas"
			}
		} );
	} );

	$(document).ready(function() {
		$('#mytablem').DataTable( {
			"oLanguage": {
				"sSearch": "Semestre: ",
				"sLengthMenu": "Muestrar _MENU_ Filas"
			}
		} );
	} );

</script>


</body>
</html>