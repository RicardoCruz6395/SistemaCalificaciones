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
                console.log(response);
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
      console.log("Error");
      console.log(response);
      //modal.addClass('shake');
      //after_submit($this, response, modal);
      //return response;
    })

    .complete(function (response, xhr) {
      //callback(response);
      console.log("Complete, Status: " + xhr);
      //after_submit($this, response);
    });
}

