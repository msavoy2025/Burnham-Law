import { $win } from '../utils/globals';
import Swiper from 'swiper/js/swiper.min';

 // Fixed header on scroll
$win.on('load', () => {
	$('.slider--logos').each((i, elem) => {
		const sliderLogos = $(elem).find('.swiper-container')[0];

		const boxSlider = new Swiper(sliderLogos, {
			slidesPerView: 1,
			spaceBetween: 0,
			loop: true,
			navigation: {
				nextEl: $(elem).find('.swiper-button-next'),
				prevEl: $(elem).find('.swiper-button-prev'),
			},
			breakpoints: {
				768: {
					slidesPerView: 3,
				}
			}
		});
	});

	$('.js-slider-titles').each((i, elem) => {
		const slider = $(elem).find('.swiper-container')[0];

		const sliderTitles = new Swiper(slider, {
			slidesPerView: 1,
			resistanceRatio: 0,
			loop: true,
			effect: 'fade',
			autoplay: {
				delay: 2000,
			},
		});
	});

	$('.slider-images-holder').each((i, elem) => {
		const sliderImages = $(elem).find('.slider--images .swiper-container')[0];
		const sliderThumbs = $(elem).find('.slider--thumbs .swiper-container')[0];

		const thumbsSlider = new Swiper(sliderThumbs, {
			slidesPerView: 'auto',
			spaceBetween: 15,
			loop: false,
			freeMode: true,
			watchSlidesVisibility: true,
			watchSlidesProgress: true,
			slideToClickedSlide: true,
		});

		const imagesSlider = new Swiper(sliderImages, {
			slidesPerView: 1,
			spaceBetween: 0,
			loop: false,
			navigation: {
				nextEl: $(elem).find('.swiper-button-next'),
				prevEl: $(elem).find('.swiper-button-prev'),
			},
			thumbs: {
				swiper: thumbsSlider
			}
		});
	});

	$('.slider--articles').each((i, elem) => {
		const $slider = $(elem);
		const sliderArticles = $(elem).find('.swiper-container')[0];
		const nextEl = $slider.find('.swiper-button-next');
		const prevEl = $slider.find('.swiper-button-prev');
		const pagination = $slider.find('.swiper-pagination');

		const boxSlider = new Swiper(sliderArticles, {
			slidesPerView: 1,
			spaceBetween: 0,
			effect: 'fade',
			loop: true,
			loopAdditionalSlides: true,
			navigation: {
				nextEl: nextEl,
				prevEl: prevEl,
			},
			pagination: {
				el: pagination,
				type: 'fraction',
				clickable: true,
				renderFraction: function (currentClass, totalClass, swiper, current, total) {
					return  '<span>Card</span>' +
							'<strong class="' + currentClass + '">' + current + '</strong>' +
							'<span>of</span>' +
							'<strong class="' + totalClass + '">' + total + '</strong>';
				}
			},
			on: {
				init() {
					syncTitles();
				},

				transitionEnd() {
					syncTitles();
				}
			},
		});

		function syncTitles() {
			let $active = $slider.find('.swiper-slide-active');
			setTimeout(function() {
				let nextTitle = $('.swiper-slide-next').find('.article-item h2').text();

				$slider.find('.slider__pagination').find('p strong').html(nextTitle);
			}, 100);
		}
	});
});

