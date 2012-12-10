/*
 * @author Deux Huit Huit
 */
;(function ($) {
	
	var
	
	contents = null,
	
	sections = null,
	
	fields = null,
	
	fieldCollapsible = {
		items: 'li',
		handles: 'div',
		content: 'table'
	},
	
	init = function () {
		contents = $('#contents');
		sections = $('section', contents);
		
		fields = sections
			.find('.fields')
			.symphonyCollapsible(fieldCollapsible);
		
		fields
			.find(fieldCollapsible.handles)
			.trigger('collapse');
	};
	
	$(init);
	
})(jQuery);