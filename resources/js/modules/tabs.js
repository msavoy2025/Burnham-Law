import animateViewportScroll from  '../polyfills/animate';

const activeTabClass = 'current';

$('.js-tabs .js-tabs-nav a').on('click', function(event) {
	event.preventDefault();

	const $tabLink = $(this);
	const $targetTab = $($tabLink.attr('href'));
	const $parent = $tabLink.closest('.js-tabs');

	$tabLink
		.closest('.tabs__head')
			.find('li')
			.removeClass(activeTabClass);

	$tabLink
		.parent()
		.add($targetTab)
		.addClass(activeTabClass)
		.siblings()
			.removeClass(activeTabClass);

	animateViewportScroll($($parent).offset().top, 500);
});
