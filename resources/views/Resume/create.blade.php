@extends('app') <!-- Куди вставляється весь цей код Штмл -->

@section('title')
    <h2>Написати резюме</h2>
    <div>
        {!! link_to_route('resumes', 'Мої резюме') !!} <!-- Створення силки -->
    </div>
@stop

@section('content')
    {!! Form::open(['route' => 'resume.store','enctype' => 'multipart/form-data']) !!}
        @include('Resume._form') <!-- Підключення коду Штмл(Форма вводу) -->
    {!!Form::close()!!}
@stop