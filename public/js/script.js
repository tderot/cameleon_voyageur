/***************** Header BG Scroll ******************/

	$(function() {
		$(window).scroll(function() {
			var scroll = $(window).scrollTop();

			if (scroll >= 20) {
				$('#navbar').css({
					"border-bottom": "none",
					"padding": "35px 0"
				});
				$('#navbar .member-actions').css({
					"top": "26px",
				});
				$('#navbar .navicon').css({
					"top": "34px",
				});
			} else {
				$('#navbar').css({
					"border-bottom": "solid 1px rgba(255, 255, 255, 0.2)",
					"padding": "50px 0"
				});
				$('#navbar .member-actions').css({
					"top": "41px",
				});
				$('#navbar .navicon').css({
					"top": "48px",
				});
			}
		});
	});
	/***************** Smooth Scrolling ******************/

	$(function() {

		$('a[href*=#]:not([href=#])').click(function() {
			if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {

				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
				if (target.length) {
					$('html,body').animate({
						scrollTop: target.offset().top
					}, 2000);
					return false;
				}
			}
		});

	});