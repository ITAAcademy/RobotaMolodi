@extends('app')

@section('headLinks')
  <link href="{{ asset('/css/breadcrumb.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/slick/slick.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/slick/slick-theme.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/navbar/navbar-vacancy.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/test/vacancies.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/test/project.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/test/our-vacancies.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/test/vacancies-contacts.css') }}" rel="stylesheet">
@endsection
@section('content')
  @include('project._breadcrumb')
  @include('project._slider')
  @include('project._navbar')
  @include('project._vacancies')
  @include('project._project')
  @include('project._our-vacancies')
  @include('project._vacancies-contacts')

  {!!Html::script('js/vacancies.js')!!}
@endsection
