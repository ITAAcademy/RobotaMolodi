@extends('newDesign.news.includeNews.newsLayout')
<link href="{{ asset('/css/newsPage.css') }}" rel="stylesheet">

@section('content')
    @include('newDesign/aboutUs/show')

    <div class="col-xs-12">
        <div class="newsPageBreadcrumb">
            <ol class="breadcrumb">
                <li><a href="/">{{ trans('content.main') }}</a></li>
                <li><a href="/news">{{ trans('content.news') }}</a></li>
                <li class="active">{{date('j.m.Y', strtotime($newsOne->updated_at))}} </li>
            </ol>
        </div>
    </div>

    <section class="contentNewsPage">

        <div class="sectionNews">
            <div id="left-content-column" class="col-xs-9">
                <div class="col-xs-12">
                    <h3 class="nameNews">{{ $newsOne->name}}</h3>
                    @if($newsOne->img!='Not picture')
                        <div><img class="picture" src="{{ asset($newsOne->getPath().$newsOne->img) }}"></div>
                    @endif
                    <p>{!! $newsOne->description !!}</p>
                    <span><h4>Опубліковано </h4>{{date('j.m.Y', strtotime($newsOne->updated_at))}}</span>
                </div>
                <div class="col-xs-12" style="padding-top: 15px">
                    {!! Html::linkRoute('news.show',  '&laquo; '.$previous['name'] ,  $previous['id'], [ 'class' => 'previous pull-left', 'title' => trans('pagination.previousNews')]) !!}
                    {!! Html::linkRoute('news.show', $next['name'].' &raquo;',  $next['id'], [ 'class' => 'next pull-right ', 'title' => trans('pagination.nextNews') ]) !!}
                </div>
            </div>
        </div>

        <div id="right-content-column" class="col-xs-3">
            @include('newDesign/vacancies/topVacancies')
            @include('newDesign/topNews')
        </div>

    </section>
@stop
