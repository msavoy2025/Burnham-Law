$('.gfield_select').on('change', function() {
	$(this)
		.next('.chosen-container')
		.find('.chosen-single span')
		.css('opacity', 1);
});
