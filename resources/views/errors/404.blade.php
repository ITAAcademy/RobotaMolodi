@extends('app')

@section('content')
    <div><h2>Посилання спідкала невдачка.</h2></div>
    <div><h3>Помилка 404 - вказана сторінка не існує</h3></div>
    <div><h3><a href={{url("/")}}>Перейти на головну сторінку</a></h3></div>

    @if (Auth::check())
        <div><h3><a href={{url("/cabinet/")}}>Перейти до особистого кабінету</a></h3></div>
    @endif

@stop
