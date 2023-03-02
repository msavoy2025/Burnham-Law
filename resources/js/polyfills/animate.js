/**
 * Animate the viewport to certain offest
 * @param  {Number}   to       the offset to animate to
 * @param  {Number}   time     the time for the animation in ms
 * @param  {Function} callback callback function after the animation
 */
const animateViewportScroll = (to, time, callback) => {
	$('html, body').animate({
		scrollTop: to
	}, time, 'linear', callback);
}

export default animateViewportScroll
