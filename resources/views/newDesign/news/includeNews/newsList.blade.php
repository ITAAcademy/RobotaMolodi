@extends('newDesign.news.includeNews.newsLayout')

<link href="{{ asset('/css/newsList.css') }}" rel="stylesheet">
{{--<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">--}}

@section('content')
    @include('newDesign/aboutUs/show')
    <div id="left-content-column" class="col-xs-9">

        <section class="content">
            <ol class="breadcrumb">
                <li><a href="/">Головна</a></li>
                <li class="active">Новини </li>
            </ol>

            <div class="test">
                @foreach($news as $oneNews)
                    <div>
                        <div class="sectionNewsList">
                            <a class="links" href="/news/{{$oneNews->id}}">
                                <h3>{{ $oneNews->name}}</h3>
                            </a>
                            @if($oneNews->img!='Not picture')
                                <img class="picture" src="{{ asset($oneNews->getPath().$oneNews->img) }}" >
                            @endif
                        </div>

                        <a class="links" href="/news/{{$oneNews->id}}">
                            <p class="read-next">Читати далі...</p>
                        </a>
                            <div class="line">
                                <span class="drop">&bull;</span>
                                <span class="data"><h4>Дата публікації </h4>{{date('j.m.Y', strtotime($oneNews->updated_at))}}</span>
                            </div>
                        <hr>
                    </div>
                @endforeach
            </div>
        </section>
    </div>

    <div id="right-content-column" class="col-xs-3">
        @include('newDesign/vacancies/topVacancies')
        @include('newDesign/topNews')
    </div>
@stop