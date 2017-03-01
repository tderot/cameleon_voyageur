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
function test_fb(){
    var width = Math.round(window.innerWidth);
    var width2 = Math.round(window.innerWidth/3);
    if(width<=360){
        document.getElementById('footer_fb').innerHTML='<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Flecameleonvoyageur%2F&width='+width+'&layout=button_count&action=like&size=large&show_faces=false&share=false&height=21&appId" width="'+width+'" height="50" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" class="fb_like"></iframe>';
    }else if(width>360&&width<1280){
        document.getElementById('footer_fb').innerHTML='<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Flecameleonvoyageur%2F&tabs=timeline&width='+width+'&height='+width2+'&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" width="'+width+'" height="'+width2+'" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" class="fb_plugin"></iframe>';
    }else if(width>=1280){
        document.getElementById('footer_fb').innerHTML='<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Flecameleonvoyageur%2F&tabs=timeline&width='+width+'&height='+width2+'&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" width="'+width+'" height="'+width2+'" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" class="fb_plugin"></iframe>';
    }
}
test_fb();
$(window).resize(function(){
    test_fb();
});
$(function () {
    var info = $("#info");
    if (info.length == 0) {
        info = $("<span />").addClass("info");
        $("body").append(info);
    }
    info.hide();
    $(".hover_text").bind("mouseenter", function () {
        var p = GetScreenCordinates(this);
        info.html(this.alt);
        info.show();
        info.css("width", $(this).width());
        info.css({ "left": p.x, "top": p.y + this.offsetHeight - info[0].offsetHeight });
    });
    $(".hover_text").bind("mouseleave", function () {
        info.hide();
    });
});
function GetScreenCordinates(obj) {
    var p = {};
    p.x = obj.offsetLeft;
    p.y = obj.offsetTop;
    while (obj.offsetParent) {
        p.x = p.x + obj.offsetParent.offsetLeft;
        p.y = p.y + obj.offsetParent.offsetTop;
        if (obj == document.getElementsByTagName("body")[0]) {
            break;
        }
        else {
            obj = obj.offsetParent;
        }
    }
    return p;
}