@extends('cabinet/cabinet')

@section('titles')
    <li role = "presentation" class="active"><a href={{route('resume.index')}}><span>{!! Html::image('image/allresumes.png','Res',['id'=>'allresumes']) !!}</span> Мої резюме</a></li>
    <li role = "presentation" ><a href={{route('vacancy.index')}}><span>{!! Html::image('image/allvacancies.png','Vac',['id'=>'allvacancies']) !!}</span> Мої вакансії</a></li>
    <li role = "presentation" ><a href={{route('company.index')}}><span>{!! Html::image('image/allcompanies.png','Comp',['id'=>'allcompanies']) !!}</span> Мої компанії</a></li>
@stop

@section('Create_res_vac')
    <h4 class="btn btn-default" style="background:#f5f5f5; color:#ffffff;">{!! link_to_route('resume.create', 'Написати резюме') !!}</h4>
@stop

@section('contents')
    @if($mes)
        <span>{{$mes}} <a href="{{ url('/resume/create') }}">Створiть</a></span>
    @endif
    @include('Resume._resume')
@stop
