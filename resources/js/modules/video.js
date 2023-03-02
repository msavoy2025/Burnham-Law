import Plyr from 'plyr/dist/plyr.polyfilled.min.js';

/**
* Init Plyr for Videos
*/
 let players = Array.from(document.querySelectorAll('.js-player')).map(elem => {
	const id = $(elem).parent('.video').attr('id');

	const player = new Plyr(elem, {
		hideControls: false,
		muted: true,
		clickToPlay: true,
		loop: {
			active: false
		}
	});

	return {id, player}
 });

 /**
	* Play function for Plyr Videos
	*/
 function playVideo(id){
	const video = players.find(elem => elem.id === id);

	video.player.play();
 }

 /**
	* Pause function for Plyr Videos
	*/
 function pauseVideo(id) {
	const video = players.find(elem => elem.id === id);

	video.player.pause();
 }
