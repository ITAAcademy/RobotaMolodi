@extends('main/filter/ajax')
@section('panelTitle')
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <li role = "presentation" >{!!link_to_route('head','Всі вакансії')!!}</li>
    <li role = "presentation" class="active">{!!link_to_route('main.resumes' ,'Всі резюме')!!}</li>
@stop

@section('category')

    <div class="posts">
        @include('main.filter.resume')
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="js/pagination.js"></script>
    <script>

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
                var url = 'showResumes';
                sendAjax(city_id,industry_id,url);
            });
            /////////////////////////////////
            $('#selectCity').change(function(){
                $("div.list-group").empty();
                var city_id = $('[name=city]').val();
                var industry_id = $('[name=industry]').val();
                var url = 'showResumes';
                sendAjax(city_id,industry_id,url);

            });
        });

    </script>
@stop