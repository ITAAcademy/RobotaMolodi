@extends('app')

@section('content')
    @include('newDesign.scrollup')
    @include('newDesign/aboutUs/show')
    @include('newDesign/navTab/navTab')
    @include('newDesign/search/show')
    <div id="left-content-column" class="col-sm-9">
        @include('newDesign/sortAds/sort')
        @include('newDesign/company/companiesList')
        @include('newDesign/sliders/byCategory', ['viewName' => 'underFooter', 'category' => 1])
    </div>
    <div id="right-content-column" class="col-sm-3">
        @include('newDesign/vacancies/topVacancies')
        @include('newDesign/sliders/byCategory', ['viewName' => 'news', 'category' => 2])
        @include('newDesign/topNews')
    </div>

    {!!Html::script('js/scrollup.js')!!}
@stop
