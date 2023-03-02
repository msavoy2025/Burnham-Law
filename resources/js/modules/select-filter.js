$('.filter-select > span').on('click', function() {
	$(this).parent().toggleClass('expanded');
});

$('.filter-select ul a').on('click', function(event) {
	event.preventDefault();
	const optionText = $(this).text();

	$(this).closest('.filter-select')
		.removeClass('expanded')
			.find('span').text(optionText);
})
