@extends('main/filter/ajax')
@section('Create_res_vac')
    <h4 class="btn btn-default" style="background:wheat; color:#ffffff;">{!! link_to_route('resume.create', 'Написати резюме') !!}</h4>
@stop
@section('panelTitle')
    <li role = "presentation" class="active"><a href={{route('head','Всі вакансії')}}><span>{!! Html::image('image/allvacancies.png','Головна',['id'=>'allvacancies']) !!}</span> Всі вакансії</a></li>
    <li role = "presentation"><a href={{ route('main.resumes' ,'Всі резюме')}}><span>{!! Html::image('image/allresumes.png','Головна',['id'=>'allresumes']) !!}</span> Всі резюме</a></li>
@stop

@section('category')

    <div class="posts">
        @include('main.filter.vacancy')
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
                var url = 'showVacancies';
                sendAjax(city_id,industry_id,url);
            });
            /////////////////////////////////
            $('#selectCity').change(function(){
                $("div.list-group").empty();
                var city_id = $('[name=city]').val();
                var industry_id = $('[name=industry]').val();
                var url = 'showVacancies';
                sendAjax(city_id,industry_id,url);

            });
        });

    </script>
@stop