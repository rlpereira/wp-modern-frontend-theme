window.cl = function() {
	if(console) {
		for (var i = 0, len = arguments.length; i < len; i++) {
			var arg = arguments[i];
			console.log(arg);
		};
	}
}

$(document).ready(function() {
	cl("APP READY!");
});