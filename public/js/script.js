$(function() {
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 20){
            $('#navbar').addClass('navbar-color');
        }else{
            $('#navbar').removeClass('navbar-color');
        }
    });
});