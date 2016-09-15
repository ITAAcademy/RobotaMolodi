$(document).ready(function(){
    $('.gallery').featherlightGallery({
        gallery: {
            fadeIn: 300,
            fadeOut: 300
        },
        openSpeed:    300,
        closeSpeed:   300,
        previousIcon: '<img src="images/modal_gallery_prev_icon.png" alt="prev">',
        nextIcon: '<img src="images/modal_gallery_next_icon.png" alt="next">'
    });

    $('.small-content .line').on('click', function(){
        $('.small-content').hide();
        $('.full-content').show();
    });


    $('.dropdown-block .img-booter').on('click', function(){
        if($('.dropdown-block').hasClass('active')) {
            $('.dropdown-block').removeClass('active');
            $('.overlay').remove();
        }else{
            $('.dropdown-block').addClass('active');
            $('body').append('<div class="overlay" style="z-index: 1000;"></div>');
        }

    });


    $('.login-trigger').on('click', function(){

        $('.register-content').parent().removeClass('active');
        $('.register-content').hide();
        $(this).parent().removeClass('show_sub_left');

        if($(this).parent().hasClass('active')){
            $('.login-content').hide();
            $(this).parent().removeClass('active');
            $(this).parent().siblings().removeClass('show_sub');

        }else{
            $(this).next('.login-content').show();
            $(this).parent().addClass('active');
            $(this).parent().siblings().addClass('show_sub');
        }

        if(!$('.login-content').parent().hasClass('active')) {
            $('.overlay').remove();
        }else if (!$('body>div').hasClass('overlay')) {
            $('body').append('<div class="overlay"></div>');
        }
        $('.overlay').on('click', function(){
            $('.register-content').parent().removeClass('active');
            $('.login-content').parent().removeClass('show_sub_left');
            $('.register-content').hide();


            $('.login-content').parent().removeClass('active');
            $('.register-content').parent().removeClass('show_sub');
            $('.login-content').hide();
            $('.overlay').remove();
        });
    });


    $('.register-trigger').on('click', function(){

        $('.login-content').parent().removeClass('active');
        $('.login-content').hide();
        $(this).parent().removeClass('show_sub');


        if($(this).parent().hasClass('active')){
            $(this).next('.register-content').hide();
            $(this).parent().removeClass('active');
            $(this).parent().siblings().removeClass('show_sub_left');

        }else{
            $(this).next('.register-content').show();
            $(this).parent().addClass('active');
            $(this).parent().siblings().addClass('show_sub_left');
        }

        if(!$(this).parent().hasClass('active')) {
            $('.overlay').remove();
        }else if (!$('body>div').hasClass('overlay')) {
            $('body').append('<div class="overlay"></div>');
        }
        $('.overlay').on('click', function(){

            $('.register-content').parent().removeClass('active');
            $('.login-content').parent().removeClass('show_sub_left');
            $('.register-content').hide();


            $('.login-content').parent().removeClass('active');
            $('.register-content').parent().removeClass('show_sub');
            $('.login-content').hide();
            $('.overlay').remove();
        });
    });



});
