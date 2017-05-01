@extends('newDesign.news.includeNews.newsLayout')

<link href="{{ asset('/css/newsList.css') }}" rel="stylesheet">


@section('content')
    @include('newDesign/aboutUs/show')

    <div class="col-xs-12">
        <div class="newsListBreadcrumb">
            <ol class="breadcrumb">
                <li><a href="/">Головна</a></li>
                <li class="active">Новини </li>
            </ol>
        </div>
    </div>

    <div class="addNewsList">
        @include('newDesign/news/includeNews/newsListContent')
    </div>

    <div id="right-content-column" class="col-xs-3">
        @include('newDesign/vacancies/topVacancies')
        @include('newDesign/topNews')
    </div>
@stop