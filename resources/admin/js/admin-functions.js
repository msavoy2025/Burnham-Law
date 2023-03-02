;(function($, window, document, undefined) {
	var $win = $(window);
	var $doc = $(document);

	$win.load(function() {
		$('.cf-container').magnificPopup({
			delegate: '.mfp-image',
			type: 'image',
			closeOnContentClick: true,
			mainClass: 'mfp-img-mobile',
		});
	})

	$win.load(function() {
		$('#theme-help-markdown').magnificPopup({
			delegate: '.mfp-image',
			type: 'image',
			closeOnContentClick: true,
			mainClass: 'mfp-img-mobile',
		});
	})
})(jQuery, window, document);
