document.addEventListener('DOMContentLoaded', () => {
	const swiper = new Swiper('.mainbanner-slider', {
		slidesPerView: 1,
		spaceBetween: 10,
		effect: "fade",
		loop: true,
		autoplay: {
			delay: 10000,
		},
		navigation: {
			nextEl: '.mainbanner-slider .arrow-right',
			prevEl: '.mainbanner-slider .arrow-left',
		},
		pagination: {
			el: '.swiper-pagination',
			type: 'bullets',
			clickable: true,
		  },
	});

});