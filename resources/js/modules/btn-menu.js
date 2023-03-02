$('.btn-menu').on('click', function (event) {
	event.preventDefault();

	$(this).toggleClass('active');
	$('.wrapper').toggleClass('is-nav-open');
 });
