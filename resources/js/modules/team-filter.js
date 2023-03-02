import { $win } from '../utils/globals'

let isLoading = false;
const pageTitle = document.title;

$('.js-team-filter').on('click', 'a', function(ev) {
	ev.preventDefault();
	const url = $(this).attr('href');

	window.history.pushState('', pageTitle, url);
	crbLoadTeamMembers(url);
});

function crbLoadTeamMembers(link) {
	if ( isLoading ) {
		return;
	}

	let $postsHolder = $('.posts-holder');
	let headerHeight   = $('.header').outerHeight();

	$.ajax({
		url: link,
		type: "GET",
		beforeSend: function(){
			isLoading = true;
	   },
	}).done( function(response){
		let $newPostsHolder = $('.posts-holder', response);
		let newPosts = $newPostsHolder.children();

		newPosts.css('display', 'none');
		$postsHolder.replaceWith( $newPostsHolder );

		newPosts.each(function(index){
			$(this).fadeIn(200*index);
		})

		isLoading = false;
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
