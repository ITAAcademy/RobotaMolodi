/**
 * Created by Quicks on 13.08.2015.
 */
function Pagination(city_id,industry_id,url)
{
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            } else {
                getPosts(page);
            }
        }
    });
    $(document).ready(function() {
        $(document).on('click','.pagination a' , function (e) {
            getPosts($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });
        /////////////////////////////////////
        $('#selectIndustry').change(function(){
            $("div.list-group").empty();
            var city_id = $('[name=city]').val();
            var industry_id = $('[name=industry]').val();
            var url = url;
            sendAjax(city_id,industry_id,url);
        });
        /////////////////////////////////
        $('#selectCity').change(function(){
            $("div.list-group").empty();
            var city_id = $('[name=city]').val();
            var industry_id = $('[name=industry]').val();
            var url = url;
            sendAjax(city_id,industry_id,url);

        });
    });

}

function getPosts(page) {
    var city_id = $('[name=city]').val();
    var industry_id = $('[name=industry]').val();

    $.ajax({
        url : '?page=' + page + '&city_id=' + city_id + '&industry_id=' + industry_id ,
        dataType: 'json'
    }).done(function (data) {
        $('.posts').html(data);
        location.hash = page;
    }).fail(function () {
        alert('Posts could not be loaded.');
    });
}
function sendAjax(city_id,industry_id,url)
{

    $.ajax({   //start of ajax
        url: url,
        type: "POST",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        data: {'city_id': city_id, 'industry_id': industry_id},
        success: function (json) {
            $('.posts').html(json);

        }
    });
}