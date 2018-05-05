$(document).ready(function() {
    /*curtail-expand link at teams*/
    $('.curtail-expand__link').click(function(e) {
        e.preventDefault();

        var thisTeam = $('.team-project__list');
        var thisLink = $('.curtail-expand__link');

        if(!thisLink.hasClass('active-team')){
            thisLink.addClass('active-team');
            thisLink.removeClass('dropdown');
            thisLink.addClass('dropup');
            thisLink.html('<span class="caret"></span> згорнути');
            thisTeam.slideDown(500);
        }else{
            thisLink.removeClass('active-team');
            thisLink.removeClass('dropup');
            thisLink.addClass('dropdown');
            thisLink.html('<span class="caret"></span> розгорнути');
            thisTeam.slideUp(500);
        }
    });

    /*curtail-expand link at skills*/
    $('.our-vacancies__curtail-expand__link').click(function(e) {
        e.preventDefault();

        var $this = $(this),
            thisSkills = $( e.target ).closest('.our-vacancies__items').find('.our-vacancies__skills'),
            thisVacLink = $( e.target ).closest('.our-vacancies__items').find('.our-vacancies__links');

        if(!$this.hasClass('active-team')){
            $this.addClass('active-team');
            $this.removeClass('dropdown');
            $this.addClass('dropup');
            $this.html('<span class="caret"></span> згорнути');
            thisSkills.slideDown(500);
            thisVacLink.slideDown(500);
        }else{
            $this.removeClass('active-team');
            $this.removeClass('dropup');
            $this.addClass('dropdown');
            $this.html('<span class="caret"></span> розгорнути');
            thisVacLink.slideUp(500);
            thisSkills.slideUp(500);
        }
    });

    /* smooth scrolling to anchor links */
    $(document).on('click', '.nav-vacancy a[href$="__id"][href!="#"]', function (event) {
        event.preventDefault();
        var target = $.attr(this, 'href');
        $('html, body').animate({
            scrollTop: $(target).offset().top,
        }, 600, 'swing', function (){
            animate(target);
        });
    });

    /* Attach animate class to element */
    function animate(elem){
        var prop = 'animated bounceIn';
        var animated = $(elem).hasClass(prop);
        if(animated){
            $(elem).removeClass(prop);
        }
        setTimeout(function(){
                $(elem).addClass(prop)
            }
        ,0);
    }
});