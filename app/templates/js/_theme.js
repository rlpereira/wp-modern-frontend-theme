window.cl = function() {
	if(console) {
		for (var i = 0, len = arguments.length; i < len; i++) {
			var arg = arguments[i];
			console.log(arg);
		};
	}
}

var bindButtons = function() {
	$('.new-post-button').on('click', function() {
		cl('clicked');
		$(this).hide();
		$("#new-post-row").slideDown('slow');
	});
}

$(document).ready(function() {
	cl("APP READY!");
	bindButtons();
});