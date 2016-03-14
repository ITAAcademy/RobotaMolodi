@extends('main/filter/ajax')
@section('Create_res_vac')
    <h4 class="btn btn-default" style="background:wheat; color:#ffffff; ">{!! link_to_route('vacancy.create', 'Створити вакансію') !!}</h4>
@stop
@section('panelTitle')
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <li role = "presentation" ><a href={{route('head')}}><span>{!! Html::image('image/allvacancies.png','Головна',['id'=>'allvacancies']) !!}</span> Всі вакансії</a></li>
    <li role = "presentation" class="active"><a href={{route('main.resumes')}}><span>{!! Html::image('image/allresumes.png','Головна',['id'=>'allresumes']) !!}</span> Всі резюме</a></li>
    <li role = "presentation"><a href={{route('main.companies')}}><span>{!! Html::image('image/allcompanies.png','Comp',['id'=>'allcompanies']) !!}</span> Всі компанії</a></li>

@stop

@section('category')

    <div class="posts">
        @include('Resume._resume')
    </div>
@stop
