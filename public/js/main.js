String.prototype.format = function() {
	var args = arguments;
	return this.replace(/{(\d+)}/g, function(match, number) {
		return typeof args[number] != 'undefined'
			? args[number]
			: match
			;
	});
};

var main = main || {};
main = {
	init: function(){
		
	}
};

$(document).ready(function(){
	main.init();
});