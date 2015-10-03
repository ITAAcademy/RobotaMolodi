@extends('app') <!-- Куди вставляється весь цей код Штмл -->

@section('title')
    <h2>Написати резюме</h2>
    @stop

    @section('content')
    {!! Form::open(['route' => 'resume.store','enctype' => 'multipart/form-data']) !!}

    @include('Resume._send_message') <!-- Підключення коду Штмл(Форма вводу) -->
    {!!Form::close()!!}
@stop