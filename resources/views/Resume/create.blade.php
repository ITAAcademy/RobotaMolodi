@extends('app')

@section('title')
    <h2>Написати резюме</h2>
    <div>
        {!! link_to_route('resumes', 'Мої резюме') !!}
    </div>
@stop

@section('content')
    {!! Form::open(['route' => 'resume.store']) !!}
        @include('Resume._form')
    {!!Form::close()!!}
@stop