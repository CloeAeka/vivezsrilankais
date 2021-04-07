/*global $, jQuery, alert*/
(function ($) {

	function vossenSliders() {
		// Featured Posts
		var featuredSlider = $('.featured-slider'),
			sliderType = featuredSlider.data('slider-type'),
			loop = featuredSlider.data('loop'),
			autoplaySpeed = featuredSlider.data('autoplay'),
			//navArrows = ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
			vsDragEndSpeed = 500;


		if( ((sliderType == '1') ) ) {
			new Swiper (featuredSlider, {
				loop: loop,
				grabCursor: true,
				roundLengths: true,
				parallax: true,
				autoplay: autoplaySpeed,
				speed: 400,
				nextButton: '.swiper-button-next',
				prevButton: '.swiper-button-prev',
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev'
				},
				slidesPerView: 'auto',
				spaceBetween: -1,
				breakpoints: {
					992: {
						slidesPerView: 1,
						spaceBetween: 0
					},
				},
				centeredSlides: true,
				'onInit': function(){
					featuredSlider.addClass('swiper-loaded');
				}
			});
		} else if( ( (sliderType == '2') || (sliderType == '3') || (sliderType == '6') || (sliderType == '9') ) ) {
			new Swiper (featuredSlider, {
				loop: loop,
				grabCursor: true,
				roundLengths: true,
				parallax: true,
				autoplay: autoplaySpeed,
				speed: 400,
				nextButton: '.swiper-button-next',
				prevButton: '.swiper-button-prev',
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev'
				},
				slidesPerView: 1,
				spaceBetween: 0,
				centeredSlides: false,
				visibilityFullFit: true,
				'onInit': function(){
					featuredSlider.addClass('swiper-loaded');
				}
			});
		} else if( sliderType == '4' ) {
			new Swiper (featuredSlider, {
				loop: loop,
				loopAdditionalSlides: 4,
				grabCursor: true,
				roundLengths: true,
				parallax: true,
				autoplay: autoplaySpeed,
				speed: 400,
				nextButton: '.swiper-button-next',
				prevButton: '.swiper-button-prev',
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev'
				},
				slidesPerView: 2,
				spaceBetween: 36,
				centeredSlides: true,
				'onInit': function(){
					featuredSlider.addClass('swiper-loaded');
				}

			});
		} else if( sliderType == '5' ) {
			new Swiper (featuredSlider, {
				loop: loop,
				grabCursor: true,
				roundLengths: true,
				parallax: true,
				autoplay: autoplaySpeed,
				speed: 400,
				nextButton: '.swiper-button-next',
				prevButton: '.swiper-button-prev',
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev'
				},
				slidesPerView: 2,
				spaceBetween: 0,
				centeredSlides: false,
				'onInit': function(){
					featuredSlider.addClass('swiper-loaded');
				}

			});
		} else if( (sliderType == '7') ) {
			new Swiper (featuredSlider, {
				loop: loop,
				grabCursor: true,
				roundLengths: true,
				parallax: false,
				autoplay: autoplaySpeed,
				speed: 400,
				nextButton: '.swiper-button-next',
				prevButton: '.swiper-button-prev',
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev'
				},
				slidesPerView: 2,
				spaceBetween: 40,
				centeredSlides: false,
				'onInit': function() {
					featuredSlider.addClass('swiper-loaded');
				}
			});
		} else if( (sliderType == '8') ) {
			new Swiper (featuredSlider, {
				loop: loop,
				grabCursor: true,
				roundLengths: true,
				parallax: true,
				autoplay: autoplaySpeed,
				speed: 400,
				nextButton: '.swiper-button-next',
				prevButton: '.swiper-button-prev',
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev'
				},
				slidesPerView: 'auto',
				spaceBetween: -1,
				centeredSlides: true,
				'onInit': function() {
					featuredSlider.addClass('swiper-loaded');
				}
			});
		}

		// Post Carousel
		var postSlider = $('.post-slider'),
			autoplaySpeed = postSlider.data('autoplay');

		new Swiper (postSlider, {
			loop: false,
			grabCursor: true,
			roundLengths: true,
			parallax: true,
			autoplay: autoplaySpeed,
			speed: 350,
			pagination: '.post-slider-pag',
			paginationClickable: true,
			paginationBulletRender: function (swiper, index, className) {
				return '<span class="' + className + '"><div></div></span>';
			},
			slidesPerView: 1,
			spaceBetween: 0,
			centeredSlides: true,
		});

		// Single Related Posts
		new Swiper ('.related-post-slider', {
			loop: false,
			grabCursor: true,
			roundLengths: true,
			parallax: false,
			autoplay: false,
			speed: 350,
			pagination: '.related-post-slider-pag',
			paginationClickable: true,
			paginationBulletRender: function (swiper, index, className) {
				return '<span class="' + className + '"><div></div></span>';
			},
			slidesPerView: 3,
			spaceBetween: 30,
			breakpoints: {
				992: {
					slidesPerView: 3,
					spaceBetween: 15
				},
				640: {
					slidesPerView: 2,
					spaceBetween: 15
				}
			},
		});

		new Swiper ('.widget-slider-posts', {
			loop: true,
			grabCursor: true,
			roundLengths: true,
			parallax: true,
			autoplay: false,
			speed: 400,
			pagination: '.widget-slider-posts-pag',
			paginationClickable: true,
			paginationBulletRender: function (swiper, index, className) {
				return '<span class="' + className + '"><div></div></span>';
			},
			slidesPerView: 1,
			spaceBetween: 0,
			centeredSlides: false,
		});

		// Popular Posts
		var popularSlider = $('.popular-posts-slider'),
			popularLoop = popularSlider.data('loop'),
			popularColumns = popularSlider.data('columns'),
			popularAutoplaySpeed = popularSlider.data('autoplay');
		new Swiper (popularSlider, {
			loop: popularLoop,
			grabCursor: true,
			roundLengths: true,
			parallax: false,
			autoplay: popularAutoplaySpeed,
			speed: 350,
			pagination: '.related-post-slider-pag',
			paginationClickable: true,
			paginationBulletRender: function (swiper, index, className) {
				return '<span class="' + className + '"><div></div></span>';
			},
			slidesPerView: popularColumns,
			spaceBetween: 30,
			breakpoints: {
				992: {
					slidesPerView: 3,
					spaceBetween: 15
				},
				640: {
					slidesPerView: 2,
					spaceBetween: 15
				}
			},
			'onInit': function(){
				popularSlider.addClass('swiper-loaded');
			}
		});

	}

	function vossenDataImageSrc() {
		$( ".thumb-bg" ).each(function() {
		  var attr = $(this).attr('data-img');
		  if (typeof attr !== typeof undefined && attr !== false) {
			  $(this).css('background-image', 'url('+attr+')');
		  }
		});
	}

	function vossenNav() {

		// Side Menu
		$('.open-side-menu').on('click', function() {
			$('body').addClass('side-menu-opened');
			$(document).mouseup(function (e) {
				var container = $('#side-menu');
				if (!container.is(e.target) && container.has(e.target).length === 0) {
					$('body').removeClass('side-menu-opened');
				}
			});

		});

		$('.close-side-menu').on('click', function() {
			$('body').removeClass('side-menu-opened');
		});

		// Header Dropdown
		$("#side-menu ul.sub-menu,.widget_nav_menu ul.sub-menu").parent().append("<span class='sub-menu-dropdown-arrow'><i class='fa fa-angle-down'></i></span>");
		$("#side-menu .nav-menu li a, .widget_nav_menu li a").on("click", function (e) {
			//allow links to be followed if they don't have a sub-menu
			if ( !$(this).parent().has("ul").length ) { return; }

			//we have a sub-menu, so stop the link from being followed
			e.preventDefault();

			if(!$(this).hasClass("open")) {
				//we need to know which 'level' we're on
				var currentLevel = $(this).closest('ul')
				$("li ul", currentLevel).slideUp('400', 'easeInOutExpo');
				$("li a", currentLevel).removeClass("open");

				// open our new menu and add the open class
				$(this).next("ul").slideDown('400', 'easeInOutExpo');
				$(this).addClass("open");
			} else {
				$(this).removeClass("open");
				$(this).next("ul").slideUp('400', 'easeInOutExpo');
			}
		});

		///////////////////////////////////////
		$('.scroll-top').on('click', function () {
			$('html, body').stop().animate({ scrollTop: 0 }, 1000, 'easeInOutExpo');
			return false;
		});

		// Header Sticky
		var lastScrollTop = 0;
		$(window).scroll(function(event) {
			var st = $(this).scrollTop();
			if ( st > 300 && st < 700 ) {
				$('.header').addClass("sticky");
			} else {
				if ( st > lastScrollTop ) {
					$('.header').removeClass("sticky");
				} else {
					$('.header').addClass("sticky");
				}
			}
			if ( st < 300 ) {
				$('.header').removeClass("sticky");
			}
			lastScrollTop = st;
		});

	}

	function vossenMailPoet() {
		$('.wysija-input[title]').each(function() {
			var $t = $(this);
			$t.attr({ placeholder : $t.attr('title'), }).removeAttr('title');
		});
	}

	function vossenWaypoint() {

		if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
			$('body').removeClass('waypoint-on');
		} else {

			var itemQueue = []
			var delay = 100
			var queueTimer

			function processItemQueue() {
				if (queueTimer) return // We're already processing the queue
				queueTimer = window.setInterval(function () {
					if (itemQueue.length) {
						$(itemQueue.shift()).addClass('reveal');
						processItemQueue()
					} else {
						window.clearInterval(queueTimer)
						queueTimer = null
					}
				}, delay)
			}

			$('.home.waypoint-on article,.archive.waypoint-on article').bind('inview', function (event, visible) {
				if (visible == true) {
					itemQueue.push($(this))
					processItemQueue()
				}
			});

		}


		function vossenFaceSDK() {
			var vosDataFaceLang = $('.fb-page').attr('data-face-lang');
			if ( vosDataFaceLang ) {
				var vosFaceLang = vosDataFaceLang;
			} else {
				var vosFaceLang = 'en_US';
			}
			(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.async=true;
				js.src = "//connect.facebook.net/" + vosFaceLang + "/sdk.js#xfbml=1&version=v2.7";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		};

		$('.open-side-menu').on('click', function() {
			// Instagram App
			$('.side-menu-widgets .null-instagram-feed').addClass('inview-show');
			// Facebook SDK
			vossenFaceSDK();
		});

		$(window).scroll(function(event) {
			if ( $(this).scrollTop() > 300 ) {
				// Instagram App
				$('aside.widget-area .null-instagram-feed').addClass('inview-show');
				$('.inview').addClass('inview-show');
				// Facebook SDK
				vossenFaceSDK();
			}
		});
	}

	function vossenPinIt() {

		$(".single-post .post-entry-content img").each(function() {
			if($(this).parents('a').length) {
				$(this).parent('a').wrap('<figure></figure>');
			} else {
				$(this).wrap('<figure class="only-pin"></figure>');
			}
		});

		$('.single-post.pin-enable .post-entry-content figure').each(function() {
			if($(this).children('a').length) {
				var pinurl = $(this).children('a').attr('href');
			} else {
				var pinurl = $(this).children('img').attr('src');
			}
			var description = $(this).closest('.wp-caption-text').text();

			if (!$(this).has('figure').length) {
				$(this).append( '<a class="append-pinterest icon-pinterest" href="http://www.pinterest.com/pin/create/bookmarklet/?url='+pinurl+'&media='+pinurl+'&is_video=false&description='+description+'" target="_blank"><i class="fa fa-pinterest"> <span>Pin It</span></i></a>');
			}
			if ($(this).parent('p').length) {
				$(this).parent('p').css({ "text-align": "center" });
			}
		});

		$('.single-post .post-entry-content img').each(function() {
			if ($(this).hasClass('alignright')) {
				$(this).parent('figure').addClass('alignright');
				$(this).parent('a').parent('figure').addClass('alignright');
			}
			if ($(this).hasClass('alignleft')) {
				$(this).parent('figure').addClass('alignleft');
				$(this).parent('a').parent('figure').addClass('alignleft');
			}
		});

	}

	function vossenSingleLightbox() {

		$('.single-post.lightbox-enable .post-entry-content img').each(function() {
			var singleImgsParent = $(this).parent('a');
			var singleImgsSrc = $(this).attr('src');
			var singleImgsHref = singleImgsParent.attr('href');
			if (singleImgsParent.length) {
				if(/\.(?:jpg|jpeg|gif|png)$/i.test(singleImgsParent.attr('href'))) {
					$(this).parent().addClass('single-lightbox-src');
					$(this).parent('a').append( '<span class="img-lightbox-overlay"><i class="fa fa-search"></i></span>');
				}
			}
		});

		$('.single-lightbox,.single-lightbox-src').magnificPopup({
			type: 'image',
			gallery: {
				enabled: true,
				arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"><i class="ion-ios-arrow-right"></i></button>'
			},
			closeMarkup: '<button title="%title%" type="button" class="mfp-close ion-android-close"></button>',
			mainClass: 'mfp-zoom-out',
			removalDelay: 500,
			callbacks: {
				beforeOpen: function () {
					this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
				}
			},
			midClick: true,
			image: {
				titleSrc: function(item){
					var title = item.el.attr('title');
					if(!title) title = item.el.find('img').attr('title');
					if(!title) title = item.el.parent().next('.wp-caption-text').html();
					if(!title) title = item.el.find('img').attr('alt');
					if(typeof title == "undefined") return "";
					return title;
				},
				cursor: 'null',
				verticalFit: true,
				tError: '<a href="%url%">The image</a> could not be loaded.' // Error message
			}
		});
	}

	function vossenLightbox() {

		// Inline popups
		$('.open-popup-link').magnificPopup({
			type:'inline',
			removalDelay: 500,
			callbacks: {
				beforeOpen: function() {
					$('body').addClass('search-overlay-opened');
					this.st.mainClass = this.st.el.attr('data-effect');
				},
				beforeClose: function() {
					$('body').removeClass('search-overlay-opened');
				},
				open: function() {
					setTimeout(function() {
						$('#search-popup .vossen-search-input').focus();
					}, 400);

				},
			},
			midClick: true,
			closeMarkup: '',
		});

		$('.vossen-lightbox').magnificPopup({
			delegate: 'a',
			type: 'image',
			gallery: {
				enabled: true,
				arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"><i class="ion-ios-arrow-right"></i></button>'
			},
			mainClass: 'mfp-zoom-in',
			removalDelay: 500,
			callbacks: {
				beforeOpen: function () {
					this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
				}
			},
			midClick: true,
			closeMarkup: '<button title="%title%" type="button" class="mfp-close ion-android-close"></button>',
			image: {
				cursor: 'null',
				titleSrc: function(item){
					var title = item.el.attr('title');
					if(!title) title = item.el.find('img').attr('title');
					if(!title) title = item.el.parent().next('.wp-caption-text').html();
					if(!title) title = item.el.find('img').attr('alt');
					if(typeof title == "undefined") return "";
					return title;
				},
				verticalFit: true,
				tError: '<a href="%url%">The image</a> could not be loaded.' // Error message
			}
		});
		$('.popup-video, .popup-gmaps').magnificPopup({
			disableOn: 700,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
			midClick: true,
			fixedContentPos: false,
			iframe: {
				markup: '<div class="mfp-iframe-scaler">' +
						'<button title="%title%" type="button" class="mfp-close ion-android-close"></button>' +
						'<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
					  '</div>',
				patterns: {
					youtube: {
						index: 'youtube.com/',
						id: 'v=',
						src: 'https://www.youtube.com/embed/%id%?autoplay=1'
					},
					vimeo: {
						index: 'vimeo.com/',
						id: '/',
						src: 'https://player.vimeo.com/video/%id%?autoplay=1'
					},
					gmaps: {
						index: 'https://maps.google.',
						src: '%id%&output=embed'
					}
				},
				srcAction: 'iframe_src'
			},
			closeMarkup: '<button title="%title%" type="button" class="mfp-close ion-android-close"></button>',
		});

	}

	function vossenVideoPlay() {
		$('.post-video .thumb-holder').on("click", function(ev){
			var videoThumb = $(this),
				postVideo = $(this).closest('.post-video'),
				iframe = postVideo.find('iframe');

			videoThumb.animate({
				'opacity': 0
			}, 500, function() {
				$(this).css({'display': 'none'});
			});

			iframe[0].src += "?autoplay=1&autoplay=true";
			ev.preventDefault();
		});
	}

	function vossenStickySidebars() {

		if ($(window).width() > 992) {
			$('.sticky-sidebar').theiaStickySidebar({
				additionalMarginTop: 100
			});
			$('.share-sticky').theiaStickySidebar({
				additionalMarginTop: 100
			});
		}

	}

	function vossenMasonry() {
		var $grid = $('.grid-layout').masonry({
		  itemSelector: '.grid-post',
		});
		$grid.imagesLoaded().progress( function() {
			$grid.masonry('layout');
		});
		var msnry = $grid.data('masonry');

		if (!!$.prototype.infiniteScroll) {
			// Home/Archive Infinite
			var $container = $('.content-area .posts-row');
			if ($('body').hasClass('infinite-button')) {
				$container.infiniteScroll({
					path: '.infinite-older-posts',
					append: 'article',
					history: true,
					status: '.page-load-status',
					button: '.view-more-button',
					scrollThreshold: false,
					outlayer: msnry,
				});
			} else {
				$container.infiniteScroll({
					path: '.infinite-older-posts',
					append: 'article',
					history: true,
					status: '.page-load-status',
					outlayer: msnry,
				});
			}

			$container.on( 'append.infiniteScroll', function( event, response, path, items ) {
				// get posts from response
				var $posts = $( response ).find('article');
				// append posts after images loaded
				$posts.imagesLoaded( function() {
					$(items).each(function(i) {
						var $appended = $(this);
						vossenWaypoint();
						vossenMasonry();
					});
				});
			});
			// Single Infinite
			var $singleContainer = $('.infinite-single-enable .content-area .single-post-row');
			$singleContainer.infiniteScroll({
				path: function(pageNumber) {
						  return $("article:last-child .older-post-link a").attr("href");
					  },
				append: 'article',
				status: '.page-load-status',
				//button: '.view-more-button',
				//scrollThreshold: false,
				hideNav: '.post-pagination',
			});

			$singleContainer.on( 'append.infiniteScroll', function( event, response, path, items ) {
				$('.post-pagination').css({ 'display':'none' });
				vossenSliders();
				vossenSingleLightbox();
				vossenStickySidebars();
				vossenScrollAnchor();
			});
		}

	}

	function vossenJustifiedGallery() {
		$(".justified-gallery").justifiedGallery({
			rowHeight : 140,
			lastRow : 'justify',
			margins : 3
		});
	}

	function vossenScrollAnchor() {
		$('.single-post .post-header-info a[href*=#],.comments-scroll').on('click', function(event){
			event.preventDefault();
			$('html,body').animate({
				scrollTop: $(this).closest('article').find('.comments-area').offset().top -100
			}, 1000, 'easeInOutExpo');
		});
	}

	function vossenShopSlider() {
		if ($('.woocommerce').length) {
			var $carousel = $('.shop-single-slider').flickity({imagesLoaded: true}),
				$carouselNav = $('.shop-single-thumb-nav'),
				$carouselNavCells = $carouselNav.find('.shop-single-thumb'),
				flkty = $carousel.data('flickity'),
				navCellHeight = $carouselNavCells.height(),
				navHeight = $carouselNav.height();

			$carouselNav.on('click', '.shop-single-thumb', function (event) {
				var index = $(event.currentTarget).index();
				$carousel.flickity('select', index);
			});

			$carousel.on('select.flickity', function () {
			  // set selected nav cell
				if ($('.is-nav-selected').length) {
					$carouselNav.find('.is-nav-selected').removeClass('is-nav-selected');
					var $selected = $carouselNavCells.eq(flkty.selectedIndex).addClass('is-nav-selected'),
						scrollY = $selected.position().top + $carouselNav.scrollTop() - (navHeight + navCellHeight) / 2;
					$carouselNav.animate({
						scrollTop: scrollY
					});
				}
			});
		}
	}

	function vossenWooLightbox() {
		if ($(window).width() < 992) {
			$('.vossen-lightbox a').on('click', function () {
				return false;
			});
		}
	}

	function vossenWooTabs() {
		$('.woocommerce-tabs .panel:first-child').addClass('active');
		$('.woocommerce-tabs ul.tabs li a').off('click').on('click', function () {
			var tabLink = $(this),
				activeTab = $(this).attr('href');
			tabLink.parent().siblings().removeClass('active').end().addClass('active');
			$('.woocommerce-tabs').find(activeTab).siblings('.panel').filter(':visible').fadeOut(400, function () {
				$('.woocommerce-tabs').find(activeTab).siblings('.panel').removeClass('active');
				$('.woocommerce-tabs').find(activeTab).addClass('active').fadeIn(400);
			});
			return false;
		});
	}

	function vossenWooLoginRegister() {

		var account_tab_list = $('.account-tab-list');
		account_tab_list.on('click','.account-tab-link',function(){

			if ( $('.account-tab-link').hasClass('registration_disabled') ) {
				return false;
			} else {

				var that = $(this),
					target = that.attr('href');

				that.parent().siblings().find('.account-tab-link').removeClass('current');
				that.addClass('current');

				$('.account-forms').find($(target)).siblings().stop().fadeOut(function(){
					$('.account-forms').find($(target)).fadeIn();
				});

				//$(target).siblings().stop().fadeOut(function(){
				//	$(target).fadeIn();
				//});

				return false;
			}
		});
	}

	function vossenWooQuantity() {
		$('.quantity').on('click', '.plus-btn', function(e) {
			$input = $(this).prev('input.qty');
			var val = parseInt($input.val());
			var step = $input.attr('step');
			step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
			$input.val( val + step ).change();
		});
		$('.quantity').on('click', '.minus-btn', function(e) {
			$input = $(this).next('input.qty');
			var val = parseInt($input.val());
			var step = $input.attr('step');
			step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
			if (val > 1) {
				$input.val( val - step ).change();
			}
		});
	}

	function vossenWPimageUnwrap() {
		$('.page-entry-content p img').each(function() {
			$(this).parent().css('margin', '0');
		});
	}

	function vossenChromeImgRendering() {
		var vsIsChrome = !!window.chrome && !!window.chrome.webstore,
			css = '.nav-secondary .site-title img, .footer-logo img { image-rendering: -webkit-optimize-contrast; }',
			head = document.head || document.getElementsByTagName('head')[0],
			style = document.createElement('style');

		if (vsIsChrome) {
			style.type = 'text/css';
			if (style.styleSheet) {
				style.styleSheet.cssText = css;
			} else {
				style.appendChild(document.createTextNode(css));
			}

			head.appendChild(style);
		}
	}

	function vossenSocialPopUp() {
		$('.share-link').on('click', function() {
			var url = $(this).attr('data-href'),
				width = $(this).attr('data-width'),
				height = $(this).attr('data-height'),
				leftPosition = (window.screen.width / 2) - ((width / 2) + 10),
				topPosition = (window.screen.height / 2) - ((height / 2) + 50);

			window.open(url, "Window2","status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no");
		});
		if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
			if ($(window).width() < 992) {
				$('.share-whatsapp').css({"display":"inline-block"});
			} else {
				$('.share-whatsapp').css({"display":"block"});
			}
		}
	}

	$(window).ready(function () {
		vossenSliders();
		vossenDataImageSrc();
		vossenNav();
		vossenMailPoet();
		vossenWaypoint();
		vossenStickySidebars();
		vossenMasonry();
		vossenScrollAnchor();
		vossenJustifiedGallery();
		vossenPinIt();
		vossenSocialPopUp();
		vossenShopSlider();
		vossenLightbox();
		vossenSingleLightbox();
		vossenVideoPlay();
		vossenWooLightbox();
		vossenWooLoginRegister();
		vossenWooQuantity();
		vossenWPimageUnwrap();
	});

	$(document).ajaxComplete(function(){
		vossenWooQuantity();
	});

	$(window).load(function () {
		vossenWooTabs();
	});
/*
	$(document).on( 'scroll', function(){
	   vossenMasonry();
   });*/

}(jQuery));
