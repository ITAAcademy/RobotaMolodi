@extends('vacancy/myVacancies')

@section('contents')

    <address>
        @foreach($vacancies as $vacancy)
        <strong>{{$vacancy->position}}</strong><br>
        {{$vacancy->branch}}<br>
        {{$vacancy->organisation}}<br>
        {{$vacancy->data_field}}    <br>
        {{$vacancy->city}}    <br>
        {{$vacancy->salary}}    <br>
        {{$vacancy->company_id}} <br>
        <abbr title="Phone">P:</abbr> (123) 456-7890
    </address>

    <address>
        <strong>Full Name</strong><br>
        <a href="mailto:#">first.last@example.com</a>
    </address>

    @endforeach
    @stop