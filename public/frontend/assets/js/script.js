(function ($) {
	'use script';

	// Scroll Area
	var $scroll = $('.scroll-area');
	if ($scroll.length > 0) {
		$(document).ready(function () {
			$('.scroll-area').click(function () {
				$('html').animate({
					'scrollTop': 0,
				}, 700);
				return false;
			});
			$(window).on('scroll', function () {
				var a = $(window).scrollTop();
				if (a > 400) {
					$('.scroll-area').slideDown(300);
				} else {
					$('.scroll-area').slideUp(200);
				}
			});
		});
	}


	// Sidebar_card=====
	const buttons = document.querySelectorAll(".sidebar-button");
	const tabs = document.querySelectorAll(".tab-content");

	buttons.forEach((btn, index) => {
		btn.addEventListener("click", () => {
			// Hide all tabs
			tabs.forEach((tab) => tab.classList.add("hidden"));
			tabs[index].classList.remove("hidden");

			// Remove active-tab class from all buttons
			buttons.forEach((b) => b.classList.remove("active-tab"));

			// Add active-tab to clicked button
			btn.classList.add("active-tab");
		});
	});


	// image gallery popup
	$('.gallery-item').magnificPopup({
		type: 'image',
		gallery:{
			enabled:true
		},
		image: {
			titleSrc: 'title'
		}
	});

}(jQuery));


