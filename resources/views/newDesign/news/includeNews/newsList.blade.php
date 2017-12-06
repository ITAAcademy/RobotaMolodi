@extends('newDesign.news.includeNews.newsLayout')
<link href="{{ asset('/css/newsList.css') }}" rel="stylesheet">

@section('content')
    @include('newDesign/aboutUs/show')

    <div class="col-xs-12">
        <div class="newsListBreadcrumb">
            <ol class="breadcrumb">
                <li><a href="/">{{ trans('content.main') }}</a></li>
                <li class="active">{{ trans('content.news') }} </li>
            </ol>
        </div>
    </div>

    <section class="contentNewsList">
        <h1 class="title">{{ trans('content.top') }}</h1>
        <div id="left-content-column" class="col-xs-9">
            @include('newDesign/news/includeNews/newsListContent')
        </div>
    </section>

    <div id="right-content-column" class="col-xs-3">
        @include('newDesign/vacancies/topVacancies')
        @include('newDesign/topNews')
    </div>

    {!!Html::script('js/news.js')!!}

@stop
