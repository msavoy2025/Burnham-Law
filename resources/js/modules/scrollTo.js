import animateViewportScroll from  '../polyfills/animate';

$('.js-scroll-down').on('click', function() {
	const targetSection = $(this).closest('section').next('section');
	animateViewportScroll($(targetSection).offset().top, 500);
});
