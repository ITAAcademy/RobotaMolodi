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
  @include('project.partials._breadcrumb')
  @include('project.partials._slider')
  @include('project.partials._navbar')
  @include('project.partials._vacancies')
  @include('project.partials._project')
  @include('project.partials._our-vacancies')
  @include('project.partials._vacancies-contacts')

  {!!Html::script('js/vacancies.js')!!}
@endsection
