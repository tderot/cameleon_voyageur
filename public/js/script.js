$(function() {
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 20){
            $('#navbar').addClass('navbar-fixed-top');
		}else{
            $('#navbar').removeClass('navbar-fixed-top');
		}
	});
});