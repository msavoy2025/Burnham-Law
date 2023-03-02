import { $win } from '../utils/globals';


$win.on('load resize', () => {
	 const equalizeElements = [
		 '.news-item .news-item__content',
		 '.news .news-article h5'
	 ];

	 equalizeElements.forEach( elem => $(elem).equalizeHeight() );
});

$.fn.equalizeHeight = function(){
	var maxHeight = 0, itemHeight;

	this.css('height', '');

	for (var i = 0; i < this.length; i++){
		itemHeight = $(this[i]).height();
		if (maxHeight < itemHeight) {
			maxHeight = itemHeight;
		}
	}

	return this.height(maxHeight);
};

