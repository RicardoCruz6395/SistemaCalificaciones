<div id="base">
  <div id="content">
    <section>
      <div class="section-body">
        <div class="row">
          <div class="col-md-12">
            <div class="card contain-xs card-underline">
              <div class="card-head">
                <header><span class="text-primary">CAMBIO DE CONTRASEÑA </span> </header>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12 text-center">

                    <img class="img-circle" width="120" src="<?=base_url()?>assets/img/gravatar.png" alt="">
                    <h3>
                      <?php
                      $this->load->model('usuarios_model');
                      echo $this->usuarios_model->getNombreUsuario();
                      ?>
                    </h3>
                    <div class="text-left">
                      <form class="form form-validate" id="form_password" action="<?=base_url('auth/post_cambiar_password')?>" accept-charset="utf-8" method="post">
                        <div class="form-group floating-label">
                          <div class="input-group">
                            <div class="input-group-content">
                              <input type="password" id="password" autofocus="" class="form-control" name="password" required data-rule-minlength="6" >
                              <label for="password">Contraseña actual</label>
                              <!-- <p class="help-block"><a href="#">Not Daniel Johnson?</a></p> -->
                            </div>
                            <div class="input-group-btn">
                              <p class="btn btn-floating-action btn-default"><i class="fa fa-unlock"></i></p>
                            </div>
                          </div>
                        </div>
                        <div class="form-group floating-label">
                          <div class="input-group">
                            <div class="input-group-content">
                              <input type="password" id="password_new" class="form-control" name="password_new" required data-rule-minlength="6" >
                              <label for="password_new">Nueva contraseña</label>
                              <!-- <p class="help-block"><a href="#">Not Daniel Johnson?</a></p> -->
                            </div>
                            <div class="input-group-btn">
                              <p class="btn btn-floating-action btn-primary"><i class="fa fa-unlock"></i></p>
                            </div>
                          </div>
                        </div>
                        <div class="form-group floating-label">
                          <div class="input-group">
                            <div class="input-group-content">
                              <input type="password" id="password_new_2" class="form-control" name="password_new_2" required data-rule-minlength="6" data-rule-equalTo="#password_new">
                              <label for="password_new_2">Repite la contraseña</label>
                              <p class="help-block"><a href="#">Las contraseñas deben coincidir</a></p>
                            </div>
                            <div class="input-group-btn">
                              <p class="btn btn-floating-action btn-primary"><i class="fa fa-unlock"></i></p>
                            </div>
                          </div><!--end .input-group -->
                        </div><!--end .form-group -->
                        <div class="form-group floating-label">
                          <div class="input-group">
                            <div class="input-group-btn">
                              <button class="btn btn-primary btn-submit" type="submit"><i class="fa fa-unlock"></i> Guardar cambios</button>
                            </div>
                            <div class="input-group-btn">
                              <a class="btn btn-default" href="<?=base_url()?>"><i class="fa fa-times"></i> Cancelar</a>
                            </div>
                          </div><!--end .input-group -->
                        </div><!--end .form-group -->
                        <span class="loading" style="display: none">
                          <i style="display: none" class="fa fa-spinner loading fa-spin fa-1x fa-fw"></i> Loading...
                        </span>
                      </form>
                    </div>
                  </div><!--end .col -->
                </div><!--end .row -->
              </div><!--end .card-body -->
            </div>
          </div><!--end .col -->
        </div>
      </div><!--end .section-body -->
    </section>
    <script src="<?= base_url() ?>assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
    <script src="<?=base_url()?>assets/CryptoJS/components/core.js"></script>
    <script src="<?=base_url()?>assets/CryptoJS/rollups/sha512.js"></script>
    <script type="text/javascript">

      $('#form_password').submit(function(e) {
        var $this = $(this);
        e.preventDefault();
        start();

          if (!$this.valid()) {   // checks form for validity
            e.preventDefault();
            end();
            return false;
          }
          var data = $(this).serializeArray();
          
          data[0].value = CryptoJS.SHA512(data[0].value);
          data[1].value = CryptoJS.SHA512(data[1].value);
          data[2].value = CryptoJS.SHA512(data[2].value);
          toastr.options.positionClass = 'toast-bottom-left';

          postAjax({
            url: $(this).attr('action'),
            data: data,
            success : function(response){
              end();
              if(response.success){
                toastr.success('Exito: '+response.message, '');
              }else{
                toastr.error('Error: '+response.message, '');
              }
            }
          });          
        });
    </script>

