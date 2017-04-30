@extends('newDesign.news.includeNews.newsLayout')

<link href="{{ asset('/css/newsPage.css') }}" rel="stylesheet">

@section('content')
    @include('newDesign/aboutUs/show')

    <div id="left-content-column" class="col-xs-9">
        <section class="content">
            <ol class="breadcrumb">
                <li><a href="/">Головна</a></li>
                <li><a href="/news">Новини</a> </li>
                <li class="active">{{date('j.m.Y', strtotime($newsOne->updated_at))}} </li>
            </ol>

            <div class="sectionNews">
                <h3>{{ $newsOne->name}}</h3>
                @if($newsOne->img!='Not picture')
                   <div><img class="picture" src="{{ asset($newsOne->getPath().$newsOne->img) }}" ></div>
                @endif
                <p>{!! $newsOne->description !!}</p>
                <span class="data"><h4>Дата публікації </h4>{{date('j.m.Y', strtotime($newsOne->updated_at))}}</span>
            </div>

        </section>
    </div>

    <div id="right-content-column" class="col-xs-3">
        @include('newDesign/vacancies/topVacancies')
        @include('newDesign/topNews')
    </div>
@stop