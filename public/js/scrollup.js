/**
 * Created by Саша on 17.05.2017.
 */
$(document).ready(function () {
    var scroller = $('.scrollup');
    $(window).scroll(function (){
        $(this).scrollTop() > 100 ? scroller.fadeIn() : scroller.fadeOut();
    });
    scroller.click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
})