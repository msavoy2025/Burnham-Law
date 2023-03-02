import { $win } from '../utils/globals'

let isLoading = false;
const pageTitle = document.title;

$('.js-articles-filter').on('click', 'a', function(ev) {
	ev.preventDefault();
	const url = $(this).attr('href');
	$('.js-help-center-form .search__field').val('');

	window.history.pushState('', pageTitle, url);
	crbLoadArticles(url, false);
});

$('.js-help-center-form').on('submit', function(ev) {
	ev.preventDefault();
	const searchVal = $(this).find('.search__field').val();
	const action    = $(this).attr('action');
	let url         = action;

	if (searchVal.length > 0) {
		url = updateQueryStringParameter(action, 'search', searchVal);
	}

	window.history.pushState('', pageTitle, url);
	crbLoadArticles(url, false);
})

function crbLoadArticles(link, append) {
	if ( isLoading ) {
		return;
	}

	const $sectionRecent = $('.section-help-center');
	let $postsHolder     = $sectionRecent.find('.posts-holder');
	let $actions         = $sectionRecent.find('.paging');
	let spinner          = $sectionRecent.find('.js-spinner');
	let $filters         = $('.js-articles-filter');
	let headerHeight     = $('.header').outerHeight();

	$.ajax({
		url: link,
		type: "GET",
		beforeSend: function(){
			isLoading = true;
			spinner.fadeIn();
	   },
	}).done( function(response){
		let $newSectionRecent = $('.section-help-center', response);
		let $newPostsHolder   = $newSectionRecent.find('.posts-holder');
		let $newActions       = $newSectionRecent.find('.paging');
		let $newFilters       = $('.js-articles-filter', response);
		let newPosts          = $newPostsHolder.children();

		newPosts.css('display', 'none');

		if ( append ) {
			$postsHolder.append(newPosts);
		} else {
			$postsHolder.replaceWith( $newPostsHolder );
		}

		$filters.html($newFilters.html());
		$actions.html($newActions.html());

		newPosts.each(function(index){
			$(this).fadeIn(400*index);
		})

		isLoading = false;
		spinner.fadeOut();
	})
}

function updateQueryStringParameter(uri, key, value) {
	const re = new RegExp("([?&])" + key + "=.*?(&|#|$)", "i");

	if (uri.match(re)) {
		return uri.replace(re, '$1' + key + "=" + value + '$2');
	} else {
		let hash = '';
		if (uri.indexOf('#') !== -1) {
			hash = uri.replace(/.*#/, '#');
			uri = uri.replace(/#.*/, '');
		}

		const separator = uri.indexOf('?') !== -1 ? "&" : "?";
		return uri + separator + key + "=" + value + hash;
	}
}

// Infinite scroll
$win.on('load scroll', () => {
	let topPosition = $win.scrollTop()
	let winH = $win.height();

	/**
	 * Ajax loading
	 */
	if ($('.footer').length) {
		let offset = $('.footer').offset().top;

		if ($('.section-callout').length) {
			offset = $('.section-callout').offset().top;
		}

		if ( (topPosition + $win.height()) > offset) {
			if ($('.section-help-center .posts-holder').length) {
				if ( $('.js-load-more').length != 0 ) {
					const url = $('.js-load-more').attr('href');
					crbLoadArticles(url, true);
				}
			}
		}
	}
});

function removeParam(key, sourceURL) {
	let rtn = sourceURL.split("?")[0];
	let param = '';
	let params_arr = [];
	let queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";

	if (queryString !== "") {
		params_arr = queryString.split("&");
		for (let i = params_arr.length - 1; i >= 0; i -= 1) {
			param = params_arr[i].split("=")[0];
			if (param === key) {
				params_arr.splice(i, 1);
			}
		}

		if (params_arr.length != 0) {
			rtn = rtn + "?" + params_arr.join("&");
		}
	}

	return rtn;
}
