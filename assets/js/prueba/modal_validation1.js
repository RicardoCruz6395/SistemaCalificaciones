window.error = function(msg) {
    var dom = '<div class="top-alert"><div class="alert alert-danger alert-dismissible fade in " role="alert"><i class="glyphicon glyphicon-exclamation-sign"></i> ' + msg + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div></div>';
	var jdom = $(dom);
	jdom.hide();
	$("body").append(jdom);
	jdom.fadeIn();
	setTimeout(function() {
		jdom.fadeOut(function() {
			jdom.remove();
		});
	}, 6000);
}
window.info = function(msg) {
	var dom = '<div class="top-alert"><div class="alert alert-info alert-dismissible fade in " role="alert"><i class="glyphicon glyphicon-info-sign"></i> ' + msg + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div></div>';
	var jdom = $(dom);
	jdom.hide();
	$("body").append(jdom);
	jdom.fadeIn();
	setTimeout(function() {
		jdom.fadeOut(function() {
			jdom.remove();
		});
	}, 6000);
}
window.success = function(msg) {
    var dom = '<div class="top-alert"><div class="alert alert-success alert-dismissible fade in " role="alert"><i class="glyphicon glyphicon-ok"></i> ' + msg + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div></div>';
    var jdom = $(dom);
    jdom.hide();
	$("body").append(jdom);
	jdom.fadeIn();
	setTimeout(function() {
		jdom.fadeOut(function() {
			jdom.remove();
		});
	}, 6000);
}