$(document).ready(function () {
  $('form input[type="text"]').blur(function () {
    this.value = this.value.toUpperCase();
  });


  $('.toggles button').click(function (e) {
    e.preventDefault();
    console.log(this.id);
    var get_id = this.id;
    var get_current = $('.posts .' + get_id);
    console.log(get_current);

    $('.post').not(get_current).hide(500);
    get_current.show(500);
  });


  $('#showall').click(function () {
    $('.post').show(500);
  });
});

function start() {
  $('button.btn-submit').prop('disabled', 1);
  $('.loading').fadeIn();
}

function end() {
  $('button.btn-submit').prop('disabled', 0);
  $('.loading').fadeOut();
  // setTimeout(function(){
  //     $('.loading').hide();
  //     $('.btn-submit').show();
  // },500);
}

function postAjax( params ) {
    
    $.ajax({
        method: params.type || 'POST',
        url: params.url,
        data: params.data || {},
        proccessData : true,
        statusCode: {
            404: function () {
                alert('Página no encontrada :(');
            },
            500: function (response) {
                //console.log(response);
                alert('Ocurrió un error en el servidor');
            }
        }
    })
    .done(function (response) {
        if( params.success )
            params.success(response);
        //console.log('Success');
        //console.log(response);
        //after_submit($this, response, modal);
        //return response;
    })

    .fail(function(response) {
      //console.log("Error",response);
      //modal.addClass('shake');
      //after_submit($this, response, modal);
      //return response;
    })

    .complete(function (response, xhr) {
      //callback(response);
      //console.log("Complete, Status: " + xhr);
      //after_submit($this, response);
    });
}

var SCModals = new function(){

    this.openModal = function(options) {

        var modal = $('#general-modal');
        $('#general-modal-title', modal).html( options.title || 'Modal' )
        $('#general-modal-ok', modal).html( options.btnOk || 'Aceptar' )
        $('#general-modal-cancel', modal).html( options.btnCancel || 'Cancelar' )
        var contenido = $('.modal-body', modal);
        modal.modal('toggle');
        contenido.html('<div class="text-center"><i class="fa fa-spin fa-spinner"></i></div>');

        if( options.url ){
            postAjax({
                url  : options.url,
                data : options.data || {},
                success : function( response ){
                    contenido.html(response);
                }
            });
        }

    };

};

var SCAlerts = new function(){
    this.drive     = "SweetAlert";

    this.error = function (options) {
        swal(
            options.title || '',
            options.message || '',
            'error'
        );
    };

    this.success = function (options) {
        swal({
            title: options.title || 'Éxito',
            text : options.message || 'Operación exitosa',
            type : 'success'
        }).then(function(){
            if( options.callback != undefined )
                options.callback()
        });
    };

    this.info = function (options) {
        swal({
            title: options.title,
            text: options.message,
            type: 'info',
            showCancelButton: false,
        }).then(function() {
            if( options.callback ){
                options.callback();
            }
        });
    };

    this.confirm = function (options) {
        swal({
            title: options.title || '',
            text: options.message || '',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: options.confirmText || 'Aceptar',
            cancelButtonText: options.cancelText || 'Cancelar',
        }).then(function(){
            options.success();
        }, function(dismiss){})
    };

    this.confirmCancel = function(options){
        swal({
            title: options.title,
            text: options.message,
            html: options.html || '',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: options.confirmText || 'Aceptar',
            cancelButtonText:  options.cancelText || 'Cancelar',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
        }).then(function () {
            options.success();
        }, function(dismiss){})
    };

};