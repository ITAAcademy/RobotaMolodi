$(document).ready(function () {

    // ajax pagination:
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        getNews(url);
        window.history.pushState("", "", url);
        $('html, body').animate( { scrollTop: 0 }, 'medium');
    });

    function getNews(url) {
        $.ajax({
            url : url,
            cache: false
        }).done(function (data) {
            $('.ajaxLoader	').html(data);
        }).fail(function () {
            alert('Data not loaded!');
        });
    }

    //close topVacancy:
    $('#close-top-vac').on('click', function (e) {
        e.preventDefault();
        if($('#news').hasClass('hidden')){
            $('#topvac').addClass('hidden');
            $('#left-content-column').removeClass('col-xs-9');
            $('#right-content-column').removeClass('col-xs-3');
            $('#left-content-column').addClass('col-xs-12');
        }else{
            $('#topvac').addClass('hidden');
        }
    })

    //close topNews:
    $('#close-news').on('click', function (e) {
        e.preventDefault();
        if($('#topvac').hasClass('hidden')){
            $('#news').addClass('hidden');
            $('#left-content-column').removeClass('col-xs-9');
            $('#right-content-column').removeClass('col-xs-3');
            $('#left-content-column').addClass('col-xs-12');
        }else{
            $('#news').addClass('hidden');
        }
    })

})
