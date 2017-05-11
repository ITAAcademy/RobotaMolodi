{{--@extends('cabinet/cabinet')--}}
{{--@section('btn')--}}
    {{--<div>--}}
        {{--<h4 class="btn btn-default btn_cr" style="background:#f5f5f5; color:#ffffff;">{!!link_to_route('company.create','Створити компанію')!!}</h4>--}}
    {{--</div>--}}
{{--@stop--}}
{{--@section('titles')--}}
    {{--<meta name="csrf_token" content="{{ csrf_token() }}" />--}}
    {{--<li role = "presentation" ><a href={{route('head')}}><span>{!! Html::image('image/allvacancies.png','Головна',['id'=>'allvacancies']) !!}</span> Всі вакансії</a></li>--}}
    {{--<li role = "presentation" ><a href={{route('main.resumes')}}><span>{!! Html::image('image/allresumes.png','Головна',['id'=>'allresumes']) !!}</span> Всі резюме</a></li>--}}
    {{--<li role = "presentation" class="active"><a href={{route('main.companies')}}><span>{!! Html::image('image/allcompanies.png','Comp',['id'=>'allcompanies']) !!}</span> Всі компанії</a></li>--}}

{{--@stop--}}
@section('content')
    @include('newDesign/aboutUs/show')
    @include('newDesign/navTab/navTab')
    @include('newDesign/search/show')
    <div id="left-content-column" class="col-xs-9">
        @include('newDesign/sortAds/sort')
        @include('newDesign/company/companiesList')
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" class="category" data-id="sliderUnderFooter" value="1">
        <div class="slider1"  style="padding-top: 60px"></div>
    </div>
    <div id="right-content-column" class="col-xs-3">
        @include('newDesign/vacancies/topVacancies')
        <input type="hidden" class="category2" data-id="sliderRightNews" value="2">
        <div class="slider2"></div>
        @include('newDesign/topNews')
    </div>
    {{--<div class="posts">--}}
        {{--@include('Company._company')--}}
    {{--</div>--}}
    <script>
        $(document).ready(function() {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});
            $.ajax({
                url: '{{route('setCategory')}}',
                data: {
                    category: $('.category').val(),
                    slider: $('.category').attr('data-id')
                },
                type: 'POST',
                success: function (data) {
                    $('.slider1').html(data);
                }
            });

            $.ajax({
                url: '{{route('setCategory')}}',
                data: {
                    category: $('.category2').val(),
                    slider: $('.category2').attr('data-id')
                },
                type: 'POST',
                success: function (data) {
                    $('.slider2').html(data);
                }
            });
        })
    </script>
@stop

