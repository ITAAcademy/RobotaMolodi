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
        <div class="col-xs-7 col-md-12 header-tabs">
            <ul class="nav nav-tabs">
                {{--@yield('titles')--}}
                @if(Auth()->user())
                <li role = "presentation" ><a class="link-resume" href={{route('cabinet.my_resumes', Auth()->user()->id)}}><span>{!! Html::image('image/allresumes.png','Res',['id'=>'allresumes']) !!}</span> Мої резюме</a></li>
                <li role = "presentation" ><a class="link-vacancy" href={{route('cabinet.my_vacancies', Auth()->user()->id)}}><span>{!! Html::image('image/allvacancies.png','Vac',['id'=>'allvacancies']) !!}</span> Мої вакансії</a></li>
                <li role = "presentation" ><a class="link-company" href={{route('cabinet.my_companies', Auth()->user()->id)}}><span>{!! Html::image('image/allcompanies.png','Comp',['id'=>'allcompanies']) !!}</span> Мої компанії</a></li>
                @endif
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

