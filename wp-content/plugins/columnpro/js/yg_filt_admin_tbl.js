(function($) {
	$(document).ready(function() {
		$('a .colName').each(function(){
			$(this).parents('a').after($(this));
		})
	});
})(jQuery);