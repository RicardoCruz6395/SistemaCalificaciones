$( document ).ready(function() {
    $('form input[type="text"]').blur(function() {
        this.value = this.value.toUpperCase();
    });

    
    $('.toggles button').click(function(e){
    	e.preventDefault();
    	console.log(this.id);
      var get_id = this.id;
      var get_current = $('.posts .' + get_id);
      console.log(get_current);
  
        $('.post').not( get_current ).hide(500);
        get_current.show(500);
    });
    
    
    $('#showall').click(function() {
        $('.post').show(500);
    });
});


 function start() {
    $('button.btn-submit').prop('disabled', 1);
     $('.loading').fadeIn();
}

function end() {
    $('button.btn-submit').prop('disabled',0);
    $('.loading').fadeOut();
    // setTimeout(function(){
    //     $('.loading').hide();
    //     $('.btn-submit').show();
    // },500);
    
}