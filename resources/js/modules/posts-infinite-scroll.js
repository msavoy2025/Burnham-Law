import { $win } from '../utils/globals'

let isLoading = false;

// Infinite scroll
$win.on('load scroll', () => {
	let topPosition = $win.scrollTop()
	let winH = $win.height();

	/**
	 * Ajax loading
	 */
	if ($('.footer').length) {
		let offset = $('.footer').offset().top;

		if ( (topPosition + $win.height()) > offset) {
			if ($('.news .posts-holder').length) {
				if ( $('.js-load-more').length != 0 ) {
					const url = $('.js-load-more').attr('href');
					crbLoadArticles(url, true);
				}
			}
		}
	}
});

function crbLoadArticles(link) {
	if ( isLoading ) {
		return;
	}

	const $sectionRecent = $('.news');
	let $postsHolder     = $sectionRecent.find('.posts-holder');
	let $actions         = $sectionRecent.find('.paging');
	let spinner          = $sectionRecent.find('.js-spinner');
	let headerHeight     = $('.header').outerHeight();

	$.ajax({
		url: link,
		type: "GET",
		beforeSend: function(){
			isLoading = true;
			spinner.fadeIn();
	   },
	}).done( function(response){
		let $newSectionRecent = $('.news', response);
		let $newPostsHolder   = $newSectionRecent.find('.posts-holder');
		let $newActions       = $newSectionRecent.find('.paging');
		let newPosts          = $newPostsHolder.children();

		newPosts.css('display', 'none');

		$postsHolder.append(newPosts);

		$actions.html($newActions.html());

		newPosts.each(function(index){
			$(this).fadeIn(200*index);
		})

		isLoading = false;
		spinner.fadeOut();
	})
}
