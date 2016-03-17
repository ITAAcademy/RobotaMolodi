@extends('cabinet/cabinet')
@section('btn')
    <div>
        <h4 class="btn btn-default btn_cr" style="background:wheat; color:#ffffff;">{!!link_to_route('company.create','Створити компанію')!!}</h4>
    </div>
@stop
@section('titles')
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <li role = "presentation" ><a href={{route('head')}}><span>{!! Html::image('image/allvacancies.png','Головна',['id'=>'allvacancies']) !!}</span> Всі вакансії</a></li>
    <li role = "presentation" ><a href={{route('main.resumes')}}><span>{!! Html::image('image/allresumes.png','Головна',['id'=>'allresumes']) !!}</span> Всі резюме</a></li>
    <li role = "presentation" class="active"><a href={{route('main.companies')}}><span>{!! Html::image('image/allcompanies.png','Comp',['id'=>'allcompanies']) !!}</span> Всі компанії</a></li>

@stop
@section('content')
    <div class="posts">
        @include('Company._company')
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="js/pagination.js"></script>
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
        });
    </script>
@stop
