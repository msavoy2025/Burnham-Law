//Accordion
let activeItemClass = 'expanded';
let accordionItemSelector = '.js-accordion .js-accordion-head';
let accordionBodySelector = '.js-accordion-body';

$(accordionItemSelector).on('click', function() {

	$(this)
		.siblings().slideToggle();

	$(this)
	.parent().toggleClass(activeItemClass)
			.siblings().removeClass(activeItemClass)
				.find(accordionBodySelector).slideUp();
});
