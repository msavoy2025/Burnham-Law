$('.nav a').on('click', function(event) {
	if ($(this).parent('.menu-item-has-children').length ) {
		event.preventDefault();
		const $dropdown = $(this).attr('href');

		$('.wrapper').addClass('is-dropdown-active');
		$($dropdown).show().siblings('.dropdown').hide();
	}
});

$('.nav-dropdown .nav__close').on('mouseenter', function() {
	$('.wrapper').removeClass('is-dropdown-active');
});

$('.nav-mobile a').on('click', function(event) {
	if ($(this).siblings('.sub-menu').length ) {
		event.preventDefault();
		$(this).parent().addClass('is-expanded');
	} else if ($(this).parent().hasClass('sub-menu__top')) {
		event.preventDefault();
		$(this).closest('.menu-item-has-children').removeClass('is-expanded')
	}
});
