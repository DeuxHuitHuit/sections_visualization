/*
 * @author Deux Huit Huit
 */
;(function ($) {
	
	var
	
	contents = null,
	
	sections = null,
	
	fields = null,
	
	init = function () {
		contents = $('#contents');
		sections = $('section', contents);
		
		fields = sections.find('.fields').symphonyCollapsible({
			items: 'li',
			handles: 'div',
			content: 'table'
		}).trigger('collapse');
	};
	
	$(init);
	
})(jQuery);