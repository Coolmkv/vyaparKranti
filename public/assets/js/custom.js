(function($) {
    "use strict";
	
	/* ..............................................
	Loader 
    ................................................. */
	
	$(window).on('load', function() {
		const home = document.getElementById("home");
		if(home.closest("#home")){
			document.querySelector('.main-header').classList.add("common-home")
		}

		// $('.preloader').fadeOut(); 
		// $('#preloader').delay(550).fadeOut('slow'); 
		// $('body').delay(450).css({'overflow':'visible'});
	});
    	
	/* ..............................................
    Navbar Bar
    ................................................. */
	
	$('.navbar-nav .nav-link').on('click', function() {
		var toggle = $('.navbar-toggler').is(':visible');
		if (toggle) {
			$('.navbar-collapse').collapse('hide');
		}
	});
	
	/* ..............................................
    Fixed Menu
    ................................................. */
    
	$(window).on('scroll', function () {
		if ($(window).scrollTop() > 50) {
			$('.top-header').addClass('fixed-menu');
		} else {
			$('.top-header').removeClass('fixed-menu');
		}
	});

	/* ..............................................
    Properties Filter
    ................................................. */
	var Container = $('.container');
	Container.imagesLoaded(function () {
		var portfolio = $('.properties-menu');
		portfolio.on('click', 'button', function () {
			$(this).addClass('active').siblings().removeClass('active');
			var filterValue = $(this).attr('data-filter');
			$grid.isotope({
				filter: filterValue
			});
		});
		var $grid = $('.properties-list').isotope({
			itemSelector: '.properties-grid'
		});

	});

	/* ..............................................
    Gallery
    ................................................. */
	
	$(document).ready(function() {
		$('.popup-gallery').magnificPopup({
			delegate: 'a',
			type: 'image',
			tLoading: 'Loading image #%curr%...',
			mainClass: 'mfp-img-mobile',
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0,1] // Will preload 0 - before current, and 1 after the current image
			},
			image: {
				tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
				titleSrc: function(item) {
					return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
				}
			}
		});
	});
	
	/* ..............................................
    Scroll To Top
    ................................................. */
	
	$(document).ready(function () {

		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#scroll-to-top').fadeIn();
			} else {
				$('#scroll-to-top').fadeOut();
			}
		});

		$('#scroll-to-top').click(function () {
			$("html, body").animate({
				scrollTop: 0
			}, 600);
			return false;
		});

	});

	var swiper = new Swiper(".home_testimonial", {
		slidesPerView: 3,
		loop: true,
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
		breakpoints: {
			320: {
			  slidesPerView: 1,
			  spaceBetween: 0,
			},
			768: {
			  slidesPerView: 2,
			  spaceBetween: 10,
			},
			1024: {
			  slidesPerView: 3,
			  spaceBetween: 30,
			},
		},
	});
}(jQuery));
let menubar = document.querySelector('.main-navbar');
let listmenu = document.querySelector('.navigation');
let closemenu = document.querySelector('.closemenu');
menubar.addEventListener("click", function(){
	listmenu.classList.add('active');
});
closemenu.addEventListener("click", function(){
	listmenu.classList.remove('active');
});
// Build project start
let close_btn = document.querySelectorAll(".closer-btn");
let open_btn = document.querySelectorAll(".build-project");
let popup_box = document.getElementById("form-project-popup");
open_btn.forEach(function(e){
	e.addEventListener('click', function(){
		popup_box.classList.add("open");
	})
});
close_btn.forEach(function(e){
	e.addEventListener('click', function(){
		popup_box.classList.remove("open");
	})
});
// Build project end
let opens = document.querySelectorAll(".open-plus");
opens.forEach(function (toggleel) {
    toggleel.addEventListener('click', function () {
        opens.forEach(function (e) {
			let nextElementSibling = e.nextElementSibling;
            if (nextElementSibling) {
                nextElementSibling.classList.remove('opennav');
				e.classList.remove('active');
            }
		});
        let nextElementSibling = toggleel.nextElementSibling;
        if (nextElementSibling) {
            nextElementSibling.classList.add('opennav');
			toggleel.classList.add('active');
        }
	});
});
// Footer Section
let footeropens = document.querySelectorAll(".plus-open");
footeropens.forEach((toggleel) => {
    toggleel.addEventListener('click', () => {
        footeropens.forEach(function (e) {
			// console.log(e);
			let footerElementSibling = e.closest('.footer_title').nextElementSibling;
            if (footerElementSibling) {
				footerElementSibling.classList.remove('opennav');
				e.innerHTML = "add";
            }
		});
		let footerElementSibling = toggleel.closest('.footer_title').nextElementSibling;
        if (footerElementSibling) {
			footerElementSibling.classList.add('opennav');
			toggleel.innerHTML = "remove";
        }
	});
});