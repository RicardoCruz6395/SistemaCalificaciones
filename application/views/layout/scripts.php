<!-- BEGIN JAVASCRIPT -->
<script>var base_url = '<?=base_url()?>';</script>
<script src="<?= base_url() ?>assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/libs/bootstrap/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/libs/spin.js/spin.min.js"></script>
<script src="<?= base_url() ?>assets/js/libs/autosize/jquery.autosize.min.js"></script>
<script src="<?= base_url() ?>assets/js/libs/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
<script src="<?= base_url() ?>assets/js/libs/jquery-validation/dist/jquery.validate.js"></script>
<script src="<?= base_url() ?>assets/js/libs/jquery-validation/dist/additional-methods.min.js"></script>
<script src="<?= base_url() ?>assets/js/libs/toastr/toastr.js"></script>
<script src="<?= base_url() ?>assets/js/libs/d3/d3.min.js"></script>
<script src="<?= base_url() ?>assets/js/libs/d3/d3.v3.js"></script>
<script src="<?= base_url() ?>assets/js/libs/rickshaw/rickshaw.min.js"></script>
<script src="<?= base_url() ?>assets/js/core/source/App.js"></script>
<script src="<?= base_url() ?>assets/js/core/source/AppNavigation.js"></script>
<script src="<?= base_url() ?>assets/js/core/source/AppOffcanvas.js"></script>
<script src="<?= base_url() ?>assets/js/core/source/AppCard.js"></script>
<script src="<?= base_url() ?>assets/js/core/source/AppForm.js"></script>
<script src="<?= base_url() ?>assets/js/core/source/AppNavSearch.js"></script>
<script src="<?= base_url() ?>assets/js/core/demo/Demo.js"></script>
<script src="<?= base_url() ?>assets/js/core/main.js"></script>
<!-- END JAVASCRIPT -->
<script>
  


    $('.openBtn').click(function (e) {
        e.preventDefault();
        
        $('#myModal').html('<div class="modal-body">' +
        '<h3><i class="fa fa-spin fa-spinner"></i> Cargando...</h3>' +
        '</div>');

        grupo = this.getAttribute('data-g');

        postAjax(base_url + 'alumno/getCalificacionesGrupo', { grupo : grupo }, function (response) {
            $('#myModal').html(response);
        });
    });

</script>
</body>
</html>