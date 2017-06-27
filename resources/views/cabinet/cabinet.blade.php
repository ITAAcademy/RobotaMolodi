@extends('app')
@section('title')

@stop
@section('content')
    <link href="{{ asset('/css/cabinet.css') }}" rel="stylesheet">
    @include('newDesign.breadcrumb',array('breadcrumbs' =>[
            ['url'=> 'head','name'=>'Головна','showDisplay'=>'none'],
            ['name' => 'Особистий кабінет ', 'url' => false]
            ]
        )
        )
    <div class="row cabinet-buttons">
        <div class="col-xs-11 col-md-7 header-tabs">
            <ul class="nav nav-tabs">
                {{--@yield('titles')--}}
                @if(Auth()->user())
                    <li role = "presentation" ><a class="link-resume" href={{route('cabinet.my_resumes', Auth()->user()->id)}}><span>{!! Html::image('image/allresumes.png','Res',['id'=>'allresumes']) !!}</span> Мої резюме</a></li>
                    <li role = "presentation" ><a class="link-vacancy" href={{route('cabinet.my_vacancies', Auth()->user()->id)}}><span>{!! Html::image('image/allvacancies.png','Vac',['id'=>'allvacancies']) !!}</span> Мої вакансії</a></li>
                    <li role = "presentation" ><a class="link-company" href={{route('cabinet.my_companies', Auth()->user()->id)}}><span>{!! Html::image('image/allcompanies.png','Comp',['id'=>'allcompanies']) !!}</span> Мої компанії</a></li>
                @endif
            </ul>
        </div>
        <!-- Add new: -Vac -Comp -Res.  Line  -->
        <div class="col-md-5 hidden-xs hidden-sm add-list-group-nav-tab">
            <ul class="list-inline">
                <li class="list-unstyled_plus">
                    <span class="glyphicon glyphicon-plus"></span>
                    <span class="add">Додати:</span>
                </li>
                <li class="list-unstyled_vacansy">
                    <a href="{{route('vacancy.create')}}">Вакансію</a>
                </li>
                <li class="list-unstyled_company">
                    <a href="{{route('company.create')}}">Компанію</a>
                </li>
                <li class="list-unstyled_resume">
                    <a href="{{route('resume.create')}}">Резюме</a>
                </li>
            </ul>
        </div>
        <!-- Add new: -Vac -Comp -Res. +dropdown -->
        <div class="col-xs-1 hidden-md hidden-lg dropdown plus-dropdn">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <span class="">+</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuPlus">
                <li class="plus-dropdn-h">Додати:</li>
                <li role="separator" class="divider"></li>
                <li><a href="{{route('vacancy.create')}}">Вакансію</a></li>
                <li><a href="{{route('company.create')}}">Компанію</a></li>
                <li><a href="{{route('resume.create')}}">Резюме</a></li>
            </ul>
        </div>
    </div>


    <div class="contentAjax">
        @yield('contents')
    </div>
    <script>
        $(document).ready(function() {

            $('li[role="presentation"] a').click(function(e) {
                e.preventDefault();
                var href = $(this).attr('href');

                getContent(href, true);
            });
            window.addEventListener('popstate', function(e){
                getContent(location.pathname, false);
                $('a[href*="' + location.pathname + '"]').focus();

            });
        });

        function getContent(url, addEntry) {
            $.get(url).done(function(data) {

                $.ajax({
                    url: url,
                    success: function(data){
                        $('.contentAjax').show().html(data);
                    }
                });

                if(addEntry) {
                    // Добавляем запись в историю, используя pushState
                    history.pushState(null, null, url);
                }
            });
        }
    </script>

@stop

